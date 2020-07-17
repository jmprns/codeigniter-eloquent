
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Aurora Covid-19 Travel Tracker</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="base_url" content="{{ base_url() }}">

<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ vendor_url() }}bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ vendor_url() }}font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ vendor_url() }}Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ vendor_url() }}animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ vendor_url() }}css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ vendor_url() }}animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ vendor_url() }}select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ vendor_url() }}daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset_url() }}css/signin-util.css">
	<link rel="stylesheet" type="text/css" href="{{ asset_url() }}css/signin.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(../assets/images/signin-banner.png);">
                    <span class="login100-form-title-1">Sign In</span>
                    <small class="login100-form-title-2">PGA COVID-19 TRAVEL TRACKER</small>
				</div>

				<form id="sign-in-form" method="POST" class="login100-form validate-form" action="{{ current_url() }}">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Enter email" required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter password" required>
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn-1 mt-1">
							Sign In
                        </button>

                        <a href="{{ base_url() }}citizen/register" class="login100-form-btn-2 mt-1">
							Register
						</a>
                    </div>
                   
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="{{ vendor_url() }}jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ vendor_url() }}sweetalert2/sweetalert2.all.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ vendor_url() }}animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ vendor_url() }}bootstrap/js/popper.js"></script>
	<script src="{{ vendor_url() }}bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ vendor_url() }}select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ vendor_url() }}daterangepicker/moment.min.js"></script>
	<script src="{{ vendor_url() }}daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="{{ vendor_url() }}countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset_url() }}js/sign-in.js"></script>

</body>
</html>