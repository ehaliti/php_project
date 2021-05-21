<?php 

session_start();
include '../config.php';

	$priority = mysql_real_escape_string(stripslashes($_POST['priority']));
	$initiated_date = mysql_real_escape_string(stripslashes($_POST['initiated_date']));
	$customer = mysql_real_escape_string(stripslashes($_POST['customer']));
	$department = mysql_real_escape_string(stripslashes($_POST['department']));
	$telephone = mysql_real_escape_string(stripslashes($_POST['telephone']));
	$email = mysql_real_escape_string(stripslashes($_POST['email']));
	$software_service = mysql_real_escape_string(stripslashes($_POST['software_service']));
	$notes = mysql_real_escape_string(stripslashes($_POST['notes']));
	
	$sql_task = "INSERT INTO tasks_table VALUES (NULL, 'Other', '$priority', CURDATE(), NULL, '', NULL, '', '$customer', '$department', '$telephone', '$email', '$software_service', '', '', '', '$notes','')";
	if(mysqli_query($db,$sql_task))
	{
		$id =  $db->insert_id;
		
		$ip = $_SERVER['REMOTE_ADDR'];
		$update_logs = "id=$id, priority=$priority, initiated_date=$initiated_date, customer=$customer, department=$department, telephone=$telephone, email=$email, software_service=$software_service, notes=$notes";
		
		$sql_logs = "INSERT INTO logs_table VALUES (NULL, CURRENT_TIMESTAMP, '$ip', '$customer', 'tasks', 'add','$update_logs','----', false)";
		mysqli_query($db,$sql_logs);
		
		$taskData = "Priority:  $priority \n";
		$taskData .= "Initiated Date:  $initiated_date \n";
		$taskData .= "Customer:  $customer \n";
		$taskData .= "Department:  $department \n";
		$taskData .= "Telephone:  $telephone \n";
		$taskData .= "Email:  $email \n";
		$taskData .= "Problem:  $software_service \n";
		$taskData .= "Description:  $notes \n";
		
		$bodyText = "Dear Customer,\n\nPlease be informed that your Task with ID $id, has been submitted successfully!\n\n$taskData \n\nFor additional inquiry, please contact ICT Department Duty.\n +381 38 501 502 1133 or +377 45 811 104\n\n\nThis email has been automatically generated from ICT Task Management.";
		
		include 'email.php';
		sendTaskMail($bodyText, $email);
		
		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" media="screen" href="../lib/js/themes/petriti/jquery-ui.css">
</link>
<link rel="stylesheet" type="text/css" media="screen" href="../lib/js/jqgrid/css/ui.jqgrid.css">
</link>
<link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
<script src="../lib/js/jquery.min.js" type="text/javascript"></script>
<script src="../lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
<script src="../lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>
<script src="../lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
<script src="../jq/lib/js/grid.setcolumns.js" type="text/javascript"></script>
<script src="../jq/lib/js/grid.setcolumns.js" type="text/javascript"></script>
<script src="../jq/lib/js/grid.addons.js" type="text/javascript"></script>
<script src="../jq/lib/js/grid.postext.js" type="text/javascript"></script>
<script src="../jq/lib/js/jquery.contextmenu.js" type="text/javascript"></script>
<script src="../jq/lib/js/jquery.searchfilter.js" type="text/javascript"></script>
<script src="../jq/lib/js/jquery.tablednd.js" type="text/javascript"></script>
<script src="../jq/lib/js/ui.multiselect.js" type="text/javascript"></script>
<script type="text/javascript"></script>
<style>
				.myAltRowClass { background-color: #ecedf1; background-image: none; }
				form {background:#FFFFFF;}
				.required {color:red;}
				#list1 tbody tr td {vertical-align: middle;}
				#TblGrid_list1 select {width:150px;}
				#TblGrid_list1 input {width:140px;}
				.boldTD {font-weight:bold; line-height:25px; text-align:right; padding:10px; }
				.ui-jqgrid tr.jqgrow td {
											white-space: normal !important;
											padding:2px 5px;}
			</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<title>ICT Tasks</title>
</head>
<body onload=onload();>
<table width="100%" border="0" cellpadding="0" cellspacing="0" id="header" background="../images/tasks.png" style="background-size: 100%">
  <tr>
    <td width="30%" height="125"><img src="../images/logo.png" width="426" height="100" border="0" align="middle" style="padding-left:10px"/></td>
    <td width="70%" align="center"><div class="titllinalt">Tasks<br />
        <br />
        <span style="font-size:20px">ICT Department</span> </div></td>
  </tr>
</table>
<div style="width:100%; height:25px; background:#61A24D; vertical-align:middle;"> </div>
<div style="width:100%; height:420px; padding-top:5px">
  <div class="ui-widget ui-widget-content ui-corner-all ui-jqdialog jqmID1" id="editmodlist1" dir="ltr" tabindex="-1" role="dialog" aria-labelledby="edithdlist1" aria-hidden="false" style="width: 750px; height: auto; margin:auto; position:relative; display: block;">
    <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix" id="edithdlist1"><span class="ui-jqdialog-title" style="float: left;">Submitted Task</span></div>
    <div class="ui-jqdialog-content ui-widget-content" id="editcntlist1">
      <div>
        <table id="TblGrid_list1" class="EditTable" cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <td colspan="2" style="text-align:center; padding-bottom:25px; padding-top:20px;">Dear Customer, please be informed that your Task with ID <span style='font-weight:bold'><?php echo $id ?></span> has been submitted successfully! 
			  <br />An email with task details shall be sent to the customer!</td>
            </tr>
            <tr id="FormError" style="display:none">
              <td class="ui-state-error" colspan="2"></td>
            </tr>
            <tr style="display:none" class="tinfo">
              <td class="topinfo" colspan="2"></td>
            </tr>
            <tr rowpos="3" class="FormData" id="tr_priority">
              <td class="CaptionTD boldTD">Priority:</td>
              <td class="DataTD"><?php echo $priority; ?></td>
            </tr>
            <tr rowpos="4" class="FormData" id="tr_initiated_date">
              <td class="CaptionTD boldTD">Initiated Date:</td>
              <td class="DataTD"><?php echo $initiated_date; ?></td>
            </tr>
            <tr rowpos="9" class="FormData" id="tr_customer">
              <td class="CaptionTD boldTD">Customer:</td>
              <td class="DataTD"><?php echo $customer; ?></td>
            </tr>
            <tr rowpos="10" class="FormData" id="tr_department">
              <td class="CaptionTD boldTD">Department:</td>
              <td class="DataTD"><?php echo $department; ?></td>
            </tr>
            <tr rowpos="11" class="FormData" id="tr_telephone">
              <td class="CaptionTD boldTD">Telephone:</td>
              <td class="DataTD"><?php echo $telephone; ?></td>
            </tr>
            <tr rowpos="12" class="FormData" id="tr_email">
              <td class="CaptionTD boldTD">Email:</td>
              <td class="DataTD"><?php echo $email; ?></td>
            </tr>
            <tr rowpos="13" class="FormData" id="tr_software_service">
              <td class="CaptionTD boldTD">Problem:</td>
              <td class="DataTD"><?php echo $software_service; ?></td>
            </tr>
            <tr rowpos="17" class="FormData" id="tr_notes">
              <td class="CaptionTD boldTD">Description:</td>
              <td class="DataTD"><?php echo $notes; ?></td>
            </tr>
            <tr class="FormData" style="display:none">
              <td class="CaptionTD"></td>
              <td colspan="1" class="DataTD"><input class="FormElement" id="id_g" type="text" name="list1_id" value="_empty"></td>
            </tr>
            <tr>
              <td colspan="2" style="color:#FF0000; text-align:center; padding-bottom:25px; padding-top:20px;">For additional inquiry, please contact ICT Department Duty.<br /> +381 38 501 502 1133 or +377 45 811 104</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div style="bottom:0; width:100%; height:25px; background:#61A24D; vertical-align:middle; text-align: center; color: white; padding-top:5px; position: fixed;"> &copy 2016 ICT Department - Prishtina International Airport "Adem Jashari" </div>
</body>
</html>

<?php
	}
	else
	{
		echo $db->error;
	}
?>