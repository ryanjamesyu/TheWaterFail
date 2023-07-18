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
<html>

<head>
    <title>Insert Page</title>
    <!--bootstrap-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="style.css">

		<!--jQuery and Javascript -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
        <script src="signup.js?rev=0"></script>
<head>

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

    <?php

        $servername = "localhost";
        $username = "ufmb43rz8doxi";
        $password = "gwsocwr9jzoj";
        //$username = "root";
        //$password = "";
        $dbname = "dbhal18xhhgdkp";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if($conn === false){
            die("Connection error. " . mysqli_connect_error());
        }

        $stars = $_REQUEST['stars'];
        $comments = $_REQUEST['comments'];
        $username = $_REQUEST['username'];
        $id = $_REQUEST['id'];


        if ($sql = $conn->prepare("INSERT INTO Reviews (Username, ID, Stars, Comments) VALUES (?, ?, ?, ?)")){
            $sql->bind_param('ssss', $username, $id, $stars, $comments);
            $sql->execute();
            
            echo "<script type='text/javascript'>
            window.location.href='details.php?q=",$id,"';
            </script>";
            echo "Record inserted successfully.";

            $sql->close();
            $conn->close();
        } else {
            echo "Please try again.";
        }

        // mysqli_close($conn);

    ?>
</body>
</html>