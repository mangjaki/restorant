
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>From Register</title>
  <!-- loader-->
  <link href="{{ url('assets/css/pace.min.css') }}" rel="stylesheet"/>
  <script src="{{ url('assets/js/pace.min.js') }}"></script>
  <!--favicon-->
  <link rel="icon" href="{{ url('assets/images/favicon.ico') }}" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="{{ url('assets/css/animate.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{ url('assets/css/icons.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="{{ url('assets/css/app-style.css') }}" rel="stylesheet"/>
  
</head>

<body class="bg-theme bg-theme1">

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">

	<div class="card card-authentication1 mx-auto my-4">
		<div class="card-body">
		 <div class="card-content p-2">
		 	<div class="text-center">
		 		<img src="{{ url('assets/images/logo-icon.png') }}" alt="logo icon">
		 	</div>
		  <div class="card-title text-uppercase text-center py-3">Onion Cafe and Resto</div>
          <h5 class="card-title text-uppercase text-center ">Register</h5>
          <p class="card-title text-uppercase text-center py-1"> Silakan Register Sebelum Login</p>
		    <form method="POST" action="{{ route('register') }}">
                @csrf
			    <div class="form-group">
			        <label for="name" class="sr-only">Nama Akun</label>
			        <div class="position-relative has-icon-right">
				        <input type="text" id="name" name="name" class="form-control input-shadow" placeholder="Masukan Nama">
				        <div class="form-control-position">
					        <i class="icon-user"></i>
				        </div>
			        </div>
			    </div>
                <div class="form-group">
                    <label for="email" class="sr-only">Email Akun</label>
                    <div class="position-relative has-icon-right">
                        <input type="text" id="email" name="email" class="form-control input-shadow" placeholder="Masukan Email">
                        <div class="form-control-position">
                            <i class="icon-envelope-open"></i>
                        </div>
                    </div>
                </div>
			  <div class="form-group">
			   <label for="password" class="sr-only">Password</label>
			   <div class="position-relative has-icon-right">
				  <input type="password" id="password" name="password" class="form-control input-shadow" placeholder="Masukan Password">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
			  
              <div class="form-group">
                <label for="password_confirmation" class="sr-only">Confirm Password</label>
                <div class="position-relative has-icon-right">
                   <input type="password" id="password_confirmation" name="password_confirmation" class="form-control input-shadow" placeholder="Masukan Password Kembali">
                   <div class="form-control-position">
                       <i class="icon-lock"></i>
                   </div>
                </div>
               </div>
			  
			    <button type="submit" class="btn btn-light btn-block waves-effect waves-light">Daftar</button>
			    <div class="text-center mt-3">Daftar With</div>
			  
			    <div class="form-row mt-4">
			        <div class="form-group mb-0 col-6">
			            <button type="button" class="btn btn-light btn-block"><i class="fa fa-facebook-square"></i> Facebook</button>
			        </div>
			        <div class="form-group mb-0 col-6 text-right">
			            <button type="button" class="btn btn-light btn-block"><i class="fa fa-twitter-square"></i> Twitter</button>
			        </div>
			    </div>
			
			</form>
		   </div>
		  </div>
		  <div class="card-footer text-center py-3">
		    <p class="text-warning mb-0">sudah memiliki akun ? <a href="{{ route('login') }}">Log in Sekarang!</a></p>
		  </div>
	     </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	</div><!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="{{ url('assets/js/jquery.min.js') }}"></script>
  <script src="{{ url('assets/js/popper.min.js') }}"></script>
  <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
	
  <!-- sidebar-menu js -->
  <script src="{{ url('assets/js/sidebar-menu.js') }}"></script>
  
  <!-- Custom scripts -->
  <script src="{{ url('assets/js/app-script.js') }}"></script>
  
</body>
</html>
