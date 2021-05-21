

<?php
	include("config.php");
	session_start();

	$error="";

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		// username and password sent from form
		$myusername = mysqli_real_escape_string($db,$_POST['username']);
		$mypassword = mysqli_real_escape_string($db,$_POST['password']);
		$mypassword = md5($mypassword);
		$saltquery="SELECT salt FROM users_table WHERE username='$myusername'";
		$salt = mysqli_query($db,$saltquery);
		$row = mysqli_fetch_row($salt);
		$salt=$row[0];

		$mypassword = md5($mypassword.$salt);
		$sql="SELECT id FROM users_table WHERE username='$myusername' and password='$mypassword'";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$active=$row['active'];

		$count=mysqli_num_rows($result);

      	// If result matched $myusername and $mypassword, table row must be 1 row

      	if($count==1)
      	{
	  		$_SESSION['username']=$myusername;


				header("location: ../screening/reports/reports.php");
		}
      	else
      	{
			$error="Wrong Password!";
      	}
   }
?>
<html>
<head>
<title>Login - SCREENING</title>
<style type="text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }

         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }

         .box {
            border:#666666 solid 1px;
         }
		 form
		 {
		 	background-color:#538BD7;
			height:220px;

		 }
		#posht {
			bottom: 0px;
			position: absolute;
		}
		.errori {
			font-family: Geneva, Arial, Helvetica, sans-serif;
			color: #F00;
			font-size: 16px;
			text-align: center;
			width: 400px;
			margin-right: auto;
			margin-left: auto;
			height: 50px;
			padding-top: 5px;
		}
-->
      </style>
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style11 {font-family: Geneva, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #2E358E;
	font-style: italic;
	font-size: 14px;
	text-align: left;
}
-->
   </style>
</head>
<body bgcolor="#FFFFFF">
<div style="width:100%; height:10px; background:#538BD7"/>
<table width="100%" height="20%" align="center">
	<tr>
		<td width="532" align="center"><div align="center"><img src="images/logo_blue.png" width="400" height="90" style="margin-top:10px"/><br />
				<span class="style11">LIMAK KOSOVO INTERNATIONAL AIRPORT J.S.C. <br />
				Screening Database for Recording Prohibited Articles/Working Tools</span></div></td>
	</tr>
	<tr>
		<td width="532" align="center"><div align="center"> <br/>
				<span class="style11" style="font-size: 24px;"> Security Unit</span></div></td>
	</tr>
</table>
<br>
<div id="login">
	<div id="triangle" style="margin-top:10px"></div>
	<form action="<?=$_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data" style="margin:0 auto">
		<table style="margin:35 auto">
		<tr>
			<td><input name="username" type="text" id="username" placeholder="username" class="dropdown"/></td>
		</tr>
			<tr>
				<td><input name="password" type="password" id="password" placeholder="Password" /></td>
			</tr>
			<tr>
				<td><input name="submit" type="submit" class="buton" id="logini" value="Login" /></td>
			</tr>
		</table>
	</form>
	<?php echo "<div class='errori'>$error</div>" ?> </div>
<table width="100%" border="0" cellpadding="0" cellspacing="0" id="posht">
	<tr>
		<td height="40" bgcolor="#538BD7">&nbsp;</td>
	</tr>
</table>
</body>
</html>
