<?php
session_start();
require 'require/connection.php';
if(isset($_POST['submit'])){
		$a=$_POST['a'];
		if(!empty($a)){
		if($a==$_SESSION['answer']){
	 		echo "Correct option is submitted\n";
			$_SESSION['id']+=1;
			$_SESSION['score']+=1;
			header('location:Quiz.php');
			exit;	
		}else{
	 		echo "InCorrect option is submitted\n";
			$_SESSION['id']+=1;
			header('location:Quiz.php');
		}
	}
}
		
?>
