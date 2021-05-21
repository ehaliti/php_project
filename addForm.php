
<?php

session_start();
$user = $_SESSION['username'];
include '../config.php';

function clean($string)
{
   $string = str_replace("'", '', $string);
   $string = str_replace('"', '', $string);
   $string = str_replace('`', '', $string);
   $string = str_replace(',', '', $string);
   return $string;
}

$id=$_POST['id'];
if( $_POST['status1']==NULL ) { $status1=''; } else { $status1=$_POST['status1']; }
if( $_POST['company1']==NULL ) { $company1=''; } else { $company1=$_POST['company1']; }
if( $_POST['checkpoint1']==NULL ) { $checkpoint1=''; } else { $checkpoint1=$_POST['checkpoint1']; }
if( $_POST['handed_by1']==NULL ) { $handed_by1=''; } else { $handed_by1=$_POST['handed_by1']; }
if( $_POST['handed_by_exit1']==NULL ) { $handed_by_exit1=''; } else { $handed_by_exit1=$_POST['handed_by_exit1']; }
if( $_POST['verified_by1']==NULL ) { $verified_by1=''; } else { $verified_by1=clean($_POST['verified_by1']); }
if( $_POST['verified_by_exit1']==NULL ) { $verified_by_exit1=''; } else { $verified_by_exit1=clean($_POST['verified_by_exit1']); }
if( isset($_POST['lista_hyrje1']) ) { $lista_hyrje1 = implode(',', $_POST['lista_hyrje1']);} else { $lista_hyrje1=''; }
if( isset($_POST['lista_dalje1']) ) { $lista_dalje1 = implode(',', $_POST['lista_dalje1']);} else { $lista_dalje1=''; }
if( $_POST['other1']==NULL ) { $other1=''; } else { $other1=clean($_POST['other1']); }
if( $_POST['other_dalje1']==NULL ) { $other_dalje1=''; } else { $other_dalje1=clean($_POST['other_dalje1']); }
if( $_POST['comment1']==NULL ) { $comment1=''; } else { $comment1=clean($_POST['comment1']); }


$query="INSERT INTO shenimet_table VALUES (NULL,CURRENT_TIMESTAMP, '$status1', '$company1', '$checkpoint1', '$handed_by1', '', '$verified_by1', '', '$lista_hyrje1', '', '$other1', '', '$comment1', '0')";

if (!mysqli_query($db, $query))
{
	echo("Error description: " . mysqli_error($db) . $query);
	exit();
}
else
{
	$ip = $_SERVER['REMOTE_ADDR'];
	$id = mysqli_insert_id($db);

	$data = "ID=$id,  Status=$status1, Company=$company1, Checkpoint=$checkpoint1, Handed over on enter by=$handed_by1, Handed over on exit by=$handed_by_exit1, Verified on enter by=$verified_by1, Verified on exit by=$verified_by_exit1, Working Tools List Entrance=$lista_hyrje1, Working Tools List Exit=$lista_dalje1, Other Entrance=$other1, Other Exit=$other_exit1, Comment=$comment1";

	$query = "INSERT INTO logs VALUES (NULL, CURRENT_TIMESTAMP, '$ip', '$user', 'Screening Reports', 'Add', '$data', '')";
	mysqli_query($db,$query);

	$db->close();

	header('location: ' . $_SERVER['HTTP_REFERER']);
}
?>
