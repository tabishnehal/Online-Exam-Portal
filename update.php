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
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row row_style1">
                <div class="col-xs-4 col-xs-offset-4">
<?php
if(isset($_POST['update']) && (!empty($_POST['Name']) || !empty($_POST['Email']) || !empty($_POST['Contact']))){
   require 'require/connection.php';
    $name=$_POST['Name'];
    $em=$_POST['Email'];
    $ct=$_POST['Contact'];
    $pwd=$_POST['Password'];
    $email=$_SESSION['Email'];
$sql=<<<EOF
select password from student where email='$email';
EOF;
$ret=pg_query($db,$sql);
   if(!$ret) {
       echo pg_last_error($db);
   }else{
	$row=pg_fetch_row($ret);
	if(password_verify($pwd,$row[0])){
		if(!empty($name) && !empty($em) && !empty($ct)){
		         $sql0=<<<EOF
			update student set name='$name',email='$em',contact='$ct' where email='$email';
EOF;
			$ret0=pg_query($db,$sql0);
   	if(!$ret0) {
     	echo pg_last_error($db);   
   	}else{
		$_SESSION['Email']=$em;
		$_SESSION['Name']=$name;
		$_SESSION['Contact']=$ct;
		header('location:Instruction.php');
	      }
		  }else if(empty($name) && empty($em)){
				$sql1=<<<EOF
			update student set contact='$ct' where email='$email';
EOF;
			$ret1=pg_query($db,$sql1);
   	if(!$ret1) {
     	echo pg_last_error($db);   
   	}else{
		header('location:Instruction.php');
	      }
		}else if(empty($name) && empty($ct)){
				$sql2=<<<EOF
			update student set email='$em' where email='$email';
EOF;
			$ret2=pg_query($db,$sql2);
   	if(!$ret2) {
     	echo pg_last_error($db);   
   	}else{
		$_SESSION['Email']=$em;
		header('location:Instruction.php');
	      }
		}else if(empty($em) && empty($ct)){
				$sql3=<<<EOF
			update student set name='$name' where email='$email';
EOF;
			$ret3=pg_query($db,$sql3);
   	if(!$ret3) {
     	echo pg_last_error($db);   
   	}else{
		$_SESSION['Name']=$name;
		header('location:Instruction.php');
	      }
		}else if(empty($name)){
				$sql4=<<<EOF
			update student set email='$em',contact='$ct' where email='$email';
EOF;
	$ret4=pg_query($db,$sql4);
   	if(!$ret4) {
     	echo pg_last_error($db);   
   	}else{
		$_SESSION['Email']=$em;
		$_SESSION['Contact']=$ct;
		header('location:Instruction.php');
	      }
		}else if(empty($em)){
				$sql5=<<<EOF
			update student set name='$name',contact='$ct' where email='$email';
EOF;
	$ret5=pg_query($db,$sql5);
   	if(!$ret5) {
     	echo pg_last_error($db);   
   	}else{
		$_SESSION['Name']=$name;
		$_SESSION['Contact']=$ct;
		header('location:Instruction.php');
	      }
		}else{
				$sql6=<<<EOF
			update student set name='$name',email='$em' where email='$email';
EOF;
	$ret6=pg_query($db,$sql6);
   	if(!$ret6) {
     	echo pg_last_error($db);   
   	}else{
		$_SESSION['Email']=$em;
		$_SESSION['Name']=$name;
		header('location:Instruction.php');
	      }
   	}
	}else{
		echo "Password Invalid!Please try again\n";
	     }
}
}
?>
        <div class="panel panel-primary">
            <div class="panel-heading"><h4>Update Details</h4>
            </div>
            <div class="panel-body">
	    <p class="text-warning"><h5>Fill in the field to update</h5></p>
            <form action="update.php" method="POST">
		    <div class="form-group">
                        <input type="text" class="form-control" name="Name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="Email" placeholder="Email">
                    </div>
		    <div class="form-group">
                        <input type="text" class="form-control" name="Contact" placeholder="Contact">
                    </div>
                    <div class="form-group">
                        <p>Enter password to update details</p><input type="password" class="form-control" name="Password" placeholder="Password">
                    </div>
                    <input type="submit" name="update" value="Update">
                </form>
            </div>
        </div>
             </div>   
        </div>
        </div>
        <?php
       include 'require/footer.html';
        ?>
    </body>
</html>

