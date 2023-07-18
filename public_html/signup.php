<!DOCTYPE html>

<head>
User Sign Up
</head>



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

        $username = $_REQUEST['username'];
        $password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO Users (username, password)
            VALUES ('$username' , '$password')";

        if(mysqli_query($conn, $sql)){
            echo "<script type='text/javascript'>alert('Account created successfully!');
        window.location.href='login.html';
        </script>";
        } else {
            echo "<script type='text/javascript'>alert('Username is taken. Please try again with a different username');
        window.location.href='signup.html';
        </script>";
        }
        
        mysqli_close($conn);

    ?>