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
		<link rel="icon" type="image" sizes="24x24" href="/public/uploads/system_image/favico.png">

	    <link href="{{ url('/public/users/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	    <link href="{{ url('/public/users/assets/css/navbar.css') }}" rel="stylesheet" type="text/css" />
	    <link href="{{ url('/public/users/assets/plugin/splide/splide.min.css') }}" rel="stylesheet" type="text/css" />
	    <link href="{{ url('/public/users/assets/css/jquery.ui.min.css') }}" rel="stylesheet" type="text/css" />
	    <link href="{{ url('/public/users/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
	    <link href="{{ url('/public/users/assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
	</head>
	<body>
	    <div class="d-flex" id="dashboard-wrapper">
	    	<!-- HEADER START -->
	    	@include('layout.users.header')
	    	<!-- HEADER END -->

	    	<!-- MENU START -->
	    	@include('layout.users.menu')
	    	<!-- MENU END -->

	    	<!-- MAIN CONTENT START -->
	    	@yield('content')
	    	<!-- MAIN CONTENT END -->
		</div>   
	</body>

	<!-- SCRIPTS START -->
	@include('layout.users.scripts')
	@yield('script')
	<!-- SCRIPTS ENDS-->
</html>