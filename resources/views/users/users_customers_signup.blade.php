<!DOCTYPE html>
<html lang="en">
    <head>
        <?php 
            $system_image=DB::table('system_settings')->select('description')->where('type', 'system_image')->get(); 
            $system_name=DB::table('system_settings')->select('description')->where('type', 'system_name')->get(); 
        ?>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $system_name[0]->description; ?> :: Users Customers Portal</title>

        <link href="{{ url('/public/users/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('/public/users/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="wrapper">
            <div class="container-fluid">
                <div class="row login min-vh-100">
                    <!-- LEFT SECTION START -->
                    <div class="col-md-7 left d-flex align-items-center justify-content-center justify-content-md-start">
                        <img src="{{ url('/public/users/assets/images/Rocket_Boy_Flatline.png') }}" class="img-fluid w-75" alt="image">
                    </div>
                    <!-- LEFT SECTION END -->

                    <!-- RIGHT SECTION START -->
                    <div class="col-md-5 d-flex flex-column justify-content-sm-around justify-content-center align-items-center flex-wrap">
                        <div class="logo">
                            <p class="title">Get Started with</p>
                            <img src="{{ url('/public/uploads/system_image/'.$system_image[0]->description) }}" class="img-fluid img-logo" alt="image">
                        </div>
                        <!-- LINKS START -->
                        <div class="text-center mt-5 w-sm-auto w-100">
                            <a class="btn btn-login btn-primary mb-4" href="{{ url('/users/signup_individual') }}" role="button">As a Individual</a>
                            <a class="btn btn-login btn-outline-primary mb-4" href="{{ url('/users/signup_corporate') }}" role="button">As a Corporate</a>
                            <p class="text-primary">Already User? <a href="{{ url('/') }}">Sign In</a></p>
                        </div> 
                        <!-- LINKS END -->
                    </div>
                    <!-- RIGHT SECTION END -->
                </div>
            </div>
        </div>
    </body>
</html>