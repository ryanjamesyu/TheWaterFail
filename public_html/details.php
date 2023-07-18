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

    $id = $_GET['q'];
    $building = "";
    $location = "";
    $description = "";
    $username = "";
    $reviewed = "";
    $imagelink = "";

    if ($sql = $conn->prepare('SELECT Description, Building, Location, Username, Imagelink, Reviewed FROM Fountains WHERE ID = ?')){
        $sql->bind_param('i', $id );
        $sql->execute();
        $sql->store_result();
        if ($sql->num_rows > 0){
            $sql->bind_result($description, $building, $location, $username, $imagelink, $reviewed);
            $sql->fetch();
        }else {
            echo "Error. Please try again.";
        } //Select image to display
        if(strcmp($imagelink, "")==0){
            $imagelink = "defaultimage.png";
        }else if (!$reviewed == 1){
            $imagelink = "pendingimage.jpg";
        }   
        $sql->close();

		// if ($sql2 = $conn->prepare( "SELECT Username, Stars, Comments FROM Reviews WHERE ID = ?")){
        // 	$sql2->bind_param('i', $id );
        // 	$sql2->execute();
        // 	$sql2->store_result();
		// }

        $sql2 = "SELECT Username, Stars, Comments FROM Reviews WHERE ID = '$id'";
        $result = mysqli_query($conn, $sql2);

    }

?>

<!DOCTYPE html>
<html lang="en">
<header>
    <title>Fountain Details</title>
	<!--bootstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css">

	<!--jQuery and Javascript -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
	<!-- <script src="signup.js?rev=0"></script> -->

</header>

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

    <h2>Water Fountain at <?php echo $location ?> in <?php echo $building ?>: </h2>
    <p>Description:<br><?php echo $description; ?></p>
    <p>Submitted by: <?php echo $username ?></p>
    <p><img src="<?php echo $imagelink ?>" alt="Image of Water Fountain at <?php echo $location ?>" width=auto height = 400></p>

<section>
        <h2>Reviews</h2>
        Average Stars:
        <?php 
        if ($sql3 = $conn->prepare('SELECT AVG(Stars) FROM Reviews WHERE ID = ?')){
            $sql3->bind_param('i', $id );
            $sql3->execute();
            $sql3->store_result();
            $sql3->bind_result($Avg);
            $sql3->fetch();
            echo round($Avg, 1);
        }
        ?>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>User</th>
                <th>Stars</th>
                <th>Comments</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                if(mysqli_num_rows($result) > 0) {
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['Username'];?></td>
                <td><?php echo $rows['Stars'];?></td>
                <td><?php echo $rows['Comments'];?></td>
            </tr>
            <?php
                }
				}
            ?>
        </table>
    </section>

    <td><a href="reviews.php?q=<?php echo $id; ?>">Leave a Review</a></td>
</body>

</html>