<html>
<?php
	session_start();
	include 'config.php';
	$useri = $_SESSION['username'];
	
	$saltquery = "SELECT salt FROM users_table WHERE username='$useri'";
	$salt = mysqli_query($db,$saltquery);
	$row = mysqli_fetch_row($salt);
	$salt = $row[0];
	
	$DBpasswordquery = "SELECT password FROM users_table WHERE username='$useri'";
	$DBpassword = mysqli_query($db,$DBpasswordquery);
	$row1 = mysqli_fetch_row($DBpassword);
	$DBpassword = $row1[0];
	
	$newpassword = mysql_real_escape_string(stripslashes($_POST['newPassword']));
	$cpassword = mysql_real_escape_string(stripslashes($_POST['currentPassword']));
	
	$cpassword = md5(md5($cpassword).$salt);
	$newpassword = md5(md5($newpassword).$salt);
	
	if($cpassword!=$DBpassword)
	{
		header("location: password.php");
		exit;
	}
	else 
	{
		$updatepass="UPDATE users_table SET password = '".$newpassword."' WHERE username = '".$useri."'";
		mysqli_query($db,$updatepass);
		header("location: tasks/tasks.php");
		exit;
	}
	?>
</html>