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
                    <a class="navbar-brand" href="Instruction.php"><span class="glyphicon glyphicon-home"></span> Online Exam</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavBar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="menu1" data-toggle="dropdown"><?php echo " Welcome ".$_SESSION['Name']." ";?></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
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
            <div class="row row_style11">
                <div class="col-xs-4">
        	<div class="panel panel-primary">
            <div class="panel-heading"><h4>Details</h4>
            </div>
            <div class="panel-body">
              <b>Name:</b><br><?php echo $_SESSION['Name'];?><br>
	      <b>Email:</b><br><?php echo $_SESSION['Email'];?><br>
	      <b>Contact:</b><br><?php echo $_SESSION['Contact'];?><br>            
	</div>
        </div>
             </div> 
	    <div class="col-md-6 col-md-offset-2">
		<h2>Instructions</h2>	     
		<hr><p><b>Time Limit:<?php echo " ".$time." ";?> Minute&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Total Question:<?php echo " ".$toq." ";?></b></p>
		<p><b>Total Score:<?php echo " ".$score." ";?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Difficulty Level: Medium</b></p>
             <hr>
	     This Exam consists of<?php echo " ".$toq." ";?> multiple-choice questions.<br>
	     <ul>
	     <li><b>Single Attempts</b> - You will have only one attempt per question for this quiz with your score being recorded in the grade book.</li>
	     <li><b>Timing</b> - You will need to complete the question in allotted time, as you are allotted <?php echo " ".$time." ";?> minutes to complete the exam.</li>
		<li><b>Answers</b> - After selection of an option,click <b>Submit</b> button then click <b>Next Problem</b> button to proceed to next problem.You may review your answer-choices and compare them to the correct answers after submition.
To start, click the <b>Start Now</b> button below. When finished, click the <b>Finish</b> button.</li>
		<li><b>Note</b> - The problem would not be considered for evaluation if you do not click <b>Submit</b> button.</li>
		</ul>
		<button class="btn btn-block dropdown-toggle" type="button" id="menu2"><a href="Quiz.php">Start Now</a></button>
             </div>   
        </div>
        </div>
        <?php
       include 'require/footer.html';
        ?>
    </body>
</html>

