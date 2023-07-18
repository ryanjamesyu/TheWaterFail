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
		<!--bootstrap-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
		
		<!--jQuery and Javascript -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
        <script src="signup.js?rev=0"></script>
		<link rel="stylesheet" href="style.css">

		<title>Account Information</title>
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
		<h1>The Water Fail User Profile</h1>
		<p>Username: <?php echo $_SESSION['name']?></p>

        <h2>Reviews You've Left</h2>
        <?php
        //database information
        $servername = "localhost";
        $username = "ufmb43rz8doxi";
        $password = "gwsocwr9jzoj";
        $dbname = "dbhal18xhhgdkp";
        
        //try to conenct to database
        $conn = new mysqli($servername, $username, $password, $dbname);
        if($conn === false){
            exit("Connection error. " . mysqli_connect_error());
        }

        $name = $_SESSION['name'];

        $sql = "SELECT ID, Stars, Comments FROM Reviews WHERE Username = '$name'";
        $result = mysqli_query($conn, $sql);
        ?>

        <section>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Fountain ID</th>
                <th>Stars</th>
                <th>Comments</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                if(mysqli_num_rows($result) > 0) {
                while($rows=$result->fetch_assoc())
                {
                    $id = $rows['ID'];
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td>&nbsp&nbsp&nbsp&nbsp&nbsp<a href="details.php?q=<?php echo $id; ?>"><?php echo $rows['ID'];?></a></td>
                <td><?php echo $rows['Stars'];?></td>
                <td><?php echo $rows['Comments'];?></td>
            </tr>
            <?php
                }
				}
            ?>
        </table>
    </section>
	</body>
</html>