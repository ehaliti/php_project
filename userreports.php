<?php 

// include db config
include("../jq/config.php");

mysql_connect(PHPGRID_DBHOST, PHPGRID_DBUSER, PHPGRID_DBPASS);
mysql_select_db(PHPGRID_DBNAME);

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
<script type="text/javascript">
	function onload()
	{
		$('#initiated_date').attr('readonly', true);
		var monthNames = ["January","February","March","April","May","June","July","August","September","October","November","December"];
		$('#initiated_date').val(function(){
			  var d = new Date();
			  var time = (d.getMinutes()<10)?("0"+d.getMinutes()):(d.getMinutes());
			  return d.getHours()+":"+ time + "  "+d.getDate()+"-"+monthNames[d.getMonth()]+"-"+d.getFullYear();
			});
	}
	</script>
	<style>
		.myAltRowClass { background-color: #ecedf1; background-image: none; }
		form {background:#FFFFFF;}
		.required {color:red;}
		#list1 tbody tr td {vertical-align: middle;}
		#TblGrid_list1 select {width:210px;}
		#TblGrid_list1 input {width:200px;}
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
  <div class="ui-widget ui-widget-content ui-corner-all ui-jqdialog jqmID1" id="editmodlist1" dir="ltr" tabindex="-1" role="dialog" aria-labelledby="edithdlist1" aria-hidden="false" style="width: 500px; height: auto; margin:auto; position:relative; display: block;">
    <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix" id="edithdlist1"><span class="ui-jqdialog-title" style="float: left;">Add New Task</span></div>
    <div class="ui-jqdialog-content ui-widget-content" id="editcntlist1">
      <div>
        <form name="FormPost" id="FrmGrid_list1" class="FormGrid" onSubmit="" style="width:auto;overflow:auto;position:relative;height:auto; padding-top:10px; padding-bottom:15px" action="submitUserTask.php" method="post">
          <table id="TblGrid_list1" class="EditTable" cellspacing="0" cellpadding="0" border="0">
            <tbody>
              <tr>
                <td colspan="2" style="color:#FF0000; text-align:center; padding-bottom:25px">*Required</td>
              </tr>
              <tr id="FormError" style="display:none">
                <td class="ui-state-error" colspan="2"></td>
              </tr>
              <tr style="display:none" class="tinfo">
                <td class="topinfo" colspan="2"></td>
              </tr>
              <tr style="display:none" rowpos="1" class="FormData" id="tr_id">
                <td class="CaptionTD">ID</td>
                <td class="DataTD">&nbsp;
                  <input type="text" id="id" name="id" role="textbox" class="FormElement ui-widget-content ui-corner-all"></td>
              </tr>
              <tr rowpos="3" class="FormData" id="tr_priority">
                <td class="CaptionTD"><span class="required">*</span> KPI</td>
                <td class="DataTD">&nbsp;
                  <select role="select" id="priority" name="priority" size="1" class="FormElement ui-widget-content ui-corner-all">
                    <option role="option" value=""></option>
                    <option role="option" value="KPI 1">KPI 1 (Critical Systems)</option>
                    <option role="option" value="KPI 2">KPI 2 (Non-Critical Systems)</option>
                    <option role="option" value="KPI 3">KPI 3 (End-Users Requests)</option>
                  </select></td>
              </tr>
              <tr rowpos="4" class="FormData" id="tr_initiated_date">
                <td class="CaptionTD"><span class="required">&nbsp;&nbsp;&nbsp;</span>Initiated Date</td>
                <td class="DataTD">&nbsp;
                  <input type="text" id="initiated_date" name="initiated_date" role="textbox" class="FormElement ui-widget-content ui-corner-all hasDatepicker"></td>
              </tr>
              <tr rowpos="9" class="FormData" id="tr_customer">
                <td class="CaptionTD"><span class="required">*</span> Customer</td>
                <td class="DataTD">&nbsp;
                  <input type="text" id="customer" name="customer" role="textbox" class="FormElement ui-widget-content ui-corner-all"></td>
              </tr>
              <tr rowpos="10" class="FormData" id="tr_department">
                <td class="CaptionTD"><span class="required">*</span> Department</td>
                <td class="DataTD">&nbsp;
                  <select role="select" id="department" name="department" size="1" class="FormElement ui-widget-content ui-corner-all">
                    <option role="option" value=""></option>
                    <option role="option" value="General Director`s Office">General Director`s Office</option>
                    <option role="option" value="Operations CEO Office">Operations CEO Office</option>
                    <option role="option" value="Terminal Operations">Terminal Operations</option>
                    <option role="option" value="Finance">Finance</option>
                    <option role="option" value="ICT">ICT</option>
                    <option role="option" value="Procurement">Procurement</option>
                    <option role="option" value="Administration">Administration</option>
                    <option role="option" value="Human Resources">Human Resources</option>
                    <option role="option" value="Legal Affairs">Legal Affairs</option>
                    <option role="option" value="Public Relations">Public Relations</option>
                    <option role="option" value="Quality Management">Quality Management</option>
                    <option role="option" value="Ramp Operations">Ramp Operations</option>
                    <option role="option" value="Passenger Service">Passenger Service</option>
                    <option role="option" value="Cargo">Cargo</option>
                    <option role="option" value="Lost &amp; Found">Lost &amp; Found</option>
                    <option role="option" value="Operations Center">Operations Center</option>
                    <option role="option" value="VIP">VIP</option>
                    <option role="option" value="Car Park">Car Park</option>
                    <option role="option" value="CIP">CIP</option>
                    <option role="option" value="Terminal Coordination">Terminal Coordination</option>
                    <option role="option" value="AOMD">AOMD</option>
                    <option role="option" value="Medical">Medical</option>
                    <option role="option" value="Airfield Maintenance">Airfield Maintenance</option>
                    <option role="option" value="Planning &amp; Development">Planning &amp; Development</option>
                    <option role="option" value="Security &amp; Screening">Security &amp; Screening</option>
                    <option role="option" value="AGL">AGL</option>
                    <option role="option" value="Building Maintenance">Building Maintenance</option>
                    <option role="option" value="RFFS">RFFS</option>
                    <option role="option" value="Wild Life">Wild Life</option>
                    <option role="option" value="Cleaning">Cleaning</option>
                    <option role="option" value="Mechanical Maintenance">Mechanical Maintenance</option>
                    <option role="option" value="Schedule Facilitator">Schedule Facilitator</option>
                    <option role="option" value="Other">Other</option>
                  </select></td>
              </tr>
              <tr rowpos="11" class="FormData" id="tr_telephone">
                <td class="CaptionTD"><span class="required">*</span> Telephone</td>
                <td class="DataTD">&nbsp;
                  <input type="text" id="telephone" name="telephone" role="textbox" class="FormElement ui-widget-content ui-corner-all"></td>
              </tr>
              <tr rowpos="12" class="FormData" id="tr_email">
                <td class="CaptionTD"><span class="required">&nbsp;&nbsp;&nbsp;</span>Email</td>
                <td class="DataTD">&nbsp;
                  <input type="text" id="email" name="email" role="textbox" class="FormElement ui-widget-content ui-corner-all"></td>
              </tr>
              <tr rowpos="13" class="FormData" id="tr_software_service">
                <td class="CaptionTD"><span class="required">*</span> Problem</td>
                <td class="DataTD">&nbsp;
                  <select role="select" id="software_service" name="software_service" size="1" class="FormElement ui-widget-content ui-corner-all">
                    <option role="option" value=""></option>
                    <option role="option" value="Data Backup">Data Backup</option>
                    <option role="option" value="Computer Setup (System | Email Account)">Computer Setup (System | Email Account)</option>
                    <option role="option" value="Operating System (MS Windows XP | 7 | 8)">Operating System (MS Windows XP | 7 | 8)</option>
                    <option role="option" value="Office (MS Office 2007 | 365)">Office (MS Office 2007 | 365)</option>
                    <option role="option" value="Standard Applications-Antivirus | Adobe Reader | Visio Viewer">Standard Applications-Antivirus | Adobe Reader | Visio Viewer</option>
                    <option role="option" value="Oracle">Oracle</option>
                    <option role="option" value="Modules (HR | Inventory | Cargo | Assets | Billing)">Modules (HR | Inventory | Cargo | Assets | Billing)</option>
                    <option role="option" value="Email Password Reset">Email Password Reset</option>
                    <option role="option" value="System Password Reset">System Password Reset</option>
                    <option role="option" value="Network Problem">Network Problem</option>
                    <option role="option" value="CCTV (Camera | Server)">CCTV (Camera | Server)</option>
                    <option role="option" value="Card Access (Server | End-point)">Card Access (Server | End-point)</option>
                    <option role="option" value="Public Announcement System">Public Announcement System</option>
                    <option role="option" value="Master Clock System">Master Clock System</option>
                    <option role="option" value="Computer (Desktop | Laptop)">Computer (Desktop | Laptop)</option>
                    <option role="option" value="Cable (Patch | Power | USB | Other)">Cable (Patch | Power | USB | Other)</option>
                    <option role="option" value="Peripheral (Monitor | Keyboard | Mouse | Other)">Peripheral (Monitor | Keyboard | Mouse | Other)</option>
                    <option role="option" value="Printer | Scanner">Printer | Scanner</option>
                    <option role="option" value="Telephone (Analogue | Digital | IP | Other)">Telephone (Analogue | Digital | IP | Other)</option>
                    <option role="option" value="FIDS (Monitor | Controller | Cable | Other)">FIDS (Monitor | Controller | Cable | Other)</option>
                    <option role="option" value="Check-in Printer (ATB | BTP)">Check-in Printer (ATB | BTP)</option>
                    <option role="option" value="BRS (Barcode Scanner | Software)">BRS (Barcode Scanner | Software)</option>
                    <option role="option" value="Network (Core Switch | Edge Switch | Firewall | Router | Wireless Controller | Access Point)">Network (Core Switch | Edge Switch | Firewall | Router | Wireless Controller | Access Point)</option>
                    <option role="option" value="Cabling (Fiber Optic | CAT6 | CAT3 | Other)">Cabling (Fiber Optic | CAT6 | CAT3 | Other)</option>
                    <option role="option" value="CCTV (Server | Static Camera | Rotational Camera | Other)">CCTV (Server | Static Camera | Rotational Camera | Other)</option>
                    <option role="option" value="Card Access (Server | End-point | Other)">Card Access (Server | End-point | Other)</option>
                    <option role="option" value="Radio (Hand-held | Static | Vehicle)">Radio (Hand-held | Static | Vehicle)</option>
                    <option role="option" value="Public Announcement (Server | Equipment)">Public Announcement (Server | Equipment)</option>
                    <option role="option" value="Master Clock System">Master Clock System</option>
                    <option role="option" value="Other">Other</option>
                  </select></td>
              </tr>
              <tr rowpos="17" class="FormData" id="tr_notes">
                <td class="CaptionTD"><span class="required">&nbsp;&nbsp;&nbsp;</span>Description</td>
                <td class="DataTD">&nbsp;
                  <input type="text" id="notes" name="notes" role="textbox" class="FormElement ui-widget-content ui-corner-all"></td>
              </tr>
              <tr class="FormData" style="display:none">
                <td class="CaptionTD"></td>
                <td colspan="1" class="DataTD"><input class="FormElement" id="id_g" type="text" name="list1_id" value="_empty"></td>
              </tr>
            </tbody>
          </table>
        <table border="0" cellspacing="0" cellpadding="0" class="EditTable" id="TblGrid_list1_2">
          <tbody>
            <tr>
              <td colspan="2"><hr class="ui-widget-content" style="margin:10px"></td>
            </tr>
            <tr id="Act_Buttons">
              <td class="navButton"><a id="pData" class="fm-button ui-state-default ui-corner-left" style="display: none;"><span class="ui-icon ui-icon-triangle-1-w"></span></a><a id="nData" class="fm-button ui-state-default ui-corner-right" style="display: none;"><span class="ui-icon ui-icon-triangle-1-e"></span></a></td>
              <td class="EditButton">
			  	<input type="submit" id="sData" class="fm-button ui-state-default ui-corner-all fm-button-icon-left" style="padding:0; height:40px; width:100px" />
			  </td>
            </tr>
            <tr style="display:none" class="binfo">
              <td class="bottominfo" colspan="2"></td>
            </tr>
          </tbody>
        </table>
        </form>
      </div>
    </div>
  </div>
</div>
<div style="bottom:0; width:100%; height:25px; background:#61A24D; vertical-align:middle; text-align: center; color: white; padding-top:5px; position: fixed;"> &copy 2016 ICT Department - Prishtina International Airport "Adem Jashari" </div>
</body>
</html>
