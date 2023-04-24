<?php
session_start();
include("db.php");
$pagename="Your Login Results"; 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 
echo "<title>".$pagename."</title>";

echo "<body>";

echo "<h4> Available users </h4>";

$email = $_POST['l_email'];
$password = $_POST['l_password'];
if (empty($email) or empty($password)) //check null values
{
 echo "<p><b>Login failed!</b>";
 echo "<br>login form incomplete";
 echo "<br>Make sure you provide all the required details</p>";
 echo "<br><p> Go back to <a href=login.php>login</a></p>";
}
else
{
 $SQL = "SELECT * FROM user WHERE Email = '".$email."'"; 
 $exeSQL = mysqli_query($conn, $SQL) or die (mysqli_error($conn)); //execute SQL query
 $nbrecs = mysqli_num_rows($exeSQL); //retrieve the number of records
		if ($nbrecs ==0) 
		{
			 echo "<p><b>Login failed!</b>"; //display login error
			 echo "<br>Email not recognised</p>";
			 echo "<br><p> Go back to <a href=login.php>login</a></p>";

		}
		else
		{
			$user = mysqli_fetch_array($exeSQL); //create array of user for this email
			echo $user;
			// for($i = 0; $i < $user.length; $i++){
			// 	echo $students[$i];
			// 	echo "<br>";
			  }

}
}
//include head layout
echo "</body>";
?>