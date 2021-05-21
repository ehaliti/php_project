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
$col["title"] = "";
$col["name"] = "action";
$col["width"] = "30";
$col["export"] = false;
$col["search"] = false;
$col["fixed"] = true;
$col["default"] = '<a href="javascript:void(0);" onclick="editDialog(this); ">Edit</a>';
$cols[] = $col;

$col = array();
$col["title"] = "ID";
$col["name"] = "id";
$col["width"] = "10";
$col["hidden"] = false;
$col["resizable"] = false;
$col["search"] = true; // this column is not searchable
$col["editable"] = false; // this column is editable
$cols[] = $col;


$col = array();
$col["title"] = "Date&Time";
$col["name"] = "date_time";
$col["width"] = "22";
$col["align"] = "center";
$col["resizable"] = false;
$col["search"] = true;
$col["editable"] = true;
$cols[] = $col;


$col = array();
$col["title"] = "Status";
$col["name"] = "status";
$col["width"] = "18";
$col["align"] = "center";
$col["resizable"] = false;
$col["stype"] = "select";
$col["edittype"] = "select";
$col["editrules"] = array("required"=>true, "edithidden"=>false);
$col["editoptions"] = array("value"=>':;Hyrje/Enter:Hyrje/Enter;Dalje/Exit:Dalje/Exit');
$col["search"] = true; // this column is not searchable
$col["editable"] = true; // this column is editable
$cols[] = $col;

$f = array();
$f["column"] = "status";
$f["op"] = "eq";
$f["value"] = "Hyrje/Enter";
$f["css"] = "'background-color':'#E46F6F'";
$f_conditions[] = $f;

//text field
$col = array();
$col["title"] = "Company";
$col["name"] = "company";
$col["width"] = "20";
$col["align"] = "center";
$col["editrules"] = array("required"=>true, "edithidden"=>false);
$col["resizable"] = false;
$col["search"] = true; // this column is not searchable
$col["editable"] = true; // this column is editable
$cols[] = $col;

$col = array();
$col["title"] = "Checkpoint";
$col["name"] = "checkpoint";
$col["width"] = "20";
$col["align"] = "center";
$col["editrules"] = array("required"=>true, "edithidden"=>false);
$col["resizable"] = false;
$col["search"] = true; // this column is not searchable
$col["editable"] = true; // this column is editable
$cols[] = $col;

$col = array();
$col["title"] = "Handed over on enter by";
$col["name"] = "handed_by";
$col["width"] = "37";
$col["align"] = "center";
$col["editrules"] = array("required"=>true, "edithidden"=>false);
$col["resizable"] = false;
$col["search"] = true; // this column is not searchable
$col["editable"] = true; // this column is editable
$cols[] = $col;


$col = array();
$col["title"] = "Verified on enter by";
$col["name"] = "verified_by";
$col["width"] = "32";
$col["align"] = "center";
$col["editrules"] = array("required"=>true, "edithidden"=>false);
$col["resizable"] = false;
$col["search"] = true; // this column is not searchable
$col["editable"] = true; // this column is editable
$cols[] = $col;

$col = array();
$col["title"] = "Handed over on exit by";
$col["name"] = "handed_by_exit";
$col["width"] = "37";
$col["align"] = "center";
$col["editrules"] = array("required"=>true, "edithidden"=>false);
$col["resizable"] = false;
$col["search"] = true; // this column is not searchable
$col["editable"] = true; // this column is editable
$cols[] = $col;

$col = array();
$col["title"] = "Verified on exit by";
$col["name"] = "verified_by_exit";
$col["width"] = "32";
$col["align"] = "center";
$col["editrules"] = array("required"=>true, "edithidden"=>false);
$col["resizable"] = false;
$col["search"] = true; // this column is not searchable
$col["editable"] = true; // this column is editable
$cols[] = $col;

$col = array();
$col["title"] = "Working Tools List Entrance";
$col["name"] = "lista";
$col["width"] = "100";
$col["align"] = "center";
$col["editrules"] = array("required"=>false, "edithidden"=>true);
$col["resizable"] = false;
//$col["multiselect"] = true;
$col["search"] = true; // this column is not searchable
$col["editable"] = true; // this column is editable
$cols[] = $col;

$col = array();
$col["title"] = "Working Tools List Exit";
$col["name"] = "lista_dalje";
$col["width"] = "100";
$col["align"] = "center";
$col["editrules"] = array("required"=>false, "edithidden"=>true);
$col["resizable"] = false;
//$col["multiselect"] = true;
$col["search"] = true; // this column is not searchable
$col["editable"] = true; // this column is editable
$cols[] = $col;


$col = array();
$col["title"] = "Other Entrance";
$col["name"] = "other";
$col["width"] = "25";
$col["align"] = "center";
$col["editrules"] = array("required"=>flase, "edithidden"=>true);
$col["resizable"] = false;
$col["search"] = true; // this column is not searchable
$col["editable"] = true; // this column is editable
$cols[] = $col;

$col = array();
$col["title"] = "Other Exit";
$col["name"] = "other_dalje";
$col["width"] = "25";
$col["align"] = "center";
$col["editrules"] = array("required"=>flase, "edithidden"=>true);
$col["resizable"] = false;
$col["search"] = true; // this column is not searchable
$col["editable"] = true; // this column is editable
$cols[] = $col;

$col = array();
$col["title"] = "Comment";
$col["name"] = "comment";
$col["width"] = "20";
$col["align"] = "center";
$col["editrules"] = array("required"=>flase, "edithidden"=>true);
$col["resizable"] = false;
$col["search"] = true; // this column is not searchable
$col["editable"] = true; // this column is editable
$cols[] = $col;


$grid["add_options"]["success_msg"] = "Post added";
$grid["add_options"]["beforeInitData"] = "function(formid) { $('#list1').jqGrid('setColProp','time',{hidden:false});
$('#list1').jqGrid('setColProp','proficiency',{hidden:false}); }";
$grid["add_options"]["afterShowForm"] = "function(formid) { $('#list1').jqGrid('setColProp','time',{hidden:false});$('#list1').jqGrid('setColProp','proficiency',{hidden:false}); }";

// export PDF file params
$grid["export"] = array("filename"=>"Working_Tools_Reports_".date("dmYHi"), "heading"=>"LIMAK KOSOVO INTERNATIONAL AIRPORT J.S.C.<br>Security and Screening Unit<br><br>Screening - Report  ".date("d.m.Y H:i"), "orientation"=>"landscape", "paper"=>"a2");

// for excel, sheet header
$grid["export"]["sheetname"] = "Working_Tools_Reports";

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
						"add_maintenance" => false
					)
				);

				$g->select_command = "SELECT * FROM shenimet_table WHERE archive = 0";
				$g->table = "shenimet_table";
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
	<script type="text/javascript" src="editr.js"></script>
  <script type="text/javascript" src="addr.js"></script>

	<script type="text/javascript">
	function onload()
	{
		$("#addDialog").load("addr.html");
		$("#editDialog").load("editr.html");
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
	<title>Screening Reports</title>
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
																								<li style="border-top:1px solid #D4D4D4; border-left:1px solid #D4D4D4; border-right:1px solid #D4D4D4;"> <a href='../reports/reports.php' style='background-color:#0e5d0e;'>Screening Reports

																								</a></li>
																								<li style="border-top:1px solid #D4D4D4; border-left:1px solid #D4D4D4; border-right:1px solid #D4D4D4;"> <a href='../reports/reports_arc.php' style='background-color:#0e5d0e;'>Archive

																								</a></li>
																						</ul>
																				</div></td>
																		<td width="30%" align="right"><div class="drop" style="float:right">
																						<ul class="drop_menu dm_tasks">
																								<li> <a href='logs.php' style='background-color:#0e5d0e;'>Logs</a> </li>
																						</ul>
																				</div></td>
														   	</tr>
														</table></td>
										</tr>
								</table></td>
				</tr>
		</table>
</div>

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



<div id="addDialog" style='display:none'></div>
<div id="editDialog" style='display:none'></div>

<div id="dialog" style='display:none'>
		<form action='pdf.php' method='post' id='pdfForm'>
		<input type='hidden' name='id' id='id'/>
		<table style="font-size:14px;">
			<tr>
				<td style="text-align:left; height:25px;">Data&Koha/Date&Time:</td>
				<td><input type='text' name='date_time' id='date_time' readonly/></td>
			</tr>
			<tr>
				<td style="text-align:left; height:25px;">Statusi/Status:</td>
				<td><input type='text' name='status' id='status' readonly/></td>
			</tr>
			<tr>
				<td style="text-align:left; height:25px;">Kompania/Company:</td>
				<td><input type='text' name='company' id='company' readonly/></td>
			</tr>
			<tr>
				<td style="text-align:left; height:25px;">Pikekontrolli/Checkpoint:</td>
				<td><input type='text' name='checkpoint' id='checkpoint' readonly/></td>
			</tr>
			<tr>
				<td style="text-align:left; height:25px;">Dorezuar ne hyrje nga/Handed over on enter by:</td>
				<td><input type='text' name='handed_by' id='handed_by' readonly/></td>
			</tr>
<tr>
				<td style="text-align:left; height:25px;">Verifikuar ne hyrje nga/Verified on enter by:</td>
				<td><input type='text' name='verified_by' id='verified_by' readonly/></td>
			</tr>
			<tr>
				<td style="text-align:left; height:25px;">Dorezuar ne dalje nga/Handed over on exit by:</td>
				<td><input type='text' name='handed_by_exit' id='handed_by_exit' readonly/></td>
			</tr>
			
			<tr>
				<td style="text-align:left; height:25px;">Verifikuar ne dalje nga/Verified on exit by:</td>
				<td><input type='text' name='verified_by_exit' id='verified_by_exit' readonly/></td>
			</tr>
			<tr>
				<td style="text-align:left; height:25px;">Lista e Veglave te Punes Hyrje/Working Tools List Entrance:</td>
				<td><input type='text' name='lista_hyrje' id='lista_hyrje' readonly/></td>
			</tr>
			<tr>
				<td style="text-align:left; height:25px;">Lista e Veglave te Punes Dalje/Working Tools List Exit:</td>
				<td><input type='text' name='lista_dalje' id='lista_dalje' readonly/></td>
			</tr>
			<tr>
				<td style="text-align:left; height:25px;">Te Tjera Ne Hyrje/Other Entrance:</td>
				<td><input type='text' name='other' id='other' readonly/></td>
			</tr>
			<tr>
				<td style="text-align:left; height:25px;">Te Tjera Ne Dalje/Other Exit:</td>
				<td><input type='text' name='other_dalje' id='other_dalje' readonly/></td>
			</tr>
			<tr>
				<td style="text-align:left; height:25px;">Koment/Comment:</td>
				<td><input type='text' name='comment' id='comment' readonly/></td>
			</tr>
		</table>
	</form>
</div>

</body>
</html>
<?php }

else
header("location: ../index.php");
?>
