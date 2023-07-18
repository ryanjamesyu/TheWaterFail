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

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
		
		<!--jQuery and Javascript -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
		<script src="signup.js?rev=0"></script>
		<link rel="stylesheet" href="style.css">
		

		<title>Water Fountain Search</title>
		
		
	</head>
	
	<body>
	<!--<?php include('../newentry/fountaindata.php') ?>-->

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
			
			
		<div class="container">
			<h1>Search For Water Fountains By Building</h1>

			<form action="searchfountains.php" method="POST">

				<p>Pick which building the fountain is located in:</p>
			
				<div class="form-check">
				
					<input class="form-check-input" type="radio" id="armstrong" name="building" value="Armstrong" required>
					<label class="form-check-label" for="armstrong">Armstrong</label><br>
					
					<input class="form-check-input" type="radio" id="benton" name="building" value="Benton" required>
					<label class="form-check-label" for="benton">Benton</label><br>
					
					<input class="form-check-input" type="radio" id="bachelor" name="building" value="Bachelor" required>
					<label class="form-check-label" for="bachelor">Bachelor</label><br>
					
					<input class="form-check-input" type="radio" id="hughes" name="building" value="Hughes" required>
					<label class="form-check-label" for="hughes">Hughes</label><br>
					
					<input class="form-check-input" type="radio" id="kreger" name="building" value="Kreger" required>
					<label class="form-check-label" for="kreger">Kreger</label><br>
					
					<input class="form-check-input" type="radio" id="pearson" name="building" value="Pearson" required>
					<label class="form-check-label" for="pearson">Pearson</label>

					<br><input class="btn btn-primary" type="submit" value="Submit"></input>
				</div>
			</form>
		</div>
	</body>
</html>