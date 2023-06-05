<?php
session_start();
include("config.php");

$errMsg="";
$errText="";

?>
<?php




if (isset($_POST["submit"])) {
	$name=$_POST["name"];
	$password=$_POST["password"];
	$select_user="SELECT * FROM adminlogin WHERE name='$name' AND password='$password'";
	$run_user=mysqli_query($conn, $select_user);
	$count_user=mysqli_num_rows($run_user);

if (($name=="") ||  ($password=="") ){
	$errMsg="A field or more is empty";
}elseif ($count_user==0) {
$errMsg="User not found";
}else{
	$_SESSION["name"]=$name;
	header("Location: index.php", "_SELF");
}



}


?>






<!DOCTYPE html>
<html>
<head>
	   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="naviicon.png">
    <title>NAVI&KAYLA ADMIN</title>
    <!-- Bootstrap Core CSS -->
    <!-- Custom CSS -->
    <link href="css/red.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
   
	
</head>
<body class="trey">
	<div class="form-container">
		<div class="alert-alert-<?php echo $errMsg?>"><?php echo $errText?></div>
		<form method="POST" >

		<img src="Untitled-1.fw.png" alt="Navi&Kayla">

<H2>LOGIN HERE</H2>

			
			<input class="form-control" type="text" name="name" placeholder="Username" >




			
			<input class="form-control" type="Password" name="password" placeholder="Password" >




<div class="Are">
			<input type="submit" name="submit" value="SUBMIT" >	

</div>




		</form>

	</div>


</body>
</html>
<?php



// FORM SUBMISSION
if (isset($_POST["submit"])) {

	// FETCH USERNAME AND PASSWORD FROM THE FORM
	$Username=mysqli_real_escape_string($Navi,$_POST["Name"]);
	$Password=mysqli_real_escape_string($Navi,$_POST["Password"]);


	// TO CHECK USERNAME AND PASSWORD IN DATABASE
	$check_User="SELECT * FROM adminlogin WHERE Username='$Username'";
	$check_Psw="SELECT * FROM adminlogin WHERE Password='$Password'";

	$run_user=mysqli_query($Navi,$check_User);
	$run_pass=mysqli_query($Navi,$check_Psw);

	$count_user = mysqli_num_rows($run_user);
	$count_pass = mysqli_num_rows($run_pass);

//Check whether data exists
	if(($count_user==1)($count_pass==1)){
$_SESSION['Username']=$Username;
$errMsg="success";
$errText="Login successful";

}
else 
{
$errMsg="success";
$errText="Login successful";
}

}



?>