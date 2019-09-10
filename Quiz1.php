<?php
   session_start();
   if(!isset($_SESSION['Email'])){
       header('location:Std_Login.php');
       exit;
       }
if(!isset($_POST['submit'])){
$_SESSION['qn']=1;}
$tid=$_SESSION['timeid'];
$tq=$_SESSION['totalquestion'];
$qid=$_SESSION['qid'];
require 'require/connection.php';
if(isset($_POST['submit']))
{	$_SESSION['qn']+=1;
	$a=$_POST['a'];
	if(!empty($a))
	{
	$_SESSION['attempt']+=1;
		if($a==$_SESSION['answer'])
		{		
		$_SESSION['score']+=1;
		$_SESSION['rightattempt']+=1;	
		}
		else
		{
		$_SESSION['wrongattempt']+=1;
		}				
	}
	else
	{
	$_SESSION['unattempt']+=1;
	}
}
else
{
if($_SESSION['attempt']==0)
{
$sql0 =<<<EOF
select * from timer where id='$tid';
EOF;	
$res=pg_query($db,$sql0);
		if(!$res)
		{
 		echo pg_last_error($db);
		}
		else
		{
			while($row1=pg_fetch_row($res))
			{
				$duration=$row1[1];
			}
			$_SESSION["duration"]=$duration;
		}	

	}


}
	if($_SESSION['qn']<=$tq){
		if(!isset($_POST['submit']))
		{
		$_SESSION['unattempt']=0;
		$_SESSION['attempt']=0;
		$_SESSION['rightattempt']=0;
		$_SESSION['wrongattempt']=0;
		$id=1;
		$_SESSION['score']=0;
		}
		else
		{
		$rand=mt_rand(1,10);
		if(@$idp==$rand){
			$id=mt_rand(1,$qid);
		    }else{
			$id=$rand;
			 }
		$idp=$rand;
		}
		$sql=<<<EOF
    		select * from question where id='$id';
EOF;
$result=pg_query($db,$sql);
if(!$result){
 echo pg_last_error($db);
}else{
     		$row=pg_fetch_row($result);
		$_SESSION['id']=$row[0];
		$_SESSION['Question']=$row[1];
		$_SESSION['a']=$row[2];
		$_SESSION['b']=$row[3];
		$_SESSION['c']=$row[4];
		$_SESSION['d']=$row[5];
		$_SESSION['answer']=$row[6];

}
}else{
   header('location:score.php');
}
?>
<html>
    <head>
         
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >


        <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript">
	function timeout()
	{
		var hours=Math.floor(timeleft/3600);
		var minute=Math.floor((timeleft-(hours*60*60)-30)/60);
		var second=timeleft%60;
		var hrs=checktime(hours);
		var mint=checktime(minute);
		var sec=checktime(second);
		if(timeleft<=0)
		{
			$("form1").submit();			
			clearTimeout(tm);
		}
		else
		{
			document.getElementById("time").innerHTML=hrs+":"+mint+":"+sec;
		}
		timeleft--;
		var tm=setTimeout(function(){timeout()},1000);
	}
	function checktime(msg)
	{
		if(msg<10)
		{
		 msg="0"+msg;
		}
	return msg;
	}
</script>

        <!--Latest compiled and minified JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	var timeleft=60;
	</script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <title>Onilne Exam Portal</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body onload="timeout()">
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
			<div id="time" class="btn btn-primary btn-lg active" style="float:right"></div>
        	   <div class="panel panel-primary">
            		<div class="panel-heading"><h4><?php echo "Q ".$_SESSION['qn'].") ".$_SESSION['Question'];?></h4>
			</div>
            		<div class="panel-body">	
			<form action="Quiz1.php" id="form1" method="POST">
                         <div class="form-group">
    			a)<input type="radio" name="a" value="a">
    			<?php echo " ".$_SESSION['a'];?><br>
			</div>
			<div class="form-group">
    			b)<input type="radio" name="a" value="b">
    			<?php echo " ".$_SESSION['b'];?><br>
			</div>
			 <div class="form-group">
    			c)<input type="radio" name="a" value="c">
    			<?php echo " ".$_SESSION['c'];?><br>
			</div>
			<div class="form-group">
    			d)<input type="radio" name="a" value="d">
    			<?php echo " ".$_SESSION['d'];?><br>
			 </div>
			<div class="panel-footer"><input type="submit" name="submit" value="Submit"></div>			 	
			</from>
			</div>
        	   </div>
                </div>   
            </div>
        </div>
    </body>
</html>

