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
                        <?php
                        require 'require/Sign_Login.html';
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row row_style2">
                <div class="col-xs-4 col-xs-offset-4">
		<?php
if(isset($_POST['submit'])){
   require 'require/connection.php';
    $nm = $_POST['Name'];
    $em = $_POST['Email'];
    $hash = password_hash($_POST['Password'],PASSWORD_DEFAULT);
    $ct = $_POST['Contact'];
    $cty = $_POST['City'];
$sql =<<<EOF
        INSERT INTO ADMIN (name,email,password,contact,city) 
	VALUES ('$nm', '$em', '$hash', '$ct','$cty');
EOF;
$ret = @pg_query($db, $sql);
   if(!$ret) {
       echo "<b>$em already exists!<b>";
   }else{
       echo "<h4><b>Registration Successfull</b></h4>";
	?>
	<a href="Admin_Login.php"><h4>Click to Login</h4></a>
<?php
	}	
   pg_close($db);
}
?>
        <form action="Admin_Signup.php" method="POST">
            <h2>SIGN UP</h2>
            <div class="form-group" >
                <input type="text" name="Name" class="form-control" placeholder="Name" required="true">
            </div>
            <div class="form-group">
                <input type="email" class="form-control"  placeholder="Email" name="Email" required = "true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" >
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="Password" required = "true" pattern=".{6,}">
            </div>
            <div class="form-group">
                <input type="text" name="Contact" class="form-control" placeholder="Contact" required="true">
            </div>
            <div class="form-group">
                <input type="text" name="City" class="form-control" placeholder="City">
            </div>
            <input type="submit" name="submit" value="Submit">     
        </form>
                </div>
            </div>
        </div>
        <?php
       require 'require/footer.html';
        ?>
    </body>
</html>
