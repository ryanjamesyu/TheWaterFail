<?php
    ob_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
	session_start();
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

    //Check that all login data was submitted
    if(!isset($_POST['username'], $_POST['password'])){
        exit('Please fill enter both a Username and a Password on the login page.');
    }
    if ($sql = $conn->prepare('SELECT ID, password FROM Users WHERE username = ?')){
        $sql->bind_param('s',$_POST['username']);
        $sql->execute();
        $sql->store_result();
        if ($sql->num_rows > 0){
            $sql->bind_result($id, $password);
            $sql->fetch();
				//echo $password;
				//exit();
				//if (password_verify($_POST['password'], $password)){
            if (password_verify($_POST['password'], $password)){
				//echo $_SESSION['id'], $_SESSION['name'], $_SESSION['loggedin']; 
                session_regenerate_id();
                $_SESSION['loggedin'] = true;
                $_SESSION['name'] = $_POST['username'];
                $_SESSION['id'] = $id;
				echo $_SESSION['id'], $_SESSION['name'], $_SESSION['loggedin'];
                header('Location: index.php');
                exit;                
            } else {
				//echo $_POST['password'];
				//echo $password;
                echo 'Incorrect username or password.';
                exit;
            }
        } else {
            echo 'Incorrect username or password.';
            exit;
        }        
        $sql->close();
    }
?>