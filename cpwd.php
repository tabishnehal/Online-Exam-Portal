<?php
ob_start();
   session_start();
   if(!isset($_SESSION['Email'])){
       header('location:Std_Login.php');
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
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="Instruction.php"><span class="glyphicon glyphicon-home"></span> Online Exam</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavBar">
                    <ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="menu1" data-toggle="dropdown"><span class="glyphicon glyphicon-home"></span><?php echo " Welcome ".$_SESSION['Name']." ";?></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="Instruction.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="update.php"><span class="glyphicon glyphicon-user"></span> Update</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="cpwd.php"><span class="glyphicon glyphicon-cog"></span> Change Password</a></li><li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="Logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
    </ul>
 			</li>
		   </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row row_style4">
                <div class="col-xs-4 col-xs-offset-4">
<?php
if(isset($_POST['change'])){
   require 'require/connection.php';
    $op=$_POST['Opassword'];
    $Npwd=$_POST['Npassword'];
    $npwd=$_POST['npassword'];
    $hash=password_hash($Npwd,PASSWORD_DEFAULT);
    $em=$_SESSION['Email'];
$sql=<<<EOF
select password from student where email='$em';
EOF;
$ret=pg_query($db,$sql);
   if(!$ret) {
       echo pg_last_error($db);
   }else{
	$row=pg_fetch_row($ret);
	if(password_verify($op,$row[0])){
		if($Npwd==$npwd){
	$sql1=<<<EOF
        	update student set password='$hash' where email='$em';
EOF;
	$ret1=pg_query($db,$sql1);
   	if(!$ret1) {
     	echo pg_last_error($db);   
   	}else{
	   	echo "Password changed successfully.Redirecting to home page...\n";
		header('Refresh: 2; URL=Instruction.php');
	      }
        	}else{
			echo "Passwords do not match!Please try again\n";
		     }
   	}else{
		echo "Password Invalid!Please try again\n";
	     }
}
}
?>
        <form action="cpwd.php" method="POST">
            <h2>Change Password</h2>
            <div class="form-group">
                <input type="password" name="Opassword" class="form-control" placeholder="Old Password">
            </div>
            <div class="form-group">
                <input type="password" name="Npassword" class="form-control" placeholder="New Password">
            </div>
            <div class="form-group">
                <input type="password" name="npassword" class="form-control" placeholder="Re-type New Password">
            </div>
            <input type="submit" name="change" value="Change">    
        </form>
                </div>
            </div>
        </div>
        <?php
       require 'require/footer.html';
        ?>
    </body>
    </html>
