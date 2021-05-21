<?php

// include db config
session_start();
$useri = $_SESSION['username'];
include("../config.php");
if(isset($_SESSION['username']))
{

// set up DB
mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
mysql_select_db(DB_DATABASE);

// include and create object
include("../lib/inc/jqgrid_dist.php");
$g = new jqgrid();


$col = array();
$col["title"] = "Action";
$col["name"] = "act";
$col["width"] = "75";
$col["fixed"] = true;
$col["hidden"] = true;
$col["export"] = false;
$cols[] = $col;


$col = array();
$col["title"] = "ID";
$col["name"] = "id";
$col["width"] = "4";
$col["hidden"] = false;
$col["resizable"] = false;
$col["search"] = true; // this column is not searchable
$col["editable"] = false; // this column is editable
$cols[] = $col;


$col = array();
$col["title"] = "Date&Time";
$col["name"] = "date_time";
$col["width"] = "10";
$col["formatter"] = "servertime";
$col["formatoptions"] = array("srcformat"=>'Y-m-d',"newformat"=>'d-M-Y');
$col["resizable"] = false;
$col["editable"] = false;
$col["align"] = "center";
$col["editrules"] = array("required"=>true, "edithidden"=>false);
$col["search"] = true;
$cols[] = $col;


//text field
$col = array();
$col["title"] = "IP";
$col["name"] = "ip";
$col["width"] = "10";
$col["align"] = "center";
$col["editrules"] = array("required"=>true, "edithidden"=>false);
$col["resizable"] = false;
$col["search"] = true; // this column is not searchable
$col["editable"] = true; // this column is editable
$cols[] = $col;

$col = array();
$col["title"] = "User";
$col["name"] = "user";
$col["width"] = "10";
$col["align"] = "center";
$col["editrules"] = array("required"=>true, "edithidden"=>false);
$col["resizable"] = false;
$col["search"] = true; // this column is not searchable
$col["editable"] = true; // this column is editable
$cols[] = $col;

$col = array();
$col["title"] = "Direction";
$col["name"] = "dir";
$col["width"] = "12";
$col["align"] = "center";
$col["editrules"] = array("required"=>true, "edithidden"=>false);
$col["resizable"] = false;
$col["search"] = true; // this column is not searchable
$col["editable"] = true; // this column is editable
$cols[] = $col;


$col = array();
$col["title"] = "Action";
$col["name"] = "action";
$col["width"] = "6";
$col["align"] = "center";
$col["editrules"] = array("required"=>true, "edithidden"=>false);
$col["resizable"] = false;
$col["search"] = true; // this column is not searchable
$col["editable"] = true; // this column is editable
$cols[] = $col;


$col = array();
$col["title"] = "Data";
$col["name"] = "data";
$col["width"] = "65";
$col["align"] = "center";
$col["editrules"] = array("required"=>true, "edithidden"=>false);
$col["resizable"] = false;
$col["search"] = true; // this column is not searchable
$col["editable"] = true; // this column is editable
$cols[] = $col;

$col = array();
$col["title"] = "Edited";
$col["name"] = "edited";
$col["width"] = "25";
$col["align"] = "center";
$col["editrules"] = array("required"=>false, "edithidden"=>true);
$col["resizable"] = false;
$col["search"] = true; // this column is not searchable
$col["editable"] = true; // this column is editable
$cols[] = $col;


$grid["add_options"]["success_msg"] = "Post added";
$grid["add_options"]["beforeInitData"] = "function(formid) { $('#list1').jqGrid('setColProp','time',{hidden:false});
$('#list1').jqGrid('setColProp','proficiency',{hidden:false}); }";
$grid["add_options"]["afterShowForm"] = "function(formid) { $('#list1').jqGrid('setColProp','time',{hidden:false});$('#list1').jqGrid('setColProp','proficiency',{hidden:false}); }";

// export PDF file params
$grid["export"] = array("filename"=>"Reports_".date("dmYHi"), "heading"=>"LIMAK KOSOVO INTERNATIONAL AIRPORT J.S.C.<br>Screening Unit<br><br>Projects - Report  ".date("d.m.Y H:i"), "orientation"=>"landscape", "paper"=>"a2");

// for excel, sheet header
$grid["export"]["sheetname"] = "Screening_Report";

// export filtered data or all data
$grid["export"]["range"] = "filtered"; // or "all"
// RTL support
$grid["direction"] = "ltr";

$grid["sortname"] = 'id'; // by default sort grid by this field
$grid["sortorder"] = "desc"; // ASC or DESC
$grid["rowNum"] = 50; // by default 20
$grid["rowList"] = array(50,100,250,500,1000,1500);
$grid["autowidth"] = true; // expand grid to screen width
$grid["multiselect"] = false; // allow you to multi-select through checkboxes
$grid["altRows"] = true;
$grid["rownumbers"] = false;
$grid["rownumWidth"] = 30;
$grid["height"] = "100%";
$grid["autoresize"] = true;
$grid["resizable"] = false; // defaults to false
$grid["altclass"] = "myAltRowClass";
$grid["rowactions"] = true; // allow you to multi-select through checkboxes
$grid["add_options"] = array('width'=>'350','top'=>'10','left'=>'450');

$grid["search"] = true;
$grid["postData"] = array("filters" => $sarr );

$grid["add_options"]["beforeInitData"] = "function(formid)
{
	$('#list1').jqGrid('setColProp','last_modified',{hidden:true});
}";

$g->set_options($grid);
$g->set_conditional_css($f_conditions);
$g->set_actions(array(
						"add"=>false, // allow/disallow add
						"edit"=>true, // allow/disallow edit
						"delete"=>false, // allow/disallow delete
						"rowactions"=>$rowactionFlag, // show/hide row wise edit/del/save option
						"export_excel"=>true, // show/hide export to excel option - must set export xlsx params
						"export_pdf"=>true, // show/hide export to pdf option - must set pdf params
                        "export_csv"=>false, // export excel button
						"autofilter" => true, // show/hide autofilter for search
						"bulkedit"=>true,
                        "view"=>true,
                        "export"=>false,
                        "inlineadd" => false,
                        "showhidecolumns" => false,
                        "search"=>"advance",
						"handover"=>false,
						"spare"=>false,
						"add_new" => false,
						"add_reports" => false
					)
				);

				$g->select_command = "SELECT * FROM logs";
				$g->table = "logs";
				$g->set_columns($cols);

$assets = $g->render("list1");


?>
<?php include("../notification.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html><head>
	<link rel="stylesheet" type="text/css" media="screen" href="../lib/js/themes/petriti/jquery-ui.css"></link>
	<link rel="stylesheet" type="text/css" media="screen" href="../lib/js/jqgrid/css/ui.jqgrid.css"></link>
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

		timer_function();

	}
	</script>

	<script type="text/javascript">
		function AjaxFunction()
		{
			var httpxml;
			try
		  	{
		  	// Firefox, Opera 8.0+, Safari
		  	httpxml=new XMLHttpRequest();
			}
			catch (e)
		  	{
		  	// Internet Explorer
				try
				{
				 	httpxml=new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch (e)
				{
					try
					{
						httpxml=new ActiveXObject("Microsoft.XMLHTTP");
					}
					catch (e)
					{
						alert("Your browser does not support AJAX!");
						return false;
					}
				}
		  	}

			function stateck()
			{
				if(httpxml.readyState==4)
				{
					try
					{
						document.getElementById("servertime").innerHTML = httpxml.responseText;
					}
					catch (e)
					{
						return false;
					}
				}
			}

			var url = "../server-clock.php";
			url = url + "?sid="+Math.random();
			httpxml.onreadystatechange = stateck;
			httpxml.open("GET",url,true);
			httpxml.send(null);
			tt = timer_function();
		  }

		function timer_function()
		{
			$("#edit_list1").remove();
			$("#search_list1").remove();
			var refresh = 1000;
			mytime = setTimeout('AjaxFunction();', refresh);
		}
	</script>

	<style>
		.myAltRowClass { background-color: #ecedf1; background-image: none; }
		form {background:#FFFFFF;}
		#list1 tbody tr td {vertical-align: middle;}
		#TblGrid_list1 select {width:150px;}
		#TblGrid_list1 input {width:140px;}
		.ui-jqgrid tr.jqgrow td {
									white-space: normal !important;
									padding:2px 5px;}
	</style>

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link href="../style.css" rel="stylesheet" type="text/css" />
	<title>Security Logs</title>
</head>
<body onload=onload();>
<div style="background:url('../images/tasks.png') no-repeat center center; background-size: cover;" width="100%" border="0" cellpadding="0" cellspacing="0" >
    <table width="100%" id="header">
        <tr>
            <td width="20%"><img src="../images/logo.png" width="250" height="65" align="middle" style="padding-left:10px"/></td>
        <td width="50%" align="center"><div class="titllinalt" style="font-size: 19px">PROHIBITED ARTICLES/ARTIKUJT E NDALUAR<br>Working Tools/Veglat e Punes<br /><br /> <span style="font-size:20px">Security and Screening Unit</span> </div></td>
		<td width="20%" align="right" style="padding:10px">
			<span class="contnormal"><?php echo $useri;?></span> <img src="../images/user.png" height="13" width="13" style="padding-left:3px"/> <br />
			<a href='../password.php'>Change Password</a> <img src="../images/lock.png" height="13" width="13" style="padding-left:3px"/> <br />
			<a href='../logout.php'>Logout</a> <img src="../images/logout.png" height="13" width="13" style="padding-left:3px"/> <br />
			<br />
		</td>
      </tr>
    </table>
		<table width="100%" height="40" border="0" cellpadding="0" cellspacing="0">
				<tr>
						<td height="35"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
										<tr>
												<td width="711" align="center" valign="middle"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
																<tr>
																		<td width="70%" align="right"><div class="drop" style="float:left">
																						<ul class="drop_menu dm_tasks">
																								<li> <a href='../reports/reports.php' style='background-color:#0e5d0e;'>Security Reports

																								</a></li>
																						</ul>
																				</div></td>
																		<td width="30%" align="right"><div class="drop" style="float:right">
																						<ul class="drop_menu dm_tasks">
																								<li style="border-top:1px solid #D4D4D4; border-left:1px solid #D4D4D4; border-right:1px solid #D4D4D4;"> <a href='logs.php' style='background-color:#0e5d0e;'>Logs</a> </li>
																						</ul>
																				</div></td>
																</tr>
														</table></td>
										</tr>
								</table></td>
				</tr>
		</table>
</div>
<div style="width:100%; height:10px; background:#0e5d0e; vertical-align:middle; border-top:1px solid #D4D4D4;"></div>
		<div>
			<?php echo $assets; ?>
  		</div>
<div style="width:100%; height:10px; background:#0e5d0e; vertical-align:middle; border-bottom:1px solid white;"></div>

<div style="width:100%; height:25px; background:#61A24D;"> </div>
<div style="bottom:0; width:100%; height:25px; background:#61A24D; vertical-align:middle; text-align: left; color: white; padding-top:5px"> &nbsp; &copy; 2019 Security and Screening Unit - Prishtina International Airport "Adem Jashari"
			<span class="contb" id='servertime' style="color:white; float:right"></span>
</div>

</body>
</html>
<?php }

else
header("location: ../index.php");
?>
