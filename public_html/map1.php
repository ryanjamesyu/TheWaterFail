<?php
    ob_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    session_start();

    //If not logged in, redirect to login
    // echo 'Loggedin?', $_SESSION['loggedin'];
    if (!isset($_SESSION['loggedin'])) {
        header('Location: login.html');
        exit;
    }
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Waterfail Map </title>
        <link rel="stylesheet" href="map.css?rev=0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
        </script>
        <script type="text/javascript">
           /* $(document).ready(function(){
                function myFunction(data){
                    alert("you clicked the " + data + " ting");
                }      
            });*/
            function myFunction(param) {
                $.post("searchfountains.php", { building: "Armstrong"}, function (data) {
                    document.write(data);
                });
                alert("you clicked the " + param + " ting!");
            }
        </script>
    </head>

    <body><!--
        <div class="img-wrapper">
            <img class="img-responsive" 
                src="https://media.discordapp.net/attachments/858723136279281665/1037057413238493244/unknown.png?width=1068&height=670" alt="waterfail map">
            <div class="img-overlay">
                <button class="btn">Armstrong</button>
            </div>
        </div>-->
		<h1> Fountain map </h1>
            <img src="https://media.discordapp.net/attachments/858723136279281665/1037057413238493244/unknown.png?width=1068&height=670" alt="waterfail map" usemap="#workmap">
            <map name="workmap">
          <!-- href can be used for these to redirect user-->
            <area shape="rect" coords="34,44,270,350" onclick="myFunction('hi');">
            </map>
        
    </body>
</html>