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

if( $_POST['id2']==NULL ) { $id=0; } else { $id=$_POST['id2']; }
if( $_POST['status2']==NULL ) { $status2=''; } else { $status2=clean($_POST['status2']); }
if( $_POST['company2']==NULL ) { $company2=''; } else { $company2=$_POST['company2']; }
if( $_POST['checkpoint2']==NULL ) { $checkpoint2=''; } else { $checkpoint2=$_POST['checkpoint2']; }
if( $_POST['handed_by2']==NULL ) { $handed_by2=''; } else { $handed_by2=$_POST['handed_by2']; }
if( $_POST['handed_by_exit2']==NULL ) { $handed_by_exit2=''; } else { $handed_by_exit2=$_POST['handed_by_exit2']; }
if( $_POST['verified_by2']==NULL ) { $verified_by2=''; } else { $verified_by2=clean($_POST['verified_by2']); }
if( $_POST['verified_by_exit2']==NULL ) { $verified_by_exit2=''; } else { $verified_by_exit2=clean($_POST['verified_by_exit2']); }
if( $_POST['lista_hyrje2']==NULL ) { $lista_hyrje2=''; } else { $lista_hyrje2=$_POST['lista_hyrje2']; }
if( $_POST['lista_dalje2']==NULL ) { $lista_dalje2=''; } else { $lista_dalje2=$_POST['lista_dalje2']; }
if( $_POST['other2']==NULL ) { $other2=''; } else { $other2=clean($_POST['other2']); }
if( $_POST['other_dalje2']==NULL ) { $other_dalje2=''; } else { $other_dalje2=clean($_POST['other_dalje2']); }
if( $_POST['comment2']==NULL ) { $comment2=''; } else { $comment2=clean($_POST['comment2']); }
if( $_POST['archive2']==NULL ) { $archive2=''; } else { $archive2=clean($_POST['archive2']); }

if( $_POST['status3']==NULL ) { $status3=''; } else { $status3=clean($_POST['status3']); }
if( $_POST['company3']==NULL ) { $company3=''; } else { $company3=$_POST['company3']; }
if( $_POST['checkpoint3']==NULL ) { $checkpoint3=''; } else { $checkpoint3=clean($_POST['checkpoint3']); }
if( $_POST['handed_by3']==NULL ) { $handed_by3=''; } else { $handed_by3=clean($_POST['handed_by3']); }
if( $_POST['handed_by_exit3']==NULL ) { $handed_by_exit3=''; } else { $handed_by_exit3=clean($_POST['handed_by_exit3']); }
if( $_POST['verified_by3']==NULL ) { $verified_by3=''; } else { $verified_by3=clean($_POST['verified_by3']); }
if( $_POST['verified_by_exit3']==NULL ) { $verified_by_exit3=''; } else { $verified_by_exit3=clean($_POST['verified_by_exit3']); }
if( isset($_POST['lista_hyrje3']) ) { $lista_hyrje3 = implode(',', $_POST['lista_hyrje3']);} else { $lista_hyrje3=''; }
if( isset($_POST['lista_dalje3']) ) { $lista_dalje3 = implode(',', $_POST['lista_dalje3']);} else { $lista_dalje3=''; }
if( $_POST['other3']==NULL ) { $other3=''; } else { $other3=clean($_POST['other3']); }
if( $_POST['other_dalje3']==NULL ) { $other_dalje3=''; } else { $other_dalje3=clean($_POST['other_dalje3']); }
if( $_POST['comment3']==NULL ) { $comment3=''; } else { $comment3=clean($_POST['comment3']); }
if( $_POST['archive3']==NULL ) { $archive3=''; } else { $archive3=clean($_POST['archive3']); }


if($lista_hyrje3 == $lista_dalje3 AND $other3 == $other_dalje3)
{
        $status3='Dalje/Exit';
}
else
{
        $status3='Hyrje/Enter';
}

$query="UPDATE shenimet_table SET
          status='$status3',
          company='$company3',
					checkpoint='$checkpoint3',
					handed_by='$handed_by3',
					handed_by_exit='$handed_by_exit3',
					verified_by='$verified_by3',
					verified_by_exit='$verified_by_exit3',
					lista='$lista_hyrje3',
          lista_dalje='$lista_dalje3',
          other='$other3',
          other_dalje='$other_dalje3',
          comment='$comment3',
          archive='$archive3'
          WHERE id=$id";


if (!mysqli_query($db, $query))
{
	echo("Error description: " . mysqli_error($db) . $query);
	exit();
}
else
{
	$ip = $_SERVER['REMOTE_ADDR'];

	$data = "ID=$id2, Status=$status3, Company=$company3, Checkpoint=$checkpoint3, Handed over on enter by=$handed_by3, Handed over on exit by=$handed_by_exit3, Verified on enter by=$verified_by3, Verified on exit by=$verified_by_exit3, Working Tools List Entrance=$lista_hyrje3, Working Tools List Exit=$lista_dalje3, Other Entrance=$other3, Other Exit=$other_dalje3, Comment=$comment3, Archive=$archive3";

	$data_before = '';
  	if($status3!=$status2)
    		$data_before .= "* Status=$status2*";
	if($company3!=$company2)
		$data_before .= "* Company=$company2*";
	if($checkpoint3!=$checkpoint2)
		$data_before .= "* Checkpoint=$checkpoint2*";
	if($handed_by3!=$handed_by2)
		$data_before .= "* Handed over on enter by=$handed_by2*";
	if($handed_by_exit3!=$handed_by_exit2)
		$data_before .= "* Handed over on exit by=$handed_by_exit2*";
	if($verified_by3!=$verified_by2)
		$data_before .= "* Verified on enter by=$verified_by2*";
	if($verified_by_exit3!=$verified_by_exit2)
		$data_before .= "* Verified on exit by=$verified_by_exit2*";
    	if($lista_hyrje3!=$lista_hyrje2)
      		$data_before .= "* Working Tools Entrance=$lista_hyrje2*";
	if($lista_dalje3!=$lista_dalje2)
		$data_before .= "* Working Tools List Exit=$lista_dalje2*";
  	if($other3!=$other2)
  		$data_before .= "*Other Entrance=$other2*";
  	if($other_dalje3!=$other_dalje2)
  		$data_before .= "*Other Exit=$other_dalje2*";
  	if($comment3!=$comment2)
    		$data_before .= "*Comment=$comment2*";
    if($archive3!=$archive2)
        $data_before .= "*Archive=$archive2*";

      $query = "INSERT INTO logs VALUES (NULL, CURRENT_TIMESTAMP, '$ip', '$user', 'Screening Reports', 'Edit', '$data', '$data_before')";
      mysqli_query($db,$query);
      $db->close();

      header('location: ' . $_SERVER['HTTP_REFERER']);
}

?>
