<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use DB;
use App\Models\{UsersCustomersWallet,SystemCurrency,SystemCountry,UsersCustomersTxns,SwapWallet,SwapOffer,SwapOfferRequest,Feedback,FAQ,
  FavoriteSwapOffer,FavoriteConnectArticle,ConnectArticleView,UserCustomerAccount};
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Helpers\Helper;

class ApiController extends Controller{
  /* SEND NOTIFICATIONS */
  public function send_notification($data){
    DB::table('notifications')->insert($data);
  }
  /* SEND NOTIFICATIONS */

  /* DECODE IMAGE */
  public function decode_image($img , $path_url, $prefix, $random, $postfix){                                   
    $data = base64_decode($img);
    $file_name = $prefix.$random.$postfix.'.jpeg';
    $file = $path_url.$file_name;
    $success = file_put_contents($file, $data);
    return $file_name; 
  }
  /* DECODE IMAGE */

  /* USERS CUSTOMERS DETAILS */
  public function users_customers_profile(Request $req){
    if (isset($req->users_customers_id)) {
      $email = DB::table('users_customers')->where('users_customers_id', $req->users_customers_id)->get()->count();
      if ($email>0) {
        $userDetail=DB::table('users_customers')->where('users_customers_id', $req->users_customers_id)->get()->first();
        if (isset($userDetail) && $userDetail != null) {
          $response["code"] = 200;
          $response["status"] = "success";
          $response["data"] = $userDetail;
        } else{
          $response["code"] = 404;
          $response["status"] = "error";
          $response["message"] = "User do not exist.";
        }
      } else {
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "Email does not exits.";
      }
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }

    return response()
    ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
    ->header('Content-Type', 'application/json');
  }
  /* USERS CUSTOMERS DETAILS */

  /* LOGIN USERS CUSTOMERS */
  public function users_customers_login(Request $req){
    if (isset($req->email) && isset($req->password)) {
      $email = DB::table('users_customers')->where('email', $req->email)->first();
      if ($email) {
        $data=DB::table('users_customers')->where('email', $req->email)->first();
        $password=$data->password;
        $id = $data->users_customers_id;
        if (md5($req->password) == $password) {
          if($data->status == 'Active'){
            if($req->one_signal_id){
              $update=DB::table('users_customers')->where('email', $req->email)->update(['one_signal_id'=>$req->one_signal_id]);
              }
              $update_last_activity=DB::table('users_customers')->where('email', $req->email)->update(['last_activity'=>Carbon::now()]);

            $userDetail=DB::table('users_customers')->where('users_customers_id', $id)->get()->first();
            if (isset($userDetail) && $userDetail != null) {
              $response["code"] = 200;
              $response["status"] = "success";
              $response["data"] = $userDetail;
            } else{
              $response["code"] = 404;
              $response["status"] = "error";
              $response["message"] = "User do not exist.";
            }
          } else {
            $response["code"] = 404;
            $response["status"] = "error";
            $response["message"] = "Your account is in ".$data->status." status. Please contact admin.";
          }
        } else {
          $response["code"] = 404;
          $response["status"] = "error";
          $response["message"] = "Password do not match.";
        }
      }else{
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "Email does not exits.";
      }
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }

    return response()
    ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
    ->header('Content-Type', 'application/json');
  }
  /* LOGIN USERS CUSTOMERS */

  /* SIGNUP USERS CUSTOMERS */
  public function users_customers_signup(Request $req){
    if (isset($req->first_name) && isset($req->phone) && isset($req->email) && isset($req->password) && isset($req->location)) {
      $email = DB::table('users_customers')->where('email', $req->email)->get()->count();

      if($email == 0) {
        if(isset($req->one_signal_id)){
        	$saveData['one_signal_id']        = $req->one_signal_id;
        }
        $saveData['users_customers_type'] = $req->users_customers_type;

        if($req->users_customers_type == 'Company'){
          $saveData['company_name']           = $req->company_name;
        }

        if($req->users_customers_type == 'Individual'){
          $saveData['last_name']            = $req->last_name;
        }

        $saveData['id_number']         	  = $req->id_number;
        $saveData['first_name']           = $req->first_name;
        $saveData['phone']                = $req->phone;
        $saveData['email']                = $req->email;
        $saveData['password']             = md5($req->password);
        $saveData['location']             = $req->location;

        if(isset($req->valid_document)){
          $valid_document = $req->valid_document;
          $prefix = time();
          $img_name = $prefix.'.jpeg';
          $image_path = public_path('uploads/users_documents/').$img_name;

          file_put_contents($image_path, base64_decode($valid_document));
          $saveData['valid_document'] = 'uploads/users_documents/'.$img_name;
        }

        if(isset($req->id_front_image)){
          $id_front_image = $req->id_front_image;
          $prefix = time();
          $img_name = $prefix.'.jpeg';
          $image_path = public_path('uploads/users_id_front_image/').$img_name;

          file_put_contents($image_path, base64_decode($id_front_image));
          $saveData['id_front_image'] = 'uploads/users_id_front_image/'.$img_name;
        }

        if(isset($req->id_back_image)){ 
          $id_back_image = $req->id_back_image;
          $prefix = time();
          $img_name = $prefix.'.jpeg';
          $image_path = public_path('uploads/users_id_back_image/').$img_name;

          file_put_contents($image_path, base64_decode($id_back_image));
          $saveData['id_back_image'] = 'uploads/users_id_back_image/'.$img_name;
        }

        if(isset($req->profile_pic)){
          $profile_pic = $req->profile_pic;
          $prefix = time();
          $img_name = $prefix . '.jpeg';
          $image_path = public_path('uploads/users_customers/') . $img_name;

          file_put_contents($image_path, base64_decode($profile_pic));
          $saveData['profile_pic'] = 'uploads/users_customers/'. $img_name;
        }
        if(isset($req->refer_code)){
          $receiver_id=base64_decode($req->refer_code);
          $system_currencies_id=2;
          $receive_amount=20;
	        $receiver_wallet = UsersCustomersWallet::where([
            'users_customers_id' => $receiver_id,
            'system_currencies_id'=>$system_currencies_id
          ])->first();
          while(!$receiver_wallet){
            $wallet = UsersCustomersWallet::firstOrCreate(
                      ['users_customers_id' => $receiver_id,
                      'system_currencies_id'=>$system_currencies_id],
                      ['users_customers_id' => $receiver_id,
                      'system_currencies_id'=>$system_currencies_id]
                  );
          }
          $receiver_wallet_update = UsersCustomersWallet::where([
            'users_customers_id' => $receiver_id,
            'system_currencies_id'=>$system_currencies_id
          ])->update([
            "wallet_amount"=>$receive_amount
          ]);
	      }
        
        $saveData['notifications']        = 'Yes';
        if(isset($req->account_type)){
	        $saveData['account_type']     = $req->account_type;
	    }
        $saveData['social_acc_type']      = 'None';
        $saveData['google_access_token']  = '';

        $saveData['verified_badge']       = 'No';
        $saveData['date_expiry']       	  = $req->date_expiry;
        $saveData['date_added']           = date('Y-m-d H:i:s');
        $saveData['last_activity']        = Carbon::now();
        

        $users_customers_id   = DB::table('users_customers')->insertGetId($saveData);
        $users_customers      = DB::table('users_customers')->where('users_customers_id', $users_customers_id)->first();

        $response["code"]     = 200;   
        $response["status"]   = "success";
        $response["data"]     = $users_customers;
      } else {
        $response["code"]     = 401;
        $response["status"]   = "error";
        $response["message"]  = "Email already exists.";
      }
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }
    
    return response()
     ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
     ->header('Content-Type', 'application/json');
  }
  /* SIGNUP USERS CUSTOMERS */

   /* VERIFY SIGNUP USERS CUSTOMERS OTP */
   public function users_customers_verify_otp(Request $req){
    if (isset($req->users_customers_id) && isset($req->verify_otp)) {
     $verifyOTP = DB::table('users_customers')->select('verify_code')->where('users_customers_id', $req->users_customers_id)->first();
     $verifyOTPDB = $verifyOTP->verify_code;
     if ($verifyOTPDB == $req->verify_otp) {

       $users_customer = DB::table('users_customers')->where('users_customers_id', $req->users_customers_id)->first();
       $response["code"] = 200;
       $response["status"] = "success";
       $response["data"] = $users_customer;
     } else {
       $response["code"] = 404;
       $response["status"] = "error";
       $response["message"] = "Otp do not match.";
     }
   }else{
     $response["code"] = 404;
     $response["status"] = "error";
     $response["message"] = "All fields are required.";
   }
   
   return response()
    ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
    ->header('Content-Type', 'application/json');
 }  
 /* VERIFY SIGNUP USERS CUSTOMERS OTP */

  /* UPDATE PROFILE */
  public function update_profile(Request $req){
    if(isset($req->users_customers_id) && isset($req->first_name) && isset($req->last_name) && isset($req->notifications)) {
      $updateData['users_customers_id'] = $req->users_customers_id;
      $saveData['users_customers_type']           = $req->users_customers_type;

      if($req->users_customers_type == 'Company'){
        $saveData['company_name']           = $req->company_name;
      }
      if(isset($req->phone)){
        $updateData['phone']              = $req->phone;
      }

      $updateData['first_name']         = $req->first_name;
      $updateData['last_name']          = $req->last_name;
      $updateData['location']           = $req->location;
      $updateData['notifications']      = $req->notifications;

      if(isset($req->valid_document)){
        $valid_document = $req->valid_document;
        $prefix = time();
        $img_name = $prefix . '.jpeg';
        $image_path = public_path('uploads/users_documents/') . $img_name;

        file_put_contents($image_path, base64_decode($valid_document));
        $updateData['valid_document'] = 'uploads/users_documents/'. $img_name;
      }

      if(isset($req->profile_pic)){
        $profile_pic = $req->profile_pic;
        $prefix = time();
        $img_name = $prefix . '.jpeg';
        $image_path = public_path('uploads/users_customers/') . $img_name;

        file_put_contents($image_path, base64_decode($profile_pic));
        $updateData['profile_pic'] = 'uploads/users_customers/'. $img_name;
      }

      DB::table('users_customers')->where('users_customers_id', $req->users_customers_id)->update($updateData);
      $updatedData = DB::table('users_customers')->where('users_customers_id', $req->users_customers_id)->get();
 
      $response["code"] = 200;
      $response["status"] = "success";
      $response["data"] = $updatedData;
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }

    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* UPDATE PROFILE */

  /* FORGETPASSWORD API */
  public function forgot_password(Request $req){
    if (isset($req)) {
      $email=DB::table('users_customers')->where('email', $req->email)->get()->count();
      if ($email>0) {
        $data = DB::table('users_customers')->where('email', $req->email)->first();
        $id = $data->users_customers_id;
        $onlyEmail = $req->email;
        $otp = rand(1000,9999);
        $details = [
            "title"=>"Email Verification Code",
            "data"=>$data,
            "body"=> $otp
        ];
        $otpSended= Mail::to($onlyEmail)->send(new SendMail($details));
        $otpData=array(
         'verify_code'=>$otp
        );
        $UserotpUpdate=DB::table('users_customers')->where('users_customers_id', $id)->update($otpData);

        $details = array('otp' => $otp,'data'=>$data, 'message' => 'OTP sent in the email.');
        $response["code"] = 200;
        $response["status"] = "success";
        $response["data"] = $details;
      }else{
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "Email does not exists.";
      }
    }else{
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "Please enter email address.";
    }
    
    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* FORGETPASSWORD API */

  /* MODIFY PASSWORD */
  public function modify_password(Request $req){
    if (isset($req->email) && isset($req->otp) && isset($req->password) && isset($req->confirm_password)) {
      $forgetOtp = DB::table('users_customers')->select('verify_code')->where('email', $req->email)->first();
      $otpforgetdb = $forgetOtp->verify_code;
      if ($otpforgetdb == $req->otp) {
        if ($req->confirm_password == $req->password) {
          $otpData=[
           'verify_code'=> null,
           'password' => md5($req->password)
          ];
          
          $UserotpUpdate =DB::table('users_customers')->where('email', $req->email)->update($otpData);
          $users_customer = DB::table('users_customers')->where('email', $req->email)->first();
          
          $response["code"] = 200;
          $response["status"] = "success";
          $response["data"] = $users_customer;
        } else {
          $response["code"] = 404;
          $response["status"] = "error";
          $response["message"] = "Password and confirm password do not match.";
        }
      } else {
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "Otp do not match.";
      }
    }else{
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are required.";
    }
    
    return response()
     ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
     ->header('Content-Type', 'application/json');
  }
  /* MODIFY PASSWORD */

  /* CHANGE PASSWORD */
  public function change_password(Request $req){
    if (isset($req->email) && isset($req->old_password) && isset($req->password) && isset($req->confirm_password)) {
      $old_password = DB::table('users_customers')->select('password')->where('email', $req->email)->first();
      $old_passwordDB = $old_password->password;
      if ($old_passwordDB == md5($req->old_password)) {
        if ($req->confirm_password == $req->password) {
          $otpData=array('password' => md5($req->password));          
          $UserotpUpdate =DB::table('users_customers')->where('email', $req->email)->update($otpData);
          $users_customers = DB::table('users_customers')->where('email', $req->email)->get();
          
          $response["code"] = 200;
          $response["status"] = "success";
          $response["data"] = $users_customers;
        } else {
          $response["code"] = 404;
          $response["status"] = "error";
          $response["message"] = "Password and confirm password do not match.";
        }
      } else {
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "Old password is not correct.";
      }
    }else{
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are required.";
    }
    
    return response()
     ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
     ->header('Content-Type', 'application/json');
  }
  /* CHANGE PASSWORD */

  /* DELETE ACCOUNT API */
  public function delete_account(Request $req){
    if (isset($req->user_email) && isset($req->delete_reason) && isset($req->comments)) {
      $users_customers = DB::table('users_customers')->where('email', $req->user_email)->get()->count();
      if ($users_customers>0) {
        $users_customers_delete = DB::table('users_customers_delete')->where('email', $req->user_email)->get()->count();
        if ($users_customers_delete == 0) { 
          $data = array(
            'email'=>$req->user_email,
            'delete_reason'=> $req->delete_reason,
            'comments'=> $req->comments,
            'date_added'=>date('Y-m-d H:i:s'),
            'status'=>'Pending'
          );
          $users_customers_id   = DB::table('users_customers_delete')->insertGetId($data);

          $response["code"] = 200;
          $response["status"] = "success";
          $response["message"] = "Delete account request recieved successfully.";
        }else{
          $response["code"] = 404;
          $response["status"] = "error";
          $response["message"] = "Delete account request already sent. Please wait out team will get back to you in 24 hours.";
        }
      }else{
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "Email does not exists.";
      }
    }else{
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are required.";
    }
    
    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* DELETE ACCOUNT API */

  /* GET SYSTEM SETTINGS */
  public function system_settings(){
    $fetch_data   =  DB::table('system_settings')->get();
    
    if (!empty($fetch_data)) {
      $response["code"] = 200;
      $response["status"] = "success";
      $response["data"] = $fetch_data;
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "no data found.";
    }
    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* GET SYSTEM SETTINGS */

  /* NOTIFICATIONS API */
  public function notifications(Request $req){
    if (isset($req->users_customers_id)) {
      $notifications  = DB::table('notifications')->where('receivers_id', $req->users_customers_id)->orderBy('notifications_id','DESC')->get();
      $data=[];
      foreach($notifications as $notification){
        $notification->notification_sender= DB::table('users_customers')->where('users_customers_id', $notification->senders_id)->select("first_name","last_name","profile_pic")->first();
        $notification->time_ago=Carbon::parse($notification->date_added)->diffForHumans();
        $data[]=$notification;
      }

      $response["code"] = 200;
      $response["status"] = "success";
      $response["data"] = $data;
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are required.";
    }
    
    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* NOTIFICATIONS API */

  /* UNREAD NOTIFICATIONS API */
  public function notifications_unread(Request $req){
    if (isset($req->users_customers_id)) {
      $notifications  = DB::table('notifications')->where('receivers_id', $req->users_customers_id)->where('notifications.status', 'Unread')->orderBy('notifications_id','DESC')->get();

      $data = array("status"=>'Read');
      $updateProfile=DB::table('notifications')->where('receivers_id', $req->users_customers_id)->where('status', 'Unread')->update($data);

      $response["code"] = 200;
      $response["status"] = "success";
      $response["data"] = $notifications;
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are required.";
    }
    
    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* UNREAD NOTIFICATIONS API */

  /*** UNREADED  MESSAGES ***/
  public function unreaded_messages(Request $req){  
    if (isset($req->users_customers_id)){
      $unread_chat = DB::table('chat_messages')->where(['receiver_id'=>$req->users_customers_id,'status'=>'Unread'])->get()->count();
      $response["code"] = 200;
      $response["status"] = "success";
      $response["data"] = $unread_chat;
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are required.";
    }
    
    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /*** UNREADED  MESSAGES ***/

  /*** CHAT HEADS ***/
  public function getAllChat(Request $req){  
    if (isset($req->users_customers_id)){
      $final_chat_array = array();
      $chat_list = DB::table('chat_list')->where('sender_id', $req->users_customers_id)->orWhere('receiver_id', $req->users_customers_id)->get();
      foreach($chat_list as $key => $chat){
        $chat_array = array();
        $chat_array['sender_id'] = $chat->sender_id;
        $chat_array['receiver_id'] = $chat->receiver_id;

        $chat_message = DB::table('chat_messages') 
        ->whereIn('sender_id',[$chat->receiver_id,$chat->sender_id])
        ->whereIn('receiver_id',[$chat->receiver_id,$chat->sender_id])
        ->orderBy('chat_message_id', 'desc')
        ->first();
        if ($chat_message) {
          $date_request = Helper::get_day_difference($chat_message->send_date);
          $chat_array['date'] = $date_request;
          $chat_array['status'] = $chat_message->status;
          $chat_array['last_message'] = $chat_message->message;
        } else {
          $date_request = Helper::get_day_difference($chat->date_request);
          $chat_array['date'] = $date_request;
          $chat_array['last_message'] = 'No Message sent or recieved.';
        }
        if($chat->sender_id==$req->users_customers_id){
            $receiver_data = DB::table('users_customers')->where('users_customers_id',$chat->receiver_id)->first();
            $chat_array['user_data'] = $receiver_data;
        }
        if($chat->receiver_id==$req->users_customers_id){
          // $chat_message = DB::table('chat_messages')->whereIn('sender_id',  [$chat->receiver_id,$chat->sender_id])->orderBy('chat_message_id','DESC')->first();
          $sender_data = DB::table('users_customers')->where('users_customers_id',$chat->sender_id)->first();
          $chat_array['user_data'] = $sender_data;
        
          // if ($chat_message) {
          //   $date_request = Helper::get_day_difference($chat_message->send_date);
          //   $chat_array['date'] = $date_request;
          //   $chat_array['status'] = $chat_message->status;
          //   $chat_array['last_message'] = $chat_message->message;
          // } else {
          //   $date_request = Helper::get_day_difference($chat->date_request);
          //   $chat_array['date'] = $date_request;
          //   $chat_array['last_message'] = 'No Message sent or recieved.';
          // }
        }
        $final_chat_array[] = $chat_array;
      }

      if (count($final_chat_array)>0) {
        $response["code"] = 200;
        $response["status"] = "success";
        $response["data"] = $final_chat_array;
      } else{
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "chat unavailable.";
      }
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "Enter All Fields.";
    }

    return response()
    ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
    ->header('Content-Type', 'application/json');
  }
  /*** CHAT HEADS ***/

  /*** CHAT MESSAGES ***/
  public function user_chat(Request $req){
    if (isset($req->requestType)) {
      $request_type = $req->requestType;
      switch ($request_type) {
        case "startChat":
          if(isset($req->users_customers_id) && isset($req->other_users_customers_id)){
            $check_request = DB::table('chat_list')->where([ ['sender_id', $req->users_customers_id], ['receiver_id', $req->other_users_customers_id]])->orWhere([ ['sender_id', $req->other_users_customers_id], ['receiver_id', $req->users_customers_id]])->count();
            if($check_request > 0){
              $response["code"] = 200;
              $response["status"] = "success";
              $response["message"] = 'chat already started';    
            } else {
              $data_save = array(
                  'sender_id'=> $req->users_customers_id,
                  'receiver_id'=> $req->other_users_customers_id,
                  'date_request'=> date('Y-m-d'),
                  'created_at' => Carbon::now()
              );
              $requestSend = DB::table('chat_list')->insert($data_save);
              
              if($requestSend){
                  $response["code"] = 200;
                  $response["status"] = "success";
                  $response["message"] = 'chat started';
                } else {
                  $response["code"] = 404;
                  $response["status"] = "error";
                  $response["message"] = 'Error in starting chat';
                }
            }
          } else {
            $response["code"] = 404;
            $response["status"] = "error";
            $response["message"] = 'All fields are required';      
          }
        break;   
        
        case "sendMessage":
          if(isset($req->users_customers_id) && isset($req->other_users_customers_id) && isset($req->content) && isset($req->messageType)){
            $message_details = array(
              'sender_id'=> $req->users_customers_id,
              'receiver_id'=> $req->other_users_customers_id,
              'sender_type'=> $req->sender_type,
              'message'=>  json_encode($req->content) ,
              'message_type'=> $req->messageType,
              'send_date'=> date('Y-m-d'),
              'send_time'=> date('H:i:s'),
              'created_at'=> date('Y-m-d H:i:s'),
              'status'=> 'Unread'
            );

            $insertedId = DB::table('chat_messages')->insertGetId($message_details);
            if($insertedId){
              //NEW MESSAGE Notifications
              $dataInsert=array(
                'users_type'=>"User",
                'senders_id'=>$req->users_customers_id,
                'receivers_id'=>$req->other_users_customers_id,
                'message'=> 'A new message has been recieved.',
                'date_added'=>date('Y-m-d H:i:s'),
                'date_modified'=>date('Y-m-d H:i:s')
              );
              $this->send_notification($dataInsert);
              //NEW MESSAGE Notifications

              $messageDetails =  DB::table('chat_messages')->where('chat_message_id', $insertedId)->first();
              $messageDetails->message = json_decode($messageDetails->message);
              if($messageDetails->message_type == 'attachment'){
                $messageDetails->message = config('base_urls.chat_attachments_base_url').$messageDetails->message;
              }

              $response["code"] = 200;
              $response["status"] = "success";
              $response["message"] = 'Message sent successfully.';  
            } else {
              $response["code"] = 404;
              $response["status"] = "error";
              $response["message"] = 'Oops! Something went wrong.';  
            }
          } else {
            $response["code"] = 404;
            $response["status"] = "error";
            $response["message"] = 'All fields are required';  
          }
        break;
                                       
        case "getMessages":
          if(isset($req->users_customers_id) && isset($req->other_users_customers_id)){
            $chat_array =array();
            $day_array =array();
            $result = DB::table('chat_messages')->where([['sender_id',$req->other_users_customers_id], ['receiver_id', $req->users_customers_id]])->update(array('status' => 'Read'));  
            
            $all_chat = DB::table('chat_messages')->where([['sender_id',$req->users_customers_id],['receiver_id',$req->other_users_customers_id]])->orWhere([['sender_id',$req->other_users_customers_id], ['receiver_id',$req->users_customers_id]])->orderBy('chat_message_id','ASC')->get();
            if(sizeof($all_chat) > 0){
              foreach($all_chat as $key => $chat){
                $get_data['sender_type'] = $chat->sender_type;

                $chat->message = json_decode($chat->message);
                $day = Helper::get_day_difference($chat->send_date);

                if (in_array($day, $day_array, TRUE)){
                  $get_data['date']= '';
                } else {
                  array_push($day_array, $day);
                  $get_data['date']= $day;
                } 
                
                $get_data['time'] =  date('h:i A',strtotime($chat->send_time));
                $get_data['msgType'] = $chat->message_type;

                if($chat->message_type=='attachment'){
                  $attachment = config('base_urls.chat_attachments_base_url') . $chat->message;
                  $get_data['message'] = $attachment;
                } else {
                  $get_data['message'] = $chat->message;
                }
                $sender_data = DB::table('users_customers')->where('users_customers_id',$chat->sender_id)->first();
                $get_data['user_data'] = $sender_data;
              
                array_push($chat_array, $get_data);
                
                if(!empty($chat_array)){
                  $result =  DB::table('chat_messages')->where([
                    ['sender_id',$req->other_users_customers_id],
                    ['receiver_id',$req->users_customers_id]
                  ])->update(array('status'=>'Read'));
                }
              }

              if($chat_array){
                $response["code"] = 200;
                $response["status"] = "success";
                $response["data"] = $chat_array; 
              } else {
                $response["code"] = 404;
                $response["status"] = "error";
                $response["message"] = 'Error in chat array'; 
              }
            } else {
              $response["code"] = 404;
              $response["status"] = "error";
              $response["message"] = 'no chat history'; 
            }                       
          } else {
            $response["code"] = 404;
            $response["status"] = "error";
            $response["message"] = 'All fields are needed'; 
          }
        break;

        case "updateMessages":
          if(isset($req->users_customers_id) && isset($req->other_users_customers_id)){
            $user_id = $req->users_customers_id;
            $other_user_id  = $req->other_users_customers_id;
            $chat_array =array();
  
            $all_chat =  DB::table('chat_messages')
              ->where([['sender_id', $other_user_id], ['receiver_id',$user_id],['status','Unread']])
              ->orderBy('chat_message_id', 'ASC')->get();
            
            if(sizeof($all_chat) > 0){
              foreach($all_chat as $chat){
                $get_data['chat_message_id'] = $chat->chat_message_id;
                $get_data['sender_type'] = $chat->sender_type;

                $chat->message = json_decode($chat->message);                
                $get_data['time'] =  date('h:i A',strtotime($chat->send_date));
                $get_data['msgType'] = $chat->message_type;
                if($chat->message_type =='attachment'){
                  $image = config('base_urls.chat_attachments_base_url') . $chat->message;
                  $get_data['message'] = $image;
                } else { 
                  $get_data['message'] = $chat->message;
                } 

                $sender_data = DB::table('users_customers')->where('users_customers_id',$req->other_users_customers_id)->get();
                $get_data['users_data'] = $sender_data[0];
                array_push($chat_array, $get_data);
              }
               
              if(!empty($chat_array)){
                $result =  DB::table('chat_messages')->where([
                  ['sender_id',$other_user_id],
                  ['receiver_id',$user_id]
                  ])->update(array('status'=>'Read'));
              }
                         
              $chat_length   =  DB::table('chat_messages')->where([
                ['sender_id', $user_id],
                ['receiver_id',$other_user_id]
                ])->orWhere([
                    ['sender_id', $other_user_id],
                ['receiver_id',$user_id]
              ])->orderBy('chat_messages_id','ASC')->count();
            
              $finalDataset = array(
                  "chat_length" => $chat_length,
                  "unread_messages" => $chat_array,
              );

              $response["code"] = 200;
              $response["status"] = "success";
              $response["data"] = $finalDataset; 
            } else {
              $response["code"] = 404;
              $response["status"] = "error";
              $response["message"] = "no chat found"; 
            }
          } else {
            $response["code"] = 404;
            $response["status"] = "error";
            $response["message"] = "All fields are needed"; 
          }
        break;    
      }
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "Request type not Found"; 
    }

    return response()
     ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
     ->header('Content-Type', 'application/json');
  }
  /*** CHAT MESSAGES ***/

  /* EMAIL EXIST API */
  public function email_exist(Request $req){
    if (isset($req->email)) {
      $email=DB::table('users_customers')->where('email', $req->email)->first();
      if ($email) {
        $response["code"] = 200;
        $response["status"] = "error";
        $response["message"]  ="Email already exists.";
      }else{
        $response["code"] = 404;
        $response["status"] = "success";
        $response["message"] = "Email does not exists.";
      }
    }else{ 
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "Please enter email address.";
    }
    
    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* EMAIL EXIST API */

  /* GET ALL USER */
  public function all_users(Request $req){
  	if(isset($req->users_customers_id)){
	  	$fetch_data   =  DB::table('users_customers')
	  	->where('users_customers_id','!=',$req->users_customers_id)
	  	->where('status','Active')->get();
	    
	    if (count($fetch_data)>0) {
	      $response["code"] = 200;
	      $response["status"] = "success";
	      $response["data"] = $fetch_data;
	    } else {
	      $response["code"] = 404;
	      $response["status"] = "error"; 
	      $response["message"] = "no data found.";
	    }
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are required!"; 
    }
    return response()
    ->json(array( 'status' => $response["status"],isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* GET ALL USER */

  /* GET ALL USER SUGGESTED */
  public function all_users_suggested(Request $req){
    if(isset($req->email)){
      $fetch_data   =  DB::table('users_customers')
      ->where('email','Like', "%" . $req->email. "%")
      ->where('status','Active')->get();
      
      if (count($fetch_data)>0) {
        $response["code"] = 200;
        $response["status"] = "success";
        $response["data"] = $fetch_data;
      } else {
        $response["code"] = 404;
        $response["status"] = "error"; 
        $response["message"] = "no data found.";
      }
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are required!"; 
    }
    return response()
    ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* GET ALL USER SUGGESTED */

  /* USER TRIGGER NOTIFICATION PERMISSION */
  public function notification_permission(Request $req){
  	if (isset($req->users_customers_id)) {
  		$userId=['users_customers_id'=>$req->users_customers_id,'status'=>'Active'];
      $user=DB::table('users_customers')->where($userId)->first();
        if ($user) {
	    	if($user->notifications=="Yes"){
	    		$saveData['notifications'] ='No';
	    		$users_customers_id   = DB::table('users_customers')->where($userId)->update($saveData);
	    		$data=DB::table('users_customers')->where($userId)->first();
	    		  $response["code"] = 200;
			      $response["status"] = "success";
			      $response["data"] = $data;
	    	}else{
	    		$saveData['notifications'] ='Yes';
	    		$users_customers_id   = DB::table('users_customers')->where($userId)->update($saveData);
	    		$data=DB::table('users_customers')->where($userId)->first();
	    		  $response["code"] = 200;
			      $response["status"] = "success";
			      $response["data"] = $data;
	    	}
	    }else{
	      $response["code"] = 404;
	      $response["status"] = "error";
	      $response["message"] = "User does not exists.";
	    }
    }else{ 
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }
    return response()
    ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* USER TRIGGER NOTIFICATION PERMISSION */

  /* ALL CURRENCIES */
  public function all_currencies(){
    $fetch_data   =  SystemCurrency::with('country')->where('status', 'Active')->get();
    
    if (count($fetch_data)>0) {
      $response["code"] = 200;
      $response["status"] = "success";
      $response["data"] = $fetch_data;
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "no data found.";
    }
    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* ALL CURRENCIES */

  /* GET CURRENCIES BY ID */
  public function get_currencies_by_id(Request $req){
    if (isset($req->system_currencies_id)){
      $fetch_data   =  DB::table('system_currencies')->where('system_currencies_id', $req->system_currencies_id)->get();
      
      if (!empty($fetch_data)) {
        $response["code"] = 200;
        $response["status"] = "success";
        $response["data"] = $fetch_data;
      } else {
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "no data found.";
      }
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }
    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* GET CURRENCIES BY ID */

  /* ALL COUNTRIES */
  public function all_countries(){
    $fetch_data   =  DB::table('system_countries')->get();
    
    if (!empty($fetch_data)) {
      $response["code"] = 200;
      $response["status"] = "success";
      $response["data"] = $fetch_data;
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "no data found.";
    }
    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* ALL COUNTRIES */

  /* CREATE WALLET */
  public function create_wallet(Request $req){
    if (isset($req->users_customers_id) && isset($req->system_currencies_id)) {
      $userId=['users_customers_id'=>$req->users_customers_id];
      $user=DB::table('users_customers')->where($userId)->first();
      if ($user->status == 'Active') {
        $system_currency=DB::table('system_currencies')->where('system_currencies_id',$req->system_currencies_id)->first();
        if ($system_currency) {
          $wallet = UsersCustomersWallet::firstOrCreate(
                    ['users_customers_id' => $req->users_customers_id,'system_currencies_id'=>$req->system_currencies_id],
                    ['users_customers_id' => $req->users_customers_id,'system_currencies_id'=>$req->system_currencies_id]
                );
          $data=UsersCustomersWallet::with('currency')->where(['users_customers_id' => $req->users_customers_id,'system_currencies_id'=>$req->system_currencies_id])->first();

            $response["code"] = 200;
            $response["status"] = "success";
            $response["data"] = $data;
        }else{
          $response["code"] = 404;
          $response["status"] = "error";
          $response["message"] = "Currency does not exists.";
        }
      }else{
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "Your account is in ".$user->status." status. Please contact admin.";
      }
    }else{ 
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }
    return response()
    ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* CREATE WALLET */

  /* GET WALLET */
  public function get_wallet(Request $req){
    if (isset($req->users_customers_id)) {
      $fetch_data   = $data=UsersCustomersWallet::with('currency')->where('users_customers_id',$req->users_customers_id)->get();
    
      if (!empty($fetch_data)) {
        $response["code"] = 200;
        $response["status"] = "success";
        $response["data"] = $fetch_data;
      } else {
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "no data found.";
      }
    }else{ 
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }

    return response()
    ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* GET WALLET */

  /* GET CURRENCY CONVERTER */
  public function currency_converter(Request $req){
    if (isset($req->sender_currency_id) && isset($req->receiver_currency_id) && isset($req->from_amount)) {
      
      $sender_currency    = DB::table('system_currencies')->where('system_currencies_id', $req->sender_currency_id)->get()->first();
      $receiver_currency  = DB::table('system_currencies')->where('system_currencies_id', $req->receiver_currency_id)->get()->first();

      $req_url = "https://api.exchangerate.host/convert?from=$sender_currency->code&to=$receiver_currency->code&amount=$req->from_amount";
      $response_json = file_get_contents($req_url);
      if(false !== $response_json) {
          try {
            $url_response = json_decode($response_json);
            if($url_response->success === true) {
              //  if($url_response->info->rate > $receiver_currency->margin){
              //    $temp_converted_rate     = $url_response->info->rate - $receiver_currency->margin;
              //  }else{
              //    return response()->json([
              //      "status" => "error",
              //      "message"=> "Transfer fee greater than transfer amount"
              //    ])->header('Content-Type', 'application/json');
              // }
              // $from_amount   = number_format($req->from_amount,2);
              // $converted_amount   = number_format($temp_converted_rate * $req->from_amount,2);
              // $converted_rate   = number_format($temp_converted_rate,2);

              $temp_converted_rate     = $url_response->info->rate;
              $from_amount   = $req->from_amount;
              $converted_amount   = $temp_converted_rate * $req->from_amount;
              $converted_rate   = $temp_converted_rate;
            }

            $response["code"] = 404;
            $response["status"] = "success";
            $response['data'] = array('from_amount' => $from_amount, 'converted_rate' => $converted_rate, 'converted_amount' => $converted_amount);
          } catch(Exception $e) {
            $response["code"] = 404;
            $response["status"] = "error";
            $response['message'] = $e->getMessage();
          }
      } else {
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "Something Wrong";
      } 
    } else { 
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }

    return response()
    ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* GET CURRENCY CONVERTER */


  /* TRANSFER CURRENCY */
  public function transfer_currency(Request $req){
    if (isset($req->from_users_customers_id) && isset($req->from_system_currencies_id) && isset($req->from_amount) && isset($req->to_users_customers_id) && isset($req->to_system_currencies_id) && isset($req->payment_method_id) && isset($req->system_countries_id) && isset($req->system_currencies_id)) 
    {
      $sender=DB::table('users_customers')->where('users_customers_id',$req->from_users_customers_id)->first();
      if ($sender->status == 'Active') 
      {
        $receiver =DB::table('users_customers')->where('users_customers_id', $req->to_users_customers_id)->orWhere('email',$req->to_users_customers_id)->first();
        if ($receiver->status == 'Active') 
        {
          $sender_currency=DB::table('system_currencies')->where('system_currencies_id',$req->from_system_currencies_id)->first();
          if ($sender_currency) 
          {
            $receiver_currency=DB::table('system_currencies')->where('system_currencies_id',$req->to_system_currencies_id)->first();
            if ($receiver_currency) 
            {
              $sender_wallet = UsersCustomersWallet::where([
                  'users_customers_id' => $req->from_users_customers_id,
                  'system_currencies_id'=>$req->from_system_currencies_id
                ])->first();
              if($sender_wallet)
              {
                  $receiver_wallet = UsersCustomersWallet::where([
                      'users_customers_id' => $req->to_users_customers_id,
                      'system_currencies_id'=>$req->to_system_currencies_id
                    ])->first();
                  while(!$receiver_wallet){
                    $wallet = UsersCustomersWallet::firstOrCreate(
                              ['users_customers_id' => $req->to_users_customers_id,
                              'system_currencies_id'=>$req->to_system_currencies_id],
                              ['users_customers_id' => $req->to_users_customers_id,
                              'system_currencies_id'=>$req->to_system_currencies_id]
                          );
                  }
                  
                  $system_currencies = DB::table('system_currencies')->where('system_currencies_id',$req->system_currencies_id)->first();
                  if($sender_wallet->wallet_amount != 0 && $sender_wallet->wallet_amount >= $req->from_amount){
                    $req_url = "https://api.exchangerate.host/convert?from=$sender_currency->code&to=$system_currencies->code&amount=$req->from_amount";
                    $response_json = file_get_contents($req_url);
                    if(false !== $response_json) {
                        try {
                            $url_response = json_decode($response_json);
                            if($url_response->success === true) {
                              $sender_amount_result=$url_response->result;
                              $admin_share_amount=$sender_amount_result*$system_currencies->margin;
                              if($sender_amount_result>$admin_share_amount){
                                $sender_converted_amount=$sender_amount_result-$admin_share_amount;
                                $converted_rate   = $url_response->info->rate;
                              }else{
                                $response["code"] = 404;
                                $response["status"] = "error";
                                $response["message"] = "Transfer fee greater than transfer amount";
                              }
                                // $temp_converted_rate     = $url_response->info->rate - $receiver_currency->margin;
                
                                // $converted_amount   = number_format($temp_converted_rate * $req->from_amount,2);
                                // $converted_rate   = number_format($temp_converted_rate,2);

                                // $converted_amount   = $temp_converted_rate * $req->from_amount;
                                
                            }
                        } catch(Exception $e) {
                            // Handle JSON parse error...
                          $response["code"] = 404;
                          $response["status"] = "error";
                          $response['message'] = $e->getMessage();
                        }
                    }else{
                      $response["code"] = 404;
                      $response["status"] = "error";
                      $response["message"] = "Something Wrong";
                    } 

                    
                    
                    $req_url = "https://api.exchangerate.host/convert?from=$system_currencies->code&to=$receiver_currency->code&amount=$sender_converted_amount";
                    $response_json = file_get_contents($req_url);
                    if(false !== $response_json) {
                        try {
                            $url_response = json_decode($response_json);
                            if($url_response->success === true) {
                                $receiver_amount_result   = $url_response->result;
                            }
                        } catch(Exception $e) {
                            // Handle JSON parse error...
                          $response["code"] = 404;
                          $response["status"] = "error";
                          $response['message'] = $e->getMessage();
                        }
                    }else{
                      $response["code"] = 404;
                      $response["status"] = "error";
                      $response["message"] = "Something Wrong";
                    } 
                    //GET BASE CURRENCY CONVERSION
                    // admin_share
                    $admin_share = DB::table('system_settings')->where('type', 'admin_share')->first()->description;
                    // $admin_share_amount = round((($converted_amount*$admin_share)/100),2);
                    // $admin_share_amount = 0;
                    $sender_amount = $sender_wallet->wallet_amount - $req->from_amount;
                    $receiver_amount = $receiver_wallet->wallet_amount + $receiver_amount_result;
                    $receiver_amount_txns = $receiver_amount_result;
                    // admin_share
                    
                    
                    // $data=[
                    //   'margin' => $receiver_currency->margin,
                    //   'sender_converted_amount' => $sender_converted_amount,
                    //   'receiver_amount' => $receiver_amount,
                    //   'receiver_amount_txns' => $receiver_amount_txns,
                    //   'from_amount' => $req->from_amount,
                    // ];
                    $receiver_wallet_update = UsersCustomersWallet::where([
                      'users_customers_id' => $req->from_users_customers_id,
                      'system_currencies_id'=>$req->from_system_currencies_id
                    ])->update([
                      "wallet_amount"=>$sender_amount
                    ]);

                    $receiver_wallet_updated=UsersCustomersWallet::where(['users_customers_id' => $req->to_users_customers_id,'system_currencies_id'=>$req->to_system_currencies_id])->update([
                    "wallet_amount"=>$receiver_amount
                    ]);

                    $data=UsersCustomersTxns::create([   
                      "from_users_customers_id"   => $req->from_users_customers_id,
                      "from_system_currencies_id" => $req->from_system_currencies_id,
                      "from_amount"               => $req->from_amount, 
                      "to_users_customers_id"     => $req->to_users_customers_id,
                      "to_system_currencies_id"   => $req->to_system_currencies_id,
                      "to_amount"                 => $receiver_amount_txns, 
                      "payment_method_id"         => $req->payment_method_id,
                      "admin_share"               => $admin_share, 
                      "admin_share_amount"        => $admin_share_amount, 
                      "system_countries_id"       => $req->system_countries_id,          
                      "system_currencies_id"      => $req->system_currencies_id,          
                      "base_amount"               => $sender_amount_result,        
                      'status'                    => "Pending",
                    ]);

                    $response["code"] = 200;
                    $response["status"] = "success";
                    $response["data"] = $data;
                  }else{
                    $response["code"] = 404;
                    $response["status"] = "error";
                    $response["message"] = "You have not sufficient amount in your wallet to transfer.";
                  } 
              }else{
                $response["code"] = 404;
                $response["status"] = "error";
                $response["message"] = "You have no wallet with this currency";
              }
            }else{
              $response["code"] = 404;
              $response["status"] = "error";
              $response["message"] = "Receiver Currency does not exists.";
            }  
          }else{
            $response["code"] = 404;
            $response["status"] = "error";
            $response["message"] = "Your Currency does not exists.";
          }
        }else{
          $response["code"] = 404;
          $response["status"] = "error";
          $response["message"] = "Your account is in ".$receiver->status." status. Please contact admin.";
        }  
      }else{
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "Your account is in ".$sender->status." status. Please contact admin.";
      }
    }else{ 
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }
    return response()
    ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* TRANSFER CURRENCY */

  /* GET ALL USER transactions */
  public function all_transactions(Request $req){
    if(isset($req->users_customers_id)){
      //$fetch_data   =  UsersCustomersTxns::where('status','Approved')->where('from_users_customers_id',$req->users_customers_id)->orWhere('to_users_customers_id',$req->users_customers_id)
      $fetch_data   =  UsersCustomersTxns::where('from_users_customers_id',$req->users_customers_id)->orWhere('to_users_customers_id',$req->users_customers_id)->orderBy('users_customers_txns_id','DESC')->get();
      $get_data=[];
      foreach ($fetch_data as $key => $data) {
        $from_system_currencies=DB::table('system_currencies')->where('system_currencies_id',$data->from_system_currencies_id)->first();
        $data->from_system_currencies=$from_system_currencies->symbol;
        $to_system_currencies=DB::table('system_currencies')->where('system_currencies_id',$data->to_system_currencies_id)->first();
        $data->to_system_currencies=$to_system_currencies->symbol;
        if($data->to_users_customers_id==$req->users_customers_id){
          $data->from_users_customers=DB::table('users_customers')->where('users_customers_id', $data->from_users_customers_id)->first();
        }
        if($data->from_users_customers_id==$req->users_customers_id){
          $data->to_users_customers=DB::table('users_customers')->where('users_customers_id', $data->to_users_customers_id)->first();
        }
        $get_data[]=$data;
      }
      if (count($get_data)>0) {
        $response["code"] = 200;
        $response["status"] = "success";
        $response["data"] = $get_data;
      } else {
        $response["code"] = 404;
        $response["status"] = "error"; 
        $response["message"] = "No transactions available.";
      }
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are required!"; 
    }
    return response()
    ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* GET ALL USER transactions */

  /* SWAP WALLET AMOUNT*/
  public function wallet_swap(Request $req){
    if (isset($req->users_customers_id) && isset($req->from_users_customers_wallets_id) && isset($req->amount_from) && isset($req->to_users_customers_wallets_id) && isset($req->system_currencies_id)) 
    {
      $user=DB::table('users_customers')->where(['users_customers_id'=>$req->users_customers_id,'status'=>'Active'])->first();
      if ($user) 
      {
        $sender_wallet = UsersCustomersWallet::where([
            'users_customers_id' => $req->users_customers_id,
            'users_customers_wallets_id'=>$req->from_users_customers_wallets_id
          ])->with('currency')->first();
        if($sender_wallet)
        {
          $receiver_wallet = UsersCustomersWallet::where([
            'users_customers_id' => $req->users_customers_id,
            'users_customers_wallets_id'=>$req->to_users_customers_wallets_id
          ])->with('currency')->first();
          if($receiver_wallet){
            $system_currencies = DB::table('system_currencies')->where('system_currencies_id',$req->system_currencies_id)->first();
            if($sender_wallet->wallet_amount != 0 && $sender_wallet->wallet_amount >= $req->amount_from){
              $sender_currency_code=$sender_wallet->currency->code;
              $req_url = "https://api.exchangerate.host/convert?from=$sender_currency_code&to=$system_currencies->code&amount=$req->amount_from";
              $response_json = file_get_contents($req_url);
              if(false !== $response_json) {
                  try {
                      $url_response = json_decode($response_json);
                      if($url_response->success === true) {
                          $sender_amount_result=$url_response->result;
                          $admin_share_amount=$sender_amount_result*$system_currencies->margin;
                          if($sender_amount_result>$admin_share_amount){
                            $sender_converted_amount=$sender_amount_result-$admin_share_amount;
                            $converted_rate   = $url_response->info->rate;
                          }else{
                            return response()->json([
                                          "status" => "error",
                                          "message"=> "Transfer fee greater than transfer amount"
                                        ])->header('Content-Type', 'application/json');
                          }
                        // $temp_converted_rate     = $url_response->info->rate - $receiver_wallet->currency->margin;
          
                          // $converted_amount   = number_format($temp_converted_rate * $req->amount_from,2);
                          // $converted_rate   = number_format($temp_converted_rate,2);

                          //$converted_amount   = $temp_converted_rate * $req->amount_from;
                          //$converted_rate   = $temp_converted_rate;
                      } 
                  } catch(Exception $e) {
                      // Handle JSON parse error...
                    $response["code"] = 404;
                    $response["status"] = "error";
                    $response['message'] = $e->getMessage();
                  }
              }else{
                $response["code"] = 404;
                $response["status"] = "error";
                $response["message"] = "Something Wrong";
              } 

              // admin_share
              $receiver_currency_code=$receiver_wallet->currency->code;
              $req_url = "https://api.exchangerate.host/convert?from=$system_currencies->code&to=$receiver_currency_code&amount=$sender_converted_amount";
                    $response_json = file_get_contents($req_url);
                    if(false !== $response_json) {
                        try {
                            $url_response = json_decode($response_json);
                            if($url_response->success === true) {
                                $receiver_amount_result   = $url_response->result;
                            }
                        } catch(Exception $e) {
                            // Handle JSON parse error...
                          $response["code"] = 404;
                          $response["status"] = "error";
                          $response['message'] = $e->getMessage();
                        }
                    }else{
                      $response["code"] = 404;
                      $response["status"] = "error";
                      $response["message"] = "Something Wrong";
                    } 
              $admin_share = DB::table('system_settings')->where('type', 'admin_share')->first()->description;
              //GET BASE CURRENCY CONVERSION
              $sender_amount = $sender_wallet->wallet_amount - $req->amount_from;
              $receiver_amount = $receiver_wallet->wallet_amount + $receiver_amount_result;
              $receiver_amount_txns = $receiver_amount_result;
              $sender_wallet_update = UsersCustomersWallet::where([
                'users_customers_id' => $req->users_customers_id,
                'users_customers_wallets_id'=>$req->from_users_customers_wallets_id
              ])->update([
                "wallet_amount"=>$sender_amount
              ]);

              $receiver_wallet_updated=UsersCustomersWallet::where([
                'users_customers_id' => $req->users_customers_id,
                'users_customers_wallets_id'=>$req->to_users_customers_wallets_id
              ])->update([
                "wallet_amount"=>$receiver_amount
              ]);

              $data=SwapWallet::create([   
                "users_customers_id"              => $req->users_customers_id,
                "from_users_customers_wallets_id" => $req->from_users_customers_wallets_id,
                "to_users_customers_wallets_id"   => $req->to_users_customers_wallets_id,
                "amount_from"                     => $req->amount_from, 
                "amount_to"                       => $receiver_amount_txns, 
                "exchange_rate"                   => $converted_rate, 
                "admin_share"                     => $admin_share, 
                "admin_share_amount"              => $admin_share_amount,          
                "system_currencies_id"            => $req->system_currencies_id,          
                "base_amount"                     => $sender_amount_result,        
                "status"                          => "Successful",
              ]);

              $response["code"] = 200;
              $response["status"] = "success";
              $response["data"] = $data;
            }else{
              $response["code"] = 404;
              $response["status"] = "error";
              $response["message"] = "You have not sufficient amount in your wallet to transfer.";
            }
          }else{
            $response["code"] = 404;
            $response["status"] = "error";
            $response["message"] = "Wallet not exist.";
          }    
        }else{
          $response["code"] = 404;
          $response["status"] = "error";
          $response["message"] = "Wallet not exist.";
        }  
      }else{
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "Your account is in ".$user->status." status. Please contact admin.";
      }
    }else{ 
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }
    return response()
    ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* SWAP WALLET AMOUNT*/

  /* SWAP OFFER*/
  public function swap_offer(Request $req){
    if (isset($req->users_customers_id) && isset($req->from_system_currencies_id) && isset($req->to_system_currencies_id) && isset($req->from_amount) && isset($req->exchange_rate) && isset($req->system_currencies_id) && isset($req->expiry_time)) 
    {
      $user=DB::table('users_customers')->where(['users_customers_id'=>$req->users_customers_id,'status'=>'Active'])->first();
      if ($user) 
      {
        $sender_currency = UsersCustomersWallet::where([
            'users_customers_id' => $req->users_customers_id,
            'system_currencies_id'=>$req->from_system_currencies_id
          ])->with('currency')->first();
        if($sender_currency)
        {
          $receiver_currency= SystemCurrency::where('system_currencies_id',$req->to_system_currencies_id)->first();
          if($receiver_currency){
            if($sender_currency->wallet_amount != 0 && $sender_currency->wallet_amount >= $req->from_amount){

              $temp_converted_rate     = $req->exchange_rate - $receiver_currency->margin;

              $converted_amount   = $temp_converted_rate * $req->from_amount;
              // $converted_rate   = number_format($temp_converted_rate,2);
              $converted_rate   = $temp_converted_rate;
                      

              // admin_share
              $admin_share = DB::table('system_settings')->where('type', 'admin_share')->first()->description;
              // $admin_share_amount = round((($converted_amount*$admin_share)/100),2);
              $admin_share_amount = 0;
              $sender_amount = $sender_currency->wallet_amount - $req->from_amount;
              // $receiver_amount_txns = $converted_amount - $admin_share_amount;

              
              // admin_share
              
              //GET BASE CURRENCY CONVERSION
              $base_amount = 0;
              $system_currencies = DB::table('system_currencies')->where('system_currencies_id',$req->system_currencies_id)->first();
              $sender_currency_code=$sender_currency->currency->code;
              $req_url_base = "https://api.exchangerate.host/convert?from=$sender_currency_code&to=$system_currencies->code&amount=$req->from_amount";
              $response_json_base = file_get_contents($req_url_base);
              if(false !== $response_json_base) {
                  try {
                      $url_response_base = json_decode($response_json_base);
                      if($url_response_base->success === true) {
                          $base_amount   = $url_response_base->result;
                      }
                  } catch(Exception $e) {
                      // Handle JSON parse error...
                    $response["code"] = 404;
                    $response["status"] = "error";
                    $response['message'] = $e->getMessage();
                  }
              }else{
                $response["code"] = 404;
                $response["status"] = "error";
                $response["message"] = "Something Wrong";
              } 
              
              // Add hours to the current time
              // $new_time = Carbon::now()->addHours($req->expiry_time);
              $save_data=[   
                "users_customers_id"              => $req->users_customers_id,
                "from_system_currencies_id"       => $req->from_system_currencies_id,
                "to_system_currencies_id"         => $req->to_system_currencies_id,
                "from_amount"                     => $req->from_amount, 
                "to_amount"                       => $converted_amount, 
                "exchange_rate"                   => $req->exchange_rate, 
                "admin_share"                     => $admin_share, 
                "admin_share_amount"              => $admin_share_amount,          
                "system_currencies_id"            => $req->system_currencies_id,          
                "base_amount"                     => $base_amount,        
                "expiry_date_time"                => $req->expiry_time, 
                'date_added'                      => Carbon::now(),      
                "status"                          => "Pending",
              ];
              $swap_offers_id   = DB::table('swap_offers')->insertGetId($save_data);
              $swap_offers_data      = DB::table('swap_offers')->where('swap_offers_id', $swap_offers_id)->first();

              $response["code"] = 200;
              $response["status"] = "success";
              $response["data"] = $swap_offers_data;
            }else{
              $response["code"] = 404;
              $response["status"] = "error";
              $response["message"] = "You have not sufficient amount in your wallet to transfer.";
            }
          }else{
            $response["code"] = 404;
            $response["status"] = "error";
            $response["message"] = "Receiver currency not exist.";
          }    
        }else{
          $response["code"] = 404;
          $response["status"] = "error";
          $response["message"] = "You wallet with that currency not exist.";
        }  
      }else{
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "Your account is in ".$user->status." status. Please contact admin.";
      }
    }else{ 
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }
    return response()
    ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* SWAP OFFER*/

  /* SWAP OFFER REQUEST*/
  public function swap_offer_request(Request $req){
    if (isset($req->from_users_customers_id) && isset($req->swap_offers_id) ) 
    {
      $user=DB::table('users_customers')->where(['users_customers_id'=>$req->from_users_customers_id,'status'=>'Active'])->first();
      if ($user) 
      {
        $swap_offer = SwapOffer::where(['swap_offers_id'=>$req->swap_offers_id,'status'=>'Pending'])->first();
        if($swap_offer){

              $data=SwapOfferRequest::firstOrCreate([   
                "from_users_customers_id"  => $req->from_users_customers_id,
                "swap_offers_id"           => $req->swap_offers_id
              ],[   
                "from_users_customers_id"  => $req->from_users_customers_id,
                "swap_offers_id"           => $req->swap_offers_id,      
                "status"                   => "Pending",
              ]);
              $dataInsert=array(
                'users_type'=>"User",
                'senders_id'=>$req->from_users_customers_id,
                'receivers_id'=>$swap_offer->users_customers_id,
                'message'=> ucfirst($user->first_name).' Requested For SwapOffer',
                'date_added'=>date('Y-m-d H:i:s'),
                'date_modified'=>date('Y-m-d H:i:s'),
                'status'=>'Unread'
              );
              if($data){
                $this->send_notification($dataInsert);
              }
              $response["code"] = 200;
              $response["status"] = "success";
              $response["data"] = $data; 
        }else{
          $response["code"] = 404;
          $response["status"] = "error";
          $response["message"] = "Swap offer not exist.";
        }
      }else{
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "Your account is in ".$user->status." status. Please contact admin.";
      }
    }else{ 
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }
    return response()
    ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* SWAP OFFER REQUEST*/

  /* GET ALL SWAP OFFERS */
  public function all_swap_offers(Request $req){
    if(isset($req->users_customers_id)){
      $swap_offer_expire = DB::table('system_settings')->where('type', 'swap_offer_expire')->first()->description; // return day like 7,4,5
      $expiryDate = Carbon::now()->addDays($swap_offer_expire)->format('Y-m-d');
      $fetch_data = SwapOffer::with(['from_currency', 'to_currency'])
            ->where('status', 'Pending')
            ->where('users_customers_id', '!=', $req->users_customers_id)
            ->where('expiry_date_time', '>', date('Y-m-d'))
            ->whereDate('date_added', '<=', $expiryDate) // Apply expiry date filter
            ->orderBy('swap_offers_id', 'DESC')
            ->get();

      $users_wallets   =  UsersCustomersWallet::where(['users_customers_id'=>$req->users_customers_id,'status'=>'Active'])->get();
      $get_data=[];
      $get_data_time_check=[];
      foreach ($fetch_data as $key => $data) {
        $data->time_ago=Carbon::parse($data->date_added)->diffForHumans();

        $liked = DB::table('swap_offers_favourite')->where(['users_customers_id'=>$req->users_customers_id, 'swap_offers_id'=>$data->swap_offers_id, 'status'=>'Active'])->count();
        if($liked > 0){
          $data->liked = 'Yes';
        } else {
          $data->liked = 'No';
        }
        $get_data_time_check[]=$data;
      }
      foreach ($get_data_time_check as $key => $data) {
        foreach($users_wallets as $key => $wallet){
          if($data->to_system_currencies_id==$wallet->system_currencies_id){
            $get_data[]=$data;
          }
        }
      }
      if (count($get_data)>0) {
        $response["code"] = 200;
        $response["status"] = "success";
        $response["data"] = $get_data;
      } else {
        $response["code"] = 404;
        $response["status"] = "error"; 
        $response["message"] = "no data found.";
      }
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are required!"; 
    }
    return response()
    ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* GET ALL SWAP OFFERS */

  /* SWAP OFFER REQUEST APPROVE*/
  /* SWAP OFFER REQUEST APPROVE*/
  public function swap_offer_request_approve(Request $req){
    if (isset($req->swap_offers_requests_id) && isset($req->swap_offers_id) && isset($req->from_users_customers_id) ) 
    {
      $user=DB::table('users_customers')->where(['users_customers_id'=>$req->from_users_customers_id,'status'=>'Active'])->first();
      if ($user) 
      {
        $swap_offer = SwapOffer::where(['swap_offers_id'=>$req->swap_offers_id,'status'=>'Pending'])->first();
        if($swap_offer){
          $swap_offer_request = SwapOfferRequest::where(['swap_offers_requests_id'=>$req->swap_offers_requests_id,'status'=>'Pending'])->first();
          if($swap_offer_request){
            $sender_send_wallet = UsersCustomersWallet::where([
              'users_customers_id' => $swap_offer->users_customers_id,
              'system_currencies_id'=>$swap_offer->from_system_currencies_id
            ])->with('currency')->first();
            if($sender_send_wallet){
              $sender_receive_wallet = UsersCustomersWallet::where([
                'users_customers_id' => $swap_offer->users_customers_id,
                'system_currencies_id'=>$swap_offer->to_system_currencies_id
              ])->with('currency')->first();
                if($sender_receive_wallet){
                  $receiver_receive_wallet = UsersCustomersWallet::where([
                    'users_customers_id' => $req->from_users_customers_id,
                    'system_currencies_id'=>$swap_offer->from_system_currencies_id
                  ])->with('currency')->first();
                  if($receiver_receive_wallet){
                    $receiver_send_wallet = UsersCustomersWallet::where([
                      'users_customers_id' => $req->from_users_customers_id,
                      'system_currencies_id'=>$swap_offer->to_system_currencies_id
                    ])->with('currency')->first();
                    if($receiver_send_wallet){
                      DB::beginTransaction();
                    try {
           
                        if($sender_send_wallet->wallet_amount != 0 && $sender_send_wallet->wallet_amount >= $swap_offer->from_amount){
                          // Detect amount from Sender wallet
                          $sender_send_amount = $sender_send_wallet->wallet_amount - $swap_offer->from_amount;
                          $sender_send_wallet_updated = UsersCustomersWallet::where([
                            'users_customers_id' => $swap_offer->users_customers_id,
                            'system_currencies_id'=>$swap_offer->from_system_currencies_id
                          ])->update([
                            "wallet_amount"=>$sender_send_amount
                          ]);
                          // Detect amount from Sender wallet

                          // Add amount to Receiver wallet
                          $receiver_receive_amount = $receiver_receive_wallet->wallet_amount + $swap_offer->from_amount;
                          $receiver_receive_wallet_updated = UsersCustomersWallet::where([
                            'users_customers_id' => $req->from_users_customers_id,
                            'system_currencies_id'=>$swap_offer->from_system_currencies_id
                          ])->update([
                            "wallet_amount"=>$receiver_receive_amount
                          ]);
                          // Add amount to Receiver wallet
                        
                        }else{
                          $response["code"] = 404;
                          $response["status"] = "error";
                          $response["message"] = "You have not sufficient amount in your wallet to transfer.";
                        }

                        if($receiver_send_wallet->wallet_amount != 0 && $receiver_send_wallet->wallet_amount >= $swap_offer->to_amount){  
                          // Detect amount from Receiver wallet
                          $receiver_send_amount = $receiver_send_wallet->wallet_amount - $swap_offer->to_amount;
                          $receiver_send_wallet_updated=UsersCustomersWallet::where([
                            'users_customers_id' => $req->from_users_customers_id,
                            'system_currencies_id'=>$swap_offer->to_system_currencies_id
                          ])->update([
                            "wallet_amount"=>$receiver_send_amount
                          ]);
                          // Detect amount from Receiver wallet
                          
                          // Add amount to Sender wallet
                          $sender_receive_amount = $sender_receive_wallet->wallet_amount + $swap_offer->to_amount;
                          $sender_receive_wallet_updated=UsersCustomersWallet::where([
                            'users_customers_id' => $swap_offer->users_customers_id,
                            'system_currencies_id'=>$swap_offer->to_system_currencies_id
                          ])->update([
                            "wallet_amount"=>$sender_receive_amount
                          ]);
                          // Add amount to Sender wallet
                        }else{
                          $response["code"] = 404;
                          $response["status"] = "error";
                          $response["message"] = "You have not sufficient amount in your wallet to transfer.";
                        }
                        
                          $data=SwapOfferRequest::where("swap_offers_requests_id",$req->swap_offers_requests_id)->update(["status"=>"Accepted"]);
                          $pending_offers=SwapOfferRequest::where(["swap_offers_id"=>$req->swap_offers_id,"status"=>"Pending"])->get();
                          foreach ($pending_offers as $key => $offer) {
                            $offer_update=SwapOfferRequest::where("swap_offers_requests_id",$offer->swap_offers_requests_id)->update(["status"=>"Rejected"]);
                          }
                          DB::commit();
                          $response["code"] = 200;
                          $response["status"] = "success";
                          $response["data"] = $data;

                        } catch (\Exception $ex) {
                            DB::rollback();
                            $response["code"] = 404;
                          $response["status"] = "error";
                          $response["message"] = "Something Wrong";
                        } 
                      }else{
                        $response["code"] = 404;
                        $response["status"] = "error";
                        $response["message"] = "wallet not exist.";
                      }    
                  }else{
                    $response["code"] = 404;
                    $response["status"] = "error";
                    $response["message"] = "Wallet not exist.";
                  }    
                }else{
                  $response["code"] = 404;
                  $response["status"] = "error";
                  $response["message"] = "Wallet not exist.";
                }    
            }else{
              $response["code"] = 404;
              $response["status"] = "error";
              $response["message"] = "Wallet not exist.";
            }
          }else{
            $response["code"] = 404;
            $response["status"] = "error";
            $response["message"] = "Swap offer request not exist.";
          }    
        }else{
          $response["code"] = 404;
          $response["status"] = "error";
          $response["message"] = "Swap offer not exist.";
        }  
      }else{
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "Your account is in ".$user->status." status. Please contact admin.";
      }
    }else{ 
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }
    return response()
    ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }

  /* SWAP OFFER REQUEST APPROVE*/

   /* GET USER SWAP OFFERS Requests */
   public function user_swap_offers_requests(Request $req){
    if(isset($req->swap_offers_id)){
      $get_data = SwapOfferRequest::where(["swap_offers_id"=>$req->swap_offers_id,'status'=>'Pending'])->get();

      $final_list = []; 
      foreach ($get_data as $key => $data) {
        $data->user_data = DB::table('users_customers')->where(['users_customers_id'=>$data->from_users_customers_id])->first();
        $final_list[] = $data;
      } 

      if (count($final_list) > 0) {
        $response["code"] = 200;
        $response["status"] = "success";
        $response["data"] = $final_list;
      } else {
        $response["code"] = 404;
        $response["status"] = "error"; 
        $response["message"] = "no data found.";
      }
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are required!"; 
    }
    return response()
    ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* GET USER SWAP OFFERS Requests */

  /* GET USER SWAP OFFERS */
  public function user_swap_offers(Request $req){
    if(isset($req->users_customers_id)){
      $fetch_data   =  SwapOffer::with(['from_currency','to_currency'])->where(['users_customers_id'=>$req->users_customers_id,'status'=>'Pending'])->where('expiry_date_time', '>', date('Y-m-d'))->orderBy('swap_offers_id','DESC')->get();
      $get_data=[];
      foreach ($fetch_data as $key => $data) {
        $data->time_ago=Carbon::parse($data->date_added)->diffForHumans();
        $get_data[]=$data;
      }
      if (count($get_data)>0) {
        $response["code"] = 200;
        $response["status"] = "success";
        $response["data"] = $get_data;
      } else {
        $response["code"] = 404;
        $response["status"] = "error"; 
        $response["message"] = "no data found.";
      }
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are required!"; 
    }
    return response()
    ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* GET USER SWAP OFFERS */

  /* SELL CURRENCY RATE */
  public function sell_currency_rate(Request $req){
    if (isset($req->from_system_currencies_id) && isset($req->to_system_currencies_id) && isset($req->from_amount)) 
    {
      $from_currency=DB::table('system_currencies')->where(['system_currencies_id'=>$req->from_system_currencies_id,'status'=>'Active'])->first();
      if ($from_currency) 
      {
        $to_currency=DB::table('system_currencies')->where(['system_currencies_id'=>$req->to_system_currencies_id,'status'=>'Active'])->first();
        if ($to_currency) 
        {       
          
                $req_url = "https://api.exchangerate.host/convert?from=$from_currency->code&to=$to_currency->code&amount=$req->from_amount";
                $response_json = file_get_contents($req_url);
                if(false !== $response_json) {
                    try {
                        $url_response = json_decode($response_json);
                        if($url_response->success === true) {
                          if($url_response->info->rate>$to_currency->margin){
                              $temp_converted_rate     = $url_response->info->rate - $to_currency->margin;
                            }else{
                              return response()->json([
                                            "status" => "error",
                                            "message"=> "Transfer fee greater than transfer amount"
                                          ])->header('Content-Type', 'application/json');
                            }
                            // $converted_amount   = number_format($temp_converted_rate * $req->from_amount,2);
                            // $converte_rate   = number_format($temp_converted_rate,2);

                            $converted_amount   = $temp_converted_rate * $req->from_amount;
                            $converte_rate   = $temp_converted_rate;
                        }
                    } catch(Exception $e) {
                        // Handle JSON parse error...
                      $response["code"] = 404;
                      $response["status"] = "error";
                      $response['message'] = $e->getMessage();
                    }
                }else{
                  $response["code"] = 404;
                  $response["status"] = "error";
                  $response["message"] = "Something Wrong";
                } 
                $admin_rate_amount=$to_currency->admin_rate*$req->from_amount;
                $data = new \stdClass(); 

                $data->converte_rate = $converte_rate;
                $data->converted_amount = $converted_amount;
                $data->admin_rate_amount = $admin_rate_amount;

                $response["code"] = 200;
                $response["status"] = "success";
                $response["data"] = $data;
            
        }else{
          $response["code"] = 404;
          $response["status"] = "error";
          $response["message"] = "From Currency does not exists.";
        }
      }else{
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "To Currency does not exists.";
      }
    }else{ 
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }
    return response()
    ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* SELL CURRENCY RATE */

  /* BUY CURRENCY RATE */
  public function buy_currency_rate(Request $req){
    if (isset($req->from_system_currencies_id) && isset($req->to_system_currencies_id) && isset($req->from_amount)) 
    {
      $from_currency=DB::table('system_currencies')->where(['system_currencies_id'=>$req->from_system_currencies_id,'status'=>'Active'])->first();
      if ($from_currency) 
      {
        $to_currency=DB::table('system_currencies')->where(['system_currencies_id'=>$req->to_system_currencies_id,'status'=>'Active'])->first();
        if ($to_currency) 
        {
                $req_url = "https://api.exchangerate.host/convert?from=$from_currency->code&to=$to_currency->code&amount=$req->from_amount";
                $response_json = file_get_contents($req_url);
                if(false !== $response_json) {
                    try {
                        $url_response = json_decode($response_json);
                        if($url_response->success === true) {
                            $buy_rate     = $url_response->info->rate;
            
                            // $converted_amount   = number_format($buy_rate * $req->from_amount,2);
                            // $converte_rate   = number_format($buy_rate,2);

                            $converted_amount   = $buy_rate * $req->from_amount;
                            $converte_rate   = $buy_rate;
                        }
                    } catch(Exception $e) {
                        // Handle JSON parse error...
                      $response["code"] = 404;
                      $response["status"] = "error";
                      $response['message'] = $e->getMessage();
                    }
                }else{
                  $response["code"] = 404;
                  $response["status"] = "error";
                  $response["message"] = "Something Wrong";
                } 
                $admin_rate_amount=$to_currency->admin_rate*$req->from_amount;
                $data = new \stdClass(); 

                $data->converte_rate = $converte_rate;
                $data->converted_amount = $converted_amount;
                $data->admin_rate_amount = $admin_rate_amount;
                

                $response["code"] = 200;
                $response["status"] = "success";
                $response["data"] = $data;
            
        }else{
          $response["code"] = 404;
          $response["status"] = "error";
          $response["message"] = "From Currency does not exists.";
        }
      }else{
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "To Currency does not exists.";
      }
    }else{ 
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }
    return response()
    ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* BUY CURRENCY RATE */

  /* USER FEEDBACK */
  public function user_feedback(Request $req){
    if (isset($req->users_customers_id) && isset($req->name) && isset($req->email) && isset($req->subject)) {
      $user_exist=DB::table('users_customers')->where(['users_customers_id'=>$req->users_customers_id])->first();
      if ($user_exist){
        $user=DB::table('users_customers')->where(['users_customers_id'=>$req->users_customers_id,'status'=>'Active'])->first();
        if ($user){
          $saveData['users_customers_id']   = $req->users_customers_id;
          $saveData['name']                 = $req->name;
          $saveData['email']                = $req->email;
          $saveData['subject']              = $req->subject;
        
          $feedback      = Feedback::updateOrCreate(['users_customers_id' => $req->users_customers_id],$saveData);

          $response["code"]     = 200;   
          $response["status"]   = "success";
          $response["data"]     = $feedback;
        }else{
          $response["code"] = 404;
          $response["status"] = "error";
          $response["message"] = "Your account is in ".$user->status." status. Please contact admin.";
        }
      }else{
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "User not exist.";
      }
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }
    
    return response()
     ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
     ->header('Content-Type', 'application/json');
  }
  /* USER FEEDBACK */

  /* ALL FAQs*/
  public function all_faqs(){
    $faqs = FAQ::where('status','Active')->get();
    
    if (count($faqs)>0) {
      $response["code"] = 200;
      $response["status"] = "success";
      $response["data"] = $faqs;
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "no data found.";
    }
    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* ALL FAQs*/
  
  /* ALL FAVORITE SWAP OFFERS*/
  public function all_favorite_swaps_offers(Request $req){
    if (isset($req->users_customers_id)) {
      $user=DB::table('users_customers')->where(['users_customers_id'=>$req->users_customers_id,'status'=>'Active'])->first();
      if ($user) {
        $favorites = FavoriteSwapOffer::where(['users_customers_id'=>$req->users_customers_id,'status'=>'Active'])->get();
        $data=[];
        foreach ($favorites as $key => $favorite) {
          $data_string = SwapOffer::where(['swap_offers_id'=>$favorite->swap_offers_id,'status'=>'Pending'])->first();
          $data_string->from_currency = DB::table('system_currencies')->where(['system_currencies_id'=>$data_string->from_system_currencies_id])->first();
          $data_string->from_currency->country = DB::table('system_countries')->where(['code'=>$data_string->from_currency->code])->first();

          $data_string->to_currency = DB::table('system_currencies')->where(['system_currencies_id'=>$data_string->to_system_currencies_id])->first();
          $data_string->to_currency->country = DB::table('system_countries')->where(['code'=>$data_string->to_currency->code])->first();

          $data_string->base_currency = DB::table('system_currencies')->where(['system_currencies_id'=>$data_string->system_currencies_id])->first();
          $data_string->base_currency->country = DB::table('system_countries')->where(['code'=>$data_string->base_currency->code])->first();
          $data[] = $data_string;
        }
        $get_data_time_check=[];
        foreach ($data as $key => $single_data) {
          $single_data->time_ago=Carbon::parse($single_data->date_added)->diffForHumans();
          $get_data_time_check[]=$single_data;
        }

        if (count($data)>0) {
          $response["code"] = 200;
          $response["status"] = "success";
          $response["data"] = $data;
        } else {
          $response["code"] = 404;
          $response["status"] = "error";
          $response["message"] = "no data found.";
        }
      }else{
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "User does not exists.";
      }
    }else{ 
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }
    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* ALL FAVORITE SWAP OFFERS*/
  
  /* ADD FAVORITE SWAP OFFERS*/
  public function add_favorite_swaps_offers(Request $req){
    if (isset($req->users_customers_id) && isset($req->swap_offers_id)) {
      $user=DB::table('users_customers')->where(['users_customers_id'=>$req->users_customers_id,'status'=>'Active'])->first();
      if($user) {
        $swap_offer=SwapOffer::where(['swap_offers_id'=>$req->swap_offers_id,'status'=>'Pending'])->first();
        if($swap_offer) {
          $favorite_offer=FavoriteSwapOffer::where(['users_customers_id' => $req->users_customers_id,'swap_offers_id' => $req->swap_offers_id,'status'=>'Deleted'])->first();
          if($favorite_offer) {
            $update_offer = FavoriteSwapOffer::where(
              ['users_customers_id' => $req->users_customers_id,'swap_offers_id' => $req->swap_offers_id])->update(['status' => "Active"]);
            $updated_offer = FavoriteSwapOffer::where(
              ['users_customers_id' => $req->users_customers_id,'swap_offers_id' => $req->swap_offers_id])->first();
            $response["code"] = 200;
            $response["status"] = "success";
            $response["data"] = $updated_offer;
          }else{
            $favorite_offer = FavoriteSwapOffer::firstOrCreate(
              ['users_customers_id' => $req->users_customers_id,'swap_offers_id' => $req->swap_offers_id],
              ['users_customers_id' => $req->users_customers_id,'swap_offers_id' => $req->swap_offers_id]);;
  
            $response["code"] = 200;
            $response["status"] = "success";
            $response["data"] = $favorite_offer;
          }
        }else{
          $response["code"] = 404;
          $response["status"] = "error";
          $response["message"] = "Swap offer does not exists.";
        }
      }else{
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "User does not exists.";
      }
    }else{ 
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }
    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* ADD FAVORITE SWAP OFFERS*/
  
  /* REMOVE FAVORITE SWAP OFFERS*/
  public function remove_favorite_swaps_offers(Request $req){
    if (isset($req->users_customers_id) && isset($req->swap_offers_id)) {
      $user=DB::table('users_customers')->where(['users_customers_id'=>$req->users_customers_id,'status'=>'Active'])->first();
      if ($user) {
        $swap_offer=SwapOffer::where(['swap_offers_id'=>$req->swap_offers_id,'status'=>'Pending'])->first();
        if ($swap_offer) {
          $remove_offer = FavoriteSwapOffer::where(
            ['users_customers_id' => $req->users_customers_id,'swap_offers_id' => $req->swap_offers_id])->update(['status' => "Deleted"]);
            if($remove_offer){
              $response["code"] = 200;
              $response["status"] = "success";
              $response["message"] = "Remove Successfully";
            }else{
              $response["code"] = 404;
              $response["status"] = "error";
              $response["message"] = "Data not updated.";
            }
        }else{
          $response["code"] = 404;
          $response["status"] = "error";
          $response["message"] = "Swap offer does not exists.";
        }
      }else{
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "User does not exists.";
      }
    }else{ 
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }
    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* REMOVE FAVORITE SWAP OFFERS*/

  /* SWAP OFFER REQUEST REJECT*/
  public function swap_offer_request_reject(Request $req){
    if (isset($req->swap_offers_requests_id))
    {
      $pending_offer=SwapOfferRequest::where(["swap_offers_requests_id"=>$req->swap_offers_requests_id,"status"=>"Pending"])->get();
      if ($pending_offer) 
      {
        $offer_update=SwapOfferRequest::where("swap_offers_requests_id",$req->swap_offers_requests_id)->update(["status"=>"Rejected"]);
        if($offer_update){
            $response["code"] = 200;
            $response["status"] = "success";
            $response["message"] = "Updated Successfully";
          }else{
            $response["code"] = 404;
            $response["status"] = "error";
            $response["message"] = "Data not updated.";
        }
      }else{
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "Swap offer request not exist.";
      } 
    }else{ 
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }
    return response()
    ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* SWAP OFFER REQUEST REJECT*/

  /* GET USER WALLET DETAIL */
  public function user_wallet_detail(Request $req){
    if (isset($req->users_customers_wallets_id) && isset($req->users_customers_id)) {
      $fetch_data  =UsersCustomersWallet::with('currency')->where(
        ['users_customers_id'=>$req->users_customers_id,'users_customers_wallets_id'=>$req->users_customers_wallets_id])->first();
    
      if ($fetch_data) {
        $response["code"] = 200;
        $response["status"] = "success";
        $response["data"] = $fetch_data;
      } else {
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "no data found.";
      }
    }else{ 
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }

    return response()
    ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* GET USER WALLET DETAIL*/

  
  /* ALL CONNECT CATEGORIES*/
  public function connect_categories(){
    $connect_categories = DB::table('connect_categories')->where('status','Active')->get();
    
    if (count($connect_categories)>0) {
      $response["code"] = 200;
      $response["status"] = "success";
      $response["data"] = $connect_categories;
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "no data found.";
    }
    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* ALL CONNECT CATEGORIES*/

  /* ALL CONNECT ARTICLES*/
  public function connect_articles(Request $req){
    if (isset($req->users_customers_id)) {
      $fetch_data = DB::table('connect_articles')->where('status','Active')->get();
      $get_data=[];
        foreach ($fetch_data as $key => $data) {
          $liked = FavoriteConnectArticle::where(['users_customers_id'=>$req->users_customers_id, 'connect_articles_id'=>$data->connect_articles_id, 'status'=>'Active'])->count();
          if($liked > 0){
            $data->liked = 'Yes';
          } else {
            $data->liked = 'No';
          }
          $get_data[]=$data;
        }
      
      if (count($get_data)>0) {
        $response["code"] = 200;
        $response["status"] = "success";
        $response["data"] = $get_data;
      } else {
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "no data found.";
      }
    }else{ 
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }
    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* ALL CONNECT ARTICLES*/

   /* ADD FAVORITE CONNECT ARTICLE*/
   public function add_favorite_connect_articles(Request $req){
    if (isset($req->users_customers_id) && isset($req->connect_articles_id)) {
      $user=DB::table('users_customers')->where(['users_customers_id'=>$req->users_customers_id,'status'=>'Active'])->first();
      if($user) {
        $connect_article=DB::table('connect_articles')->where(['connect_articles_id'=>$req->connect_articles_id,'status'=>'Active'])->first();
        if($connect_article) {
          $favorite_article=FavoriteConnectArticle::where(['users_customers_id' => $req->users_customers_id,'connect_articles_id' => $req->connect_articles_id,'status'=>'Deleted'])->first();
          if($favorite_article) {
            $update_article = FavoriteConnectArticle::where(
              ['users_customers_id' => $req->users_customers_id,'connect_articles_id' => $req->connect_articles_id])->update(['status' => "Active"]);
            $updated_article = FavoriteConnectArticle::where(
              ['users_customers_id' => $req->users_customers_id,'connect_articles_id' => $req->connect_articles_id])->first();
            $response["code"] = 200;
            $response["status"] = "success";
            $response["data"] = $updated_article;
          }else{
            $favorite_article = FavoriteConnectArticle::firstOrCreate(
              ['users_customers_id' => $req->users_customers_id,'connect_articles_id' => $req->connect_articles_id],
              ['users_customers_id' => $req->users_customers_id,'connect_articles_id' => $req->connect_articles_id]);;
  
            $response["code"] = 200;
            $response["status"] = "success";
            $response["data"] = $favorite_article;
          }
        }else{
          $response["code"] = 404;
          $response["status"] = "error";
          $response["message"] = "Connect Article does not exists.";
        }
      }else{
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "User does not exists.";
      }
    }else{ 
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }
    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* ADD FAVORITE CONNECT ARTICLE*/

  /* REMOVE FAVORITE CONNECT ARTICLE*/
  public function remove_favorite_connect_articles(Request $req){
    if (isset($req->users_customers_id) && isset($req->connect_articles_id)) {
      $user=DB::table('users_customers')->where(['users_customers_id'=>$req->users_customers_id,'status'=>'Active'])->first();
      if ($user) {
        $connect_article=DB::table('connect_articles')->where(['connect_articles_id'=>$req->connect_articles_id,'status'=>'Active'])->first();
        if ($connect_article) {
          $remove_offer = FavoriteConnectArticle::where(
            ['users_customers_id' => $req->users_customers_id,'connect_articles_id' => $req->connect_articles_id])->update(['status' => "Deleted"]);
            if($remove_offer){
              $response["code"] = 200;
              $response["status"] = "success";
              $response["message"] = "Remove Successfully";
            }else{
              $response["code"] = 404;
              $response["status"] = "error";
              $response["message"] = "Data not updated.";
            }
        }else{
          $response["code"] = 404;
          $response["status"] = "error";
          $response["message"] = "Connect Article does not exists.";
        }
      }else{
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "User does not exists.";
      }
    }else{ 
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }
    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* REMOVE FAVORITE CONNECT ARTICLE*/

  /*CONNECT ARTICEL VIEW*/
  public function connect_article_view(Request $req){
    if(isset($req->users_customers_id) && isset($req->connect_articles_id)) {
      $user=DB::table('users_customers')->where(['users_customers_id'=>$req->users_customers_id,'status'=>'Active'])->first();
        if ($user){
          $article=DB::table('connect_articles')->where(['connect_articles_id'=>$req->connect_articles_id,'status'=>'Active'])->first();
          if ($article) {
          DB::beginTransaction();
          try {
            $userid = ['users_customers_id'=>$req->users_customers_id,'connect_articles_id'=>$req->connect_articles_id]; 
                                
                  $viewed=ConnectArticleView::firstOrCreate($userid,[
                      'users_customers_id'=>$req->users_customers_id,
                      'connect_articles_id'=>$req->connect_articles_id,
                  ]);

                  if($viewed){
                DB::commit();
                    $changedStatus=ConnectArticleView::where($userid)->first();
                    $response["code"] = 200;
                    $response["status"] = "success";
                    $response["data"] = $changedStatus;
                   }
          } catch (\Exception $ex) {
              DB::rollback();
              $response["code"] = 404;
              $response["status"] = "error";
              $response['message'] = $ex->getMessage();
          }
        }else{  
          $response["code"] = 404;
          $response["status"] = "error";
          $response["message"] = "Connect Article does not exists.";
        }    
      }else{  
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "User does not exists.";
      }
    }else{
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields is required.";
    }
    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /*CONNECT ARTICEL VIEW*/

  /* POPULAR CONNECT ARTICLES */
  public function popular_connect_articles(Request $req){
    if (isset($req->users_customers_id)) {
      $articles= DB::table('connect_articles')->where('status','Active')->get();
      $views=ConnectArticleView::all();
      $array=[];
      
      foreach ($articles as $key => $article) {
        foreach ($views as $key => $view) {
          // Articles views like
          $liked = FavoriteConnectArticle::where(['users_customers_id'=>$req->users_customers_id, 'connect_articles_id'=>$article->connect_articles_id, 'status'=>'Active'])->count();
          if($liked > 0){
            $article->liked = 'Yes';
          } else {
            $article->liked = 'No';
          }
          // Articles views like

          // Articles views count
          $article->view_count=0;
          if($view->connect_articles_id == $article->connect_articles_id){
            $article->view_count+=1;
          }
          // Articles views count
        }
        $array[]=$article;
      }
      $get_data = collect($array)->sortByDesc('view_count')->values()->all();
      if (count($get_data)>0) {
        $response["code"] = 200;
        $response["status"] = "success";
        $response["data"] = $get_data;
      } else {
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "no data found.";
      }
    }else{ 
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }
    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* POPULAR CONNECT ARTICLES*/

   /* FAVORITE CONNECT ARTICLES*/
   public function favorite_connect_articles(Request $req){
    if (isset($req->users_customers_id)) {
      $user=DB::table('users_customers')->where(['users_customers_id'=>$req->users_customers_id,'status'=>'Active'])->first();
      if ($user) {
        $fetch_data = DB::table('connect_articles')->get();
        $get_data=[];
          foreach ($fetch_data as $key => $data) {
            $liked = FavoriteConnectArticle::where(['users_customers_id'=>$req->users_customers_id, 'connect_articles_id'=>$data->connect_articles_id, 'status'=>'Active'])->first();
            if($liked){
              $data->liked = 'Yes';
              $get_data[]=$data;
            }
          }

        if (count($get_data)>0) {
          $response["code"] = 200;
          $response["status"] = "success";
          $response["data"] = $get_data;
        } else {
          $response["code"] = 404;
          $response["status"] = "error";
          $response["message"] = "no data found.";
        }
      }else{
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "User does not exists.";
      }
    }else{ 
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }
    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* FAVORITE CONNECT ARTICLES*/

  /* ADD ACCOUNT */
  public function add_acount(Request $req){
    if (isset($req->users_customers_id) && isset($req->system_currencies_id) && isset($req->full_name) && isset($req->iban) && isset($req->branch_code) && isset($req->account_no) && isset($req->bank_name)) {
      $user=DB::table('users_customers')->where(['users_customers_id'=>$req->users_customers_id,'status'=>'Active'])->first();
      if ($user) {
        $system_currency=DB::table('system_currencies')->where('system_currencies_id',$req->system_currencies_id)->first();
        if ($system_currency) {
          $account = UserCustomerAccount::firstOrCreate(
                    ['users_customers_id' => $req->users_customers_id,'system_currencies_id'=>$req->system_currencies_id,'iban'=>$req->iban],
                    ['users_customers_id' => $req->users_customers_id,'system_currencies_id'=>$req->system_currencies_id,'full_name'=>$req->full_name,'iban'=>$req->iban,'branch_code'=>$req->branch_code,'account_no'=>$req->account_no,"bank_name"=>$req->bank_name]
                );
                if($account){
                  $data=UserCustomerAccount::with('account_currency')->where(
                      ['users_customers_id' => $req->users_customers_id,'system_currencies_id'=>$req->system_currencies_id,'iban'=>$req->iban]
                    )->first();
                    $response["code"] = 200;
                    $response["status"] = "success";
                    $response["data"] = $data;
          }else{
            $response["code"] = 404;
            $response["status"] = "error";
            $response["message"] = "Oops! Something went wrong.";
          }
        }else{
          $response["code"] = 404;
          $response["status"] = "error";
          $response["message"] = "Currency does not exists.";
        }
      }else{
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "User does not exists.";
      }
    }else{ 
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }
    return response()
    ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* ADD ACCOUNT */

  /* ALL ACCOUNTS */
  public function all_acounts(Request $req){
    if (isset($req->users_customers_id)) {
      $user=DB::table('users_customers')->where(['users_customers_id'=>$req->users_customers_id,'status'=>'Active'])->first();
      if ($user) {
        $fetch_data=UserCustomerAccount::with('account_currency')->where(['users_customers_id' => $req->users_customers_id,'status'=>'Active'])->get();
        $get_data=[];
          foreach ($fetch_data as $key => $data) {
            $data->user_data=DB::table('users_customers')->where(['users_customers_id'=>$req->users_customers_id,'status'=>'Active'])->first();
            $get_data[]=$data;
          }
          if(count($get_data)>0){
            $response["code"] = 200;
            $response["status"] = "success";
            $response["data"] = $get_data;
          }else{
            $response["code"] = 404;
            $response["status"] = "error";
            $response["message"] = "Data not updated.";
          }
      }else{
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "User does not exists.";
      }
    }else{ 
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }
    return response()
    ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* ALL ACCOUNTS */

  /* ALL CONNECT ARTICLES By CATEGORY*/
  public function connect_articles_by_category(Request $req){
    if (isset($req->users_customers_id) && isset($req->connect_categories_id)) {
      $fetch_data = DB::table('connect_articles')->where(['connect_categories_id'=>$req->connect_categories_id,'status'=>'Active'])->get();
      $get_data=[];
        foreach ($fetch_data as $key => $data) {
          $liked = FavoriteConnectArticle::where(['users_customers_id'=>$req->users_customers_id, 'connect_articles_id'=>$data->connect_articles_id, 'status'=>'Active'])->count();
          if($liked > 0){
            $data->liked = 'Yes';
          } else {
            $data->liked = 'No';
          }
          $get_data[]=$data;
        }
      
      if (count($get_data)>0) {
        $response["code"] = 200;
        $response["status"] = "success";
        $response["data"] = $get_data;
      } else {
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "no data found.";
      }
    }else{ 
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }
    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* ALL CONNECT ARTICLES By CATEGORY*/

  /* POPULAR CONNECT ARTICLES By CATEYGORY*/
  public function popular_connect_articles_by_category(Request $req){
    if (isset($req->users_customers_id) && isset($req->connect_categories_id)) {
      $articles=DB::table('connect_articles')->where(['connect_categories_id'=>$req->connect_categories_id,'status'=>'Active'])->get();
      $views=ConnectArticleView::all();
      $array=[];
      
      foreach ($articles as $key => $article) {
        foreach ($views as $key => $view) {
          // Articles views like
          $liked = FavoriteConnectArticle::where(['users_customers_id'=>$req->users_customers_id, 'connect_articles_id'=>$article->connect_articles_id, 'status'=>'Active'])->count();
          if($liked > 0){
            $article->liked = 'Yes';
          } else {
            $article->liked = 'No';
          }
          // Articles views like

          // Articles views count
          $article->view_count=0;
          if($view->connect_articles_id == $article->connect_articles_id){
            $article->view_count+=1;
          }
          // Articles views count
        }
        $array[]=$article;
      }
      $get_data = collect($array)->sortByDesc('view_count')->values()->all();
      if (count($get_data)>0) {
        $response["code"] = 200;
        $response["status"] = "success";
        $response["data"] = $get_data;
      } else {
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "no data found.";
      }
    }else{ 
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }
    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* POPULAR CONNECT ARTICLES By CATEYGORY*/

  /* USERS CUSTOMERS LAST ACTIVITY*/
  public function users_customers_last_activity(Request $req){
    if (isset($req->users_customers_id)) {
      $user = DB::table('users_customers')->where('users_customers_id', $req->users_customers_id)->first();
      if ($user) {
        $update=DB::table('users_customers')->where('users_customers_id', $req->users_customers_id)->update(['last_activity'=>Carbon::now()]);

            $userDetail=DB::table('users_customers')->where('users_customers_id', $req->users_customers_id)->first();
            if (isset($userDetail) && $userDetail != null) {
              $response["code"] = 200;
              $response["status"] = "success";
              $response["data"] = $userDetail;
            } else{
              $response["code"] = 404;
              $response["status"] = "error";
              $response["message"] = "User do not exist.";
            }
      }else{
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "User does not exits.";
      }
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }

    return response()
    ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
    ->header('Content-Type', 'application/json');
  }
  /* USERS CUSTOMERS LAST ACTIVITY*/

  /* USERS CUSTOMERS ACTIVITY INTERVAL */
  public function users_customers_activity_interval(Request $req){
    if (isset($req->users_customers_id)) {
      $user = DB::table('users_customers')->where('users_customers_id', $req->users_customers_id)->first();
      if ($user) {
        
        $start = Carbon::parse($user->last_activity);
        $end = Carbon::parse(Carbon::now());
        $diffInMinutes = $end->diffInMinutes($start);
        $formattedMinutes = str_pad($diffInMinutes, 2, '0', STR_PAD_LEFT);
        if($formattedMinutes <= $user->activity_interval){
          $response["code"] = 200;
          $response["status"] = "success";
          $response["data"] = true;
        } else{
          $response["code"] = 404;
          $response["status"] = "error";
          $response["data"] = false;
        }
      }else{
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "User does not exits.";
      }
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }

    return response()
    ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
    ->header('Content-Type', 'application/json');
  }
  /* USERS CUSTOMERS ACTIVITY INTERVAL */

  /* UPDATE PROFILE */
   public function update_activity_interval(Request $req){
    if(isset($req->users_customers_id) && isset($req->activity_interval)) {
      
      $updateData['activity_interval']              = $req->activity_interval;

      DB::table('users_customers')->where('users_customers_id', $req->users_customers_id)->update($updateData);
      $updatedData = DB::table('users_customers')->where('users_customers_id', $req->users_customers_id)->get();
 
      $response["code"] = 200;
      $response["status"] = "success";
      $response["data"] = $updatedData;
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }

    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* UPDATE PROFILE */

  /* FUND WALLET REQUEST */
  public function fund_wallet_request(Request $req){
    if(isset($req->users_customers_id) && isset($req->users_customers_wallets_id)&& isset($req->image) && isset($req->bank_name) && isset($req->amount) && isset($req->description)) {

    $user_wallet = DB::table('users_customers_wallets')->where(['users_customers_wallets_id'=>$req->users_customers_wallets_id,"users_customers_id"=>$req->users_customers_id])->first();
      if($user_wallet){

        $saveData['users_customers_id']       	  = $req->users_customers_id;
        $saveData['users_customers_wallets_id']   = $req->users_customers_wallets_id;
        $saveData['bank_name']       	            = $req->bank_name;
        $saveData['amount']       	              = $req->amount;
        $saveData['description']       	          = $req->description;
        if(isset($req->image)){
          $image = $req->image;
          $prefix = time();
          $img_name = $prefix . '.jpeg';
          $image_path = public_path('uploads/fund_wallet/') . $img_name;

          file_put_contents($image_path, base64_decode($image));
          $saveData['image'] = 'uploads/fund_wallet/'. $img_name;
        }

        $fund_wallet_id   = DB::table('fund_wallets')->insertGetId($saveData);

        $data = DB::table('fund_wallets')->where('fund_wallets_id', $fund_wallet_id)->first();
  
        $response["code"] = 200;
        $response["status"] = "success";
        $response["data"] = $data;
        
      } else {
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "Wallet not exist.";
      }
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }

    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* FUND WALLET REQUEST */

  /* WITHDRAW WALLETS REQUEST */
  public function withdraw_wallets_request(Request $req){
    if(isset($req->users_customers_id) && isset($req->users_customers_wallets_id) && isset($req->users_customers_accounts_id) && isset($req->amount) && isset($req->description)) {

    $user_wallet = DB::table('users_customers_wallets')->where(['users_customers_wallets_id'=>$req->users_customers_wallets_id,"users_customers_id"=>$req->users_customers_id])->first();
    if($user_wallet){
      
      $user_account = DB::table('users_customers_accounts')->where(['users_customers_accounts_id'=>$req->users_customers_accounts_id,"users_customers_id"=>$req->users_customers_id])->first();
        if($user_account->system_currencies_id==$user_wallet->system_currencies_id){

          $saveData['users_customers_id']       	  = $req->users_customers_id;
          $saveData['users_customers_wallets_id']   = $req->users_customers_wallets_id;
          $saveData['users_customers_accounts_id']  = $req->users_customers_accounts_id;
          $saveData['amount']       	              = $req->amount;
          $saveData['description']       	          = $req->description;

          $withdraw_wallets_request_id   = DB::table('withdraw_wallets_requests')->insertGetId($saveData);

          $data = DB::table('withdraw_wallets_requests')->where('withdraw_wallets_requests_id', $withdraw_wallets_request_id)->first();
    
          $response["code"] = 200;
          $response["status"] = "success";
          $response["data"] = $data;
          
        } else {
          $response["code"] = 404;
          $response["status"] = "error";
          $response["message"] = "User has not account with this currency.";
        }
      } else {
        $response["code"] = 404;
        $response["status"] = "error";
        $response["message"] = "Wallet not exist.";
      }
    } else {
      $response["code"] = 404;
      $response["status"] = "error";
      $response["message"] = "All fields are needed.";
    }

    return response()
      ->json(array( 'status' => $response["status"], isset($response["message"]) ? 'message' : 'data' => isset($response["message"]) ? $response["message"] : $response["data"]))
      ->header('Content-Type', 'application/json');
  }
  /* WITHDRAW WALLETS REQUEST */
} 