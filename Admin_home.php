<?php
   ob_start();
   session_start();
   if(!isset($_SESSION['Email'])){
       header('location:Admin_Login.php');
       exit;
       } 
?>
<html>
    <head>
         
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >


        <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


        <!--Latest compiled and minified JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <title>Online Exam Portal</title>
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
                        <li class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="menu1" data-toggle="dropdown"><?php echo " Welcome ".$_SESSION['Name']." ";?></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="update1.php"><span class="glyphicon glyphicon-user"></span> Update</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="cpwd1.php"><span class="glyphicon glyphicon-cog"></span> Change Password</a></li><li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="Logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
    </ul>
 			</li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row row_style2">
                <div class="col-xs-4 col-xs-offset-4">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4>Details</h4>
            </div>
            <div class="panel-body">
              <b>Name:</b><br><?php echo $_SESSION['Name'];?><br>
	      <b>Email:</b><br><?php echo $_SESSION['Email'];?><br>
	      <b>Contact:</b><br><?php echo $_SESSION['Contact'];?><br>            
	</div>
        </div>
	<div class="panel panel-primary">
            <div class="panel-heading"><h4>Operations</h4>
            </div>
            <div class="panel-body">
              <a href="Addq.php"><h4>Add Questions</h4></a><br>
	      <a href="SetQD.php"><h4>Set Total Number Of Question and Duration of Exam</h4></a>            
	</div>
        </div>
                </div>
            </div>
        </div>
        <?php
       require 'require/footer.html';
        ?>
    </body>
</html>
