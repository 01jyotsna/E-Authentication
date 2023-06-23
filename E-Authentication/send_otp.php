<?php
session_start();
$con=mysqli_connect('localhost','root','','KaranAuth');
$email=$_POST['email'];
$res=mysqli_query($con,"select * from registration where email='$email'");
$count=mysqli_num_rows($res);
if($count>0){
	$otp=rand(111111,999999);
	mysqli_query($con,"update registration set otp='$otp' where email='$email'");
	$_SESSION['EMAIL']=$email;
	echo "yes";
}else{
	echo "not_exist";
}