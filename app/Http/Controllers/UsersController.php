<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\Event_post;
use App\Models\Tag;
use App\Models\Event_tag;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use DB;

use Artisan;
use Session;

class UsersController extends Controller{
    public $successStatus = 200;
    public $errorStatus = 401;

    // -------------- CACHE PAGE ------------- //
    public function clear_cache(Request $request){
        $exitCode = Artisan::call('route:clear');
        $exitCode = Artisan::call('config:cache');
        $exitCode = Artisan::call('cache:clear');
        $exitCode = Artisan::call('view:clear');

        Session::flash('success', 'Cache Cleared!'); 
        return redirect('users/dashboard');
    }
    // -------------- CACHE PAGE ------------- //
    
    // -------------- SIGNUP ------------- //
	public function users_customers_signup(){
        if (session()->has('id')) {
            return redirect('users/dashboard');
        } else{
            return view('users.users_customers_signup');
        }
    }
    // -------------- SIGNUP ------------- //
    
    // -------------- SIGNUP INDIVIDUAL ------------- //
    public function users_customers_signup_individual(){
        if (session()->has('id')) {
            return redirect('users/dashboard');
        } else{
            return view('users.users_customers_signup_individual');
        }
    }
    // -------------- SIGNUP INDIVIDUAL ------------- //

    // -------------- SIGNUP CORPORATE ------------- //
    public function users_customers_signup_corporate(){
        if (session()->has('id')) {
            return redirect('users/dashboard');
        } else{
            return view('users.users_customers_signup_corporate');
        }
    }
    // -------------- SIGNUP CORPORATE ------------- //
    
    // -------------- SIGNUP WAIT ------------- //
    public function users_customers_signup_wait(){
        if (session()->has('id')) {
            return redirect('users/dashboard');
        } else{
            return view('users.users_customers_signup_wait');
        }
    }
    // -------------- SIGNUP WAIT ------------- //

    // -------------- SIGNUP AUTHENTICATION PROCESSING ------------- //
    public function users_customers_signup_process(Request $request){
        if (isset($request->users_customers_type) && isset($request->users_customers_id) && isset($request->profile_pic) && isset($request->first_name) && isset($request->last_name) && isset($request->email) && isset($request->phone)) {
            $request->session()->put([
                'users_customers_type' => $request->users_customers_type,
                'id' => $request->users_customers_id,
                'profile_pic' => $request->profile_pic,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
            Session::flash('success', 'Signed up successfully.'); 
            return true;
        } else if (isset($request->users_customers_type) && isset($request->users_customers_id) && isset($request->profile_pic) && isset($request->company_name) && isset($request->first_name) && isset($request->email) && isset($request->phone)) {
            $request->session()->put([
                'users_customers_type' => $request->users_customers_type,
                'id' => $request->users_customers_id,
                'profile_pic' => $request->profile_pic,
                'company_name' => $request->first_name,
                'first_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
            Session::flash('success', 'Signed up successfully.'); 
            return true;
        } else {
            return false;
        }
    }
    // -------------- SIGNUP AUTHENTICATION PROCESSING ------------- //
    
    // -------------- SIGNUP VERIFIED ------------- //
    public function users_customers_signup_verified(){
        if (!session()->has('id')) {
            return redirect('/');
        } else{
            return view('users.users_customers_signup_verified');
        }
    }
    // -------------- SIGNUP VERIFIED ------------- //


    // -------------- LOGIN AUTHENTICATION MAIN ------------- //
	public function users_customers_login(){
        if (session()->has('id')) {
            return redirect('users/dashboard');
        } else{
            return view('users.users_customers_login');
        }
    }
    // -------------- LOGIN AUTHENTICATION MAIN ------------- //
    
    // -------------- LOGIN AUTHENTICATION PROCESSING ------------- //
    public function users_customers_login_process(Request $request){
        if (isset($request->users_customers_type) && isset($request->users_customers_id) && isset($request->profile_pic) && isset($request->first_name) && isset($request->last_name) && isset($request->email) && isset($request->phone)) {
            $request->session()->put([
                'users_customers_type' => $request->users_customers_type,
                'id' => $request->users_customers_id,
                'profile_pic' => $request->profile_pic,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
            Session::flash('success', 'Logged in successfully.'); 
            return true;
        } elseif (isset($request->users_customers_type) && isset($request->users_customers_id) && isset($request->profile_pic) && isset($request->company_name) && isset($request->first_name) && isset($request->email) && isset($request->phone)) {
            $request->session()->put([
                'users_customers_type' => $request->users_customers_type,
                'id' => $request->users_customers_id,
                'profile_pic' => $request->profile_pic,
                'company_name' => $request->company_name,
                'first_name' => $request->first_name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
            Session::flash('success', 'Logged in successfully.'); 
            return true;
        } else {
            return false;
        }
    }
    // -------------- LOGIN AUTHENTICATION PROCESSING ------------- //

    // -------------- LOGOUT ------------- //
    public function users_customers_logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }
    // -------------- LOGOUT ------------- //
    
    // -------------- FORGOT PASSWORD ------------- //
    public function users_customers_forgot_password(){
        if (session()->has('id')) {
            return redirect('users/dashboard');
        } else{
            return view('users.users_customers_forgot_password');
        }
    }
    // -------------- FORGOT PASSWORD ------------- //

    // -------------- VERIFICATION CODE ------------- //
    public function users_customers_verification_code($id){
        if (session()->has('id')) {
            return redirect('users/dashboard');
        } else{
            return view('users.users_customers_verification_code', compact('id'));
        }
    }
    // -------------- VERIFICATION CODE ------------- //

    // -------------- RESET PASSWORD ------------- //
    public function users_customers_reset_password($email, $otp){
        if(session()->has('id')) {
            return redirect('/users/dashbaord');
        } else {
            return view('users.users_customers_reset_password', compact('email', 'otp'));
        } 
    }
    // -------------- RESET PASSWORD ------------- //
    
    // -------------- DASHBOARD ------------- //
    public function users_customers_dashboard(){
        if (!session()->has('id')) {
            return redirect('/');
        } else{
            //session()->flash('success', 'Logged in successfully.');
            //session()->flash('error', 'error');
            //session()->flash('warning', 'warning');
            //session()->flash('info', 'info');
        	return view('users.users_customers_dashboard');
        }
    }
    // -------------- DASHBOARD ------------- //

    // -------------- WALLETS ------------- //
    public function users_customers_wallets(){
        if (!session()->has('id')) {
            return redirect('/');
        } else{
            return view('users.users_customers_wallets');
        }
    }
    // -------------- WALLETS ------------- //
    
    // -------------- DATA ANALYSIS ------------- //
    public function users_customers_data_analysis(){
    	if (!session()->has('id')) {
            return redirect('/');
        } else{
            return view('users.users_customers_data_analysis');
        }
    }
    // -------------- DATA ANALYSIS ------------- //
    
    // -------------- OFFERS ------------- //
    public function users_customers_offers(){
    	if (!session()->has('id')) {
            return redirect('/');
        } else{
            return view('users.users_customers_offers');
        }
    }
    // -------------- OFFERS ------------- //

    // -------------- OFFER REQUESTS ------------- //
     public function users_customers_offer_requests($offer_id){
        if (!session()->has('id')) {
            return redirect('/');
        } else{
            return view('users.users_customers_offer_requests', compact('offer_id'));
        }
    }
    // -------------- OFFER REQUESTS ------------- //
    
    // -------------- TRACK ------------- //
    public function users_customers_track(){
    	if (!session()->has('id')) {
            return redirect('/');
        } else{
            return view('users.users_customers_track');
        }
    }
    // -------------- TRACK ------------- //
    
    // -------------- CONNECT ------------- //
    public function users_customers_connect(){
    	if (!session()->has('id')) {
            return redirect('/');
        } else{
            return view('users.users_customers_connect');
        }
    }
    // -------------- CONNECT ------------- //

    // -------------- CONNECT BLOG ------------- //
    public function users_customers_connect_blog($blog_id){
       return view('users.users_customers_connect_blog', compact('blog_id'));
    }
    // -------------- CONNECT BLOG ------------- //
    
    // -------------- PROFILE ------------- //
    public function users_customers_profile(){
    	if (!session()->has('id')) {
            return redirect('/');
        } else{
            return view('users.users_customers_profile');
        }
    }
    // -------------- PROFILE ------------- //
    
    // -------------- PROFILE EDIT ------------- //
    public function users_customers_profile_edit(){
    	if (!session()->has('id')) {
            return redirect('/');
        } else{
            return view('users.users_customers_profile_edit');
        }
    }
    // -------------- PROFILE EDIT ------------- //

    // -------------- BILLING PAYMENT ------------- //
    public function users_customers_billing_payment(){
        if (!session()->has('id')) {
            return redirect('/');
        } else{
            return view('users.users_customers_billing_payment');
        }
    }
    // -------------- BILLING PAYMENT ------------- //
    
    // -------------- TRANSACTIONS ------------- //
    public function users_customers_transactions(){
        if (!session()->has('id')) {
            return redirect('/');
        } else{
            return view('users.users_customers_transactions');
        }
    }
    // -------------- TRANSACTIONS ------------- //

    // -------------- SETTINGS ------------- //
    public function users_customers_settings(){
        if (!session()->has('id')) {
            return redirect('/');
        } else{
            return view('users.users_customers_settings');
        }
    }
    // -------------- SETTINGS ------------- //
    
    // -------------- PROFILE FAQ------------- //
    public function users_customers_profile_faq(){
    	if (!session()->has('id')) {
            return redirect('/');
        } else{
            return view('users.users_customers_profile_faq');
        }
    }
    // -------------- PROFILE FAQ------------- //
    
    // -------------- MESSAGE------------- //
    public function users_customers_message($user_id = null){
        if (!session()->has('id')) {
            return redirect('/');
        } else{
            return view('users.users_customers_message', compact('user_id'));
        }
    }
    // -------------- MESSAGE------------- //
}
