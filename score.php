<?php
   ob_start();
   session_start();
   if(!isset($_SESSION['Email'])){
       header('location:Std_Login.php');
       exit;
       }
$time=$_SESSION['time'];
$toq=$_SESSION['totalquestion']; 
$score=$_SESSION['sc'];
require 'require/connection.php';
?>
<html>
    <head>
         
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >


        <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


        <!--Latest compiled and minified JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <title>Onilne Exam Portal</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavBar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        
                    </button>
                    <a class="navbar-brand" href="#">Online Exam</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavBar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-user"><?php echo " ".$_SESSION['Name'];?></a></li>
      			<li><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
    		    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row row_style11">
                <div class="col-lg-12">
        	   <div class="panel panel-primary">
            		<div class="panel-heading"><h4>Your Score</h4>
			</div>
            		<div class="panel-body">
			Total Question :<?php echo " ".$toq." ";?><br>
			<hr>
			Total Unattempted:<?php echo " ".$_SESSION['unattempt'];?><br>
			<hr>
			Your Total Attempt:<?php echo " ".$_SESSION['attempt'];?><br>
			<hr>
			Correct Attempt Out of<?php echo " ".$_SESSION['attempt']." ";?>is :<?php echo " ".$_SESSION['rightattempt'];?><br>
			<hr>
			Wrong Attempt Out of<?php echo " ".$_SESSION['attempt']." ";?>is :<?php echo " ".$_SESSION['wrongattempt'];?><br>
			<hr>
			Your Score is<?php echo " ".$_SESSION['score'];?><br>
			</div>
        	   </div>
                </div>   
            </div>
        </div>
    </body>
</html>

