<!DOCTYPE html>
<html lang="en">
	<head>
		<!--bootstrap-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
		
		<!--jQuery and Javascript -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
        <script src="signup.js?rev=0"></script>
	
		<title>Log in or Sign up</title>
	</head>
	<body>
  <?php echo phpinfo(); ?>
 <?php
    session_start();
    error_log('startphp', 3, 'index_error');
    //If not logged in, redirect to login
	// echo 'Loggedin?', $_SESSION['loggedin'];
	
   if ($_SESSION['loggedin'] != TRUE) {
   /*echo '<script type="text/javascript">',
   	'window.location.href = \'login.html\';',
	'</script>;'*/
    ;
  }

  echo '<p> currently in PHP </p>';
  error_log('endphp',3,'index_error');
 ?>	
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#theNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>
		
		
			<div class="collapse navbar-collapse" id="theNavbar">
				<ul class="navbar-nav me-auto">
				
					<li class="nav-item">
						<a class="nav-link" href="home.html">Home</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="#"> Browse All </a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="newentry.html"> New Entry </a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="#"> About Us </a>
					</li>
				</ul>

				<ul class="navbar-nav ml-auto">
					<li class="nav-item mx-auto">
						<a class="nav-link" href="signup.html"> Login/Sign Up</a>
					</li>
				</ul>
			</div>
		</nav>
		
		
		
	
		
	</body>

</html>