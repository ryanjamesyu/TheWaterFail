<?php
    ob_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    session_start();
	
    //If not logged in, redirect to login
	// echo 'Loggedin?', $_SESSION['loggedin'];
    if (!isset($_SESSION['loggedin'])) {
        echo "<script type='text/javascript'>alert('Please log in or create an account');
        window.location.href='login.html';
        </script>";
		//header('Location: login.html');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		<!--bootstrap-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
		
		<!--jQuery and Javascript -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
      <!--  <script src="signup.js?rev=0"></script> -->
		<link rel="stylesheet" href="style.css">
		
	
		<title>The Water Fail</title>

		<!-- map code -->
		<link rel="stylesheet" href="map.css?rev=50">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
        </script>
        <script type="text/javascript">
           /* $(document).ready(function(){
                function myFunction(data){
                    alert("you clicked the " + data + " ting");
                }      
            });*/
            function myFunction(param) {
                $.post("searchfountains.php", { building: param }, function (data) {
                    document.write(data);
                });
                //alert("you clicked the " + param + " ting!");
            }
        </script>
		<!-- end map code -->

	</head>
	<body>

		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#theNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>
		
		
			<div class="collapse navbar-collapse" id="theNavbar">
				<ul class="navbar-nav me-auto">
				
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="browseall.php"> Browse All </a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="search.php"> Search </a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="newentry.php"> New Entry </a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="about.html"> About Us </a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="profile.php"> Account </a>
					</li>
					
				</ul>

				<ul class="navbar-nav ml-auto">
					<li class="nav-item mx-auto">
						<a class="nav-link" href="logout.php"> Log Out</a>
					</li>
				</ul>
			</div>
		</nav>

        <h1>Home</h1>

		<!-- map code -->
		<div class="container">
		<img src="https://media.discordapp.net/attachments/748703162772488234/1040000284463743108/mapProjectImage.png?width=1068&height=670" alt="waterfail map" usemap="#workmap">
            <map name="workmap">
			<area shape="rect" coords="573,489,667,570" onclick="myFunction('Armstrong');">
            <area shape="rect" coords="540,113,625,156" onclick="myFunction('Benton');">
            <area shape="rect" coords="460,480,520,535" onclick="myFunction('Kreger');">
            <area shape="rect" coords="945,580,1055,666" onclick="myFunction('Bachelor');">
            <area shape="rect" coords="790,40,850,150" onclick="myFunction('Pearson');">
            <area shape="rect" coords="705,245,840,300" onclick="myFunction('Hughes');">
            </map>
		<!--<div class="Armstrong"> Armstrong </div>
    <div class="Benton">Benton</div>
    <div class="Kreger">Kreger</div>
    <div class="Bachelor">Bachelor</div>
    <div class="Pearson">Pearson</div>
    <div class="Hughes">Hughes</div>-->
    </div>
          <!-- href can be used for these to redirect user-->
			<!-- end map code -->		
	</body>
</html>