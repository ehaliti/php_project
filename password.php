<?php include("notification.php"); ?>
<?php
	session_start();
	$useri = $_SESSION['username'];
	//include 'config.php';
if(isset($_SESSION['username']))
{

	 if(isset($_POST['currentPassword']))
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" media="screen" href="lib/js/themes/redmond/jquery-ui.custom.css">
</link>
<link rel="stylesheet" type="text/css" media="screen" href="lib/js/jqgrid/css/ui.jqgrid.css">
</link>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
<script>

	 function validatePassword()
	 {
			 var newPassword  = document.getElementsByName("newPassword")[0];
			 var newPasswordC  = document.getElementsByName("confirmPassword")[0];
			 var errorP = document.getElementsByName("errorParagraph")[0];
		 	 var txtcpass=document.getElementsByName("currentPassword")[0].value;
		 	 var txtnewpass=document.getElementsByName("newPassword")[0].value;
		     var txtnewcpass=document.getElementsByName("confirmPassword")[0].value;

		 var status = 1;
		 if (txtcpass.length==0 || txtnewpass.length==0 || txtnewcpass.length==0)
		 {
		    errorP.innerHTML='One of the fields is empty!';
			return false;
		 }
		 if(newPassword.value!=newPasswordC.value)
		 {
			 newPasswordC.value='';
			 newPassword.value='';
			 newPassword.focus();
			 errorP.innerHTML='New Password must match Confirm Password';

			 return false;
		 }
		 if (txtnewpass.length < 8) {status = 0;}

		 if ( !(( txtnewpass.match(/[a-z]/) ) && ( txtnewpass.match(/[A-Z]/) ) )) status = 0;

		 if (!txtnewpass.match(/\d+/)) status = 0;

		 if (!txtnewpass.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) status = 0;

		if (status==0)
		{
			errorP.innerHTML='New Password must contain at least an uppercase, a lowercase, a special character and a number.';
			return false;
		}
		else
		{
			return true;
		}
	 }
		</script>
<style>
		input[type="submit"]{
			width:auto;
			}
		form{
			background:#FFFFFF;
			padding:0;
			}
	</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Password - Screening Unit</title>
</head>
<body>

<div style="background:url('images/inventory.png') no-repeat center center; background-size: cover;" width="100%" border="0" cellpadding="0" cellspacing="0" >
    <table width="100%" id="header">
        <tr>
            <td width="20%"><img src="images/logo.png" width="250" height="65" align="middle" style="padding-left:10px"/></td>
            <td width="50%" align="center"><div class="titllinalt">PROHIBITED ARTICLES/WORKING TOOLS<br />
                    <br />
                    <span style="font-size:20px">Screening Unit</span> </div></td>
            <td width="20%" align="right" style="padding:10px"><span class="contnormal"><?php echo $useri;?></span> <img src="images/user.png" height="13" width="13" style="padding-left:3px"/> <br />
                <a href='password.php'>Change Password</a>
                    <img src="images/lock.png" height="13" width="13" style="padding-left:3px"/> <br />
                <a href='logout.php'>Logout</a>
                    <img src="images/logout.png" height="13" width="13" style="padding-left:3px; padding-right:0px"/> <br />
                <br />
        </tr>
    </table>
    <table width="100%" height="40" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td height="35"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="711" align="center" valign="middle"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="70%" align="right"><div class="drop" style="float:left">
                                            <ul class="drop_menu dm_inventory">

                                                <li> <a href='reports/reports.php'>Screening Reports</a> </li>


                                        </div></td>
                                    <td width="30%" align="right"><div class="drop" style="float:right">
                                        </div></td>
                                </tr>
                            </table></td>
                    </tr>
                </table></td>
        </tr>
    </table>
</div>
<div style="width:100%; height:15px; background:#1a4a6f; vertical-align:middle; border-top:1px solid #D4D4D4;"></div>
<form name="frmChange" method="post" action="validatepassword.php" onSubmit="return validatePassword()" style="width:100%; margin-top:80px;">
	<div style="width:500px; margin:auto">
		<div class="message">
			<?php if(isset($message)) { echo $message; } ?>
		</div>
		<table style="text-align:right;" border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
			<tr class="tableheader" >
				<td colspan="2" style="text-align:center; font-size:24px; padding-bottom:50px;">Change Password</td>
			</tr>
			<tr>
				<td width="40%"><label>Current Password</label></td>
				<td width="40%"><input type="password" name="currentPassword" class="txtField"/>
					<span id="currentPassword"  class="required"></span></td>
			</tr>
			<tr>
				<td><label>New Password</label></td>
				<td><input type="password" name="newPassword" class="txtField"/>
					<span id="newPassword" class="required"></span></td>
			</tr>
			<td><label>Confirm Password</label></td>
				<td><input type="password" name="confirmPassword" class="txtField"/>
					<span id="confirmPassword" class="required"></span></td>
			</tr>
			<tr>
				<td colspan="2" style="text-align:center"><input type="submit" name="submit" value="Submit" style="height:50px"></td>
			</tr>
			<tr>
				<td colspan="2" style="text-align:center"><b style="color:red;" name="errorParagraph">
					<?php if(isset($_POST['currentPassword'])){ echo 'The existing password is incorrect'; } ?>
					</b></td>
			</tr>
		</table>
	</div>
</form>
</body>
</html>
<?php }

else
header("location: index.php");
?>
