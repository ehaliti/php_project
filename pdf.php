<?php

include_once("../config.php");
require( '../fpdf/fpdf.php' );

class myFPDF extends fpdf{

function Footer()
{

  session_start();
  $user = $_SESSION['username'];

$this->Image('../images/logo_blue.png',10,8,60);
$this->SetFont('times','B',12);
$this->Cell(130,8,"LISTA E VEGLAVE TE PUNES",0,1,"R");
$this->Cell(130,8,"LIST OF WORKING TOOLS",0,1,"R");

$this->SetFont('times','',11);


$this->setXY(13,35);
$this->Cell(100,9,"EMRI I KOMPANISE/COMPANY NAME:",0,0,"L");
$this->Cell(84,9,$_POST['company']==""?"":$_POST['company'],0,1);

$this->setXY(13,45);
$this->Cell(100,9,"DATA/DATE:",0,0,"L");
$this->Cell(84,9,$_POST['date_time']==""?"":$_POST['date_time'],0,1);

$this->setXY(13,55);
$this->Cell(100,9,"PERSONI PERGJEGJES/RESPONSIBLE PERSON:",0,0,"L");
$this->Cell(84,9,$_POST['handed_by']==""?"":$_POST['handed_by'],0,1);

$this->setXY(13,65);
$this->Cell(100,9,"PIKEKONTROLLI/CHECKPOINT:",0,0,"L");
$this->Cell(84,9,$_POST['checkpoint']==""?"":$_POST['checkpoint'],0,1);

$this->Line(10,77,200,77);
$this->Line(105,80,105,233);

$this->SetFont('times','B',10);
$this->setXY(13,80);
$this->Cell(100,9,"STATUSI/STATUS:",0,1,"L");
$this->SetFont('times','',11);
$this->setXY(15,86);
$this->Cell(100,9,"Hyrje/Enter:",0,1,"L");

$this->SetFont('times','B',10);
$this->setXY(113,80);
$this->Cell(100,9,"STATUSI/STATUS:",0,1,"L");
$this->SetFont('times','',11);
$this->setXY(115,86);
$this->Cell(100,9,"Dalje/Exit:",0,1,"L");


$this->SetFont('times','B',9);
$this->setXY(13,96);
$this->Cell(50,9,"LISTA E VEGLAVE TE PUNES/LIST OF WORKING TOOLS:",0,1);

$this->SetFont('times','',11);
$pizza  = $_POST['lista_hyrje'];
$pieces = explode(",", $pizza);
$this->setXY(15,103);
if(!empty($pieces[0]))
{
  $this->Cell(40,9,$pieces[0]==""?"":$pieces[0],0,1);
{
   $this->setXY(15,110);
   if(!empty($pieces[1]))
      $this->Cell(40,9,$pieces[1]==""?"":$pieces[1],0,1);
      {
        $this->setXY(15,117);
        if(!empty($pieces[2]))
            $this->Cell(40,9,$pieces[2]==""?"":$pieces[2],0,1);
              {
                $this->setXY(15,124);
                if(!empty($pieces[3]))
                  $this->Cell(40,9,$pieces[3]==""?"":$pieces[3],0,1);
                  {
                      $this->setXY(15,131);
                      if(!empty($pieces[4]))
                        $this->Cell(40,9,$pieces[4]==""?"":$pieces[4],0,1);
                        {
                        $this->setXY(15,138);
                        if(!empty($pieces[5]))
                          $this->Cell(40,9,$pieces[5]==""?"":$pieces[5],0,1);
                          {
                          $this->setXY(15,145);
                          if(!empty($pieces[6]))
                            $this->Cell(40,9,$pieces[6]==""?"":$pieces[6],0,1);
                            {
                            $this->setXY(15,152);
                            if(!empty($pieces[7]))
                              $this->Cell(40,9,$pieces[7]==""?"":$pieces[7],0,1);
                              {
                              $this->setXY(15,159);
                              if(!empty($pieces[8]))
                                  $this->Cell(40,9,$pieces[8]==""?"":$pieces[8],0,1);
                                  {
                                  $this->setXY(15,166);
                                  if(!empty($pieces[9]))
                                    $this->Cell(40,9,$pieces[9]==""?"":$pieces[9],0,1);
                                    {
                                    $this->setXY(15,173);
                                    if(!empty($pieces[10]))
                                        $this->Cell(40,9,$pieces[10]==""?"":$pieces[10],0,1);
                                        {
                                        $this->setXY(15,180);
                                        if(!empty($pieces[11]))
                                          $this->Cell(40,9,$pieces[11]==""?"":$pieces[11],0,1);
                                          {
                                          $this->setXY(15,187);
                                          if(!empty($pieces[12]))
                                            $this->Cell(40,9,$pieces[12]==""?"":$pieces[12],0,1);

                                          }}}}}}}}}}}}}


$this->SetFont('times','B',9);
$this->setXY(113,96);
$this->Cell(50,9,"LISTA E VEGLAVE TE PUNES/LIST OF WORKING TOOLS:",0,1,"L");

$this->SetFont('times','',11);
$lena  = $_POST['lista_dalje'];
$en = explode(",", $lena);
$this->setXY(115,103);
if(!empty($en[0]))
{
  $this->Cell(40,9,$en[0]==""?"":$en[0],0,1);
{
   $this->setXY(115,110);
   if(!empty($en[1]))
      $this->Cell(40,9,$en[1]==""?"":$en[1],0,1);
      {
        $this->setXY(115,117);
        if(!empty($en[2]))
            $this->Cell(40,9,$en[2]==""?"":$en[2],0,1);
              {
                $this->setXY(115,124);
                if(!empty($en[3]))
                  $this->Cell(40,9,$en[3]==""?"":$en[3],0,1);
                  {
                      $this->setXY(115,131);
                      if(!empty($en[4]))
                        $this->Cell(40,9,$en[4]==""?"":$en[4],0,1);
                        {
                        $this->setXY(115,138);
                        if(!empty($en[5]))
                          $this->Cell(40,9,$en[5]==""?"":$en[5],0,1);
                          {
                          $this->setXY(115,145);
                          if(!empty($en[6]))
                            $this->Cell(40,9,$en[6]==""?"":$en[6],0,1);
                            {
                            $this->setXY(115,152);
                            if(!empty($en[7]))
                              $this->Cell(40,9,$en[7]==""?"":$en[7],0,1);
                              {
                              $this->setXY(115,159);
                              if(!empty($en[8]))
                                  $this->Cell(40,9,$en[8]==""?"":$en[8],0,1);
                                  {
                                  $this->setXY(115,166);
                                  if(!empty($en[9]))
                                    $this->Cell(40,9,$en[9]==""?"":$en[9],0,1);
                                    {
                                    $this->setXY(115,173);
                                    if(!empty($en[10]))
                                        $this->Cell(40,9,$en[10]==""?"":$en[10],0,1);
                                        {
                                        $this->setXY(115,180);
                                        if(!empty($en[11]))
                                          $this->Cell(40,9,$en[11]==""?"":$en[11],0,1);
                                          {
                                          $this->setXY(115,187);
                                          if(!empty($en[12]))
                                            $this->Cell(40,9,$en[12]==""?"":$en[12],0,1);


                                          }}}}}}}}}}}}}
$this->SetFont('times','B',10);
$this->setXY(13,190);
$this->Cell(100,9,"TE TJERA/OTHERS:",0,1,"L");
$this->SetFont('times','',11);
$gashi  = $_POST['other'];
$ti = explode(" ", $gashi);
$this->setXY(15,197);
if(!empty($ti[0]))
{
  $this->Cell(40,9,$ti[0]==""?"":$ti[0],0,1);
{
   $this->setXY(15,204);
   if(!empty($ti[1]))
      $this->Cell(40,9,$ti[1]==""?"":$ti[1],0,1);
      {
        $this->setXY(15,211);
        if(!empty($ti[2]))
            $this->Cell(40,9,$ti[2]==""?"":$ti[2],0,1);
              {
                $this->setXY(15,218);
                if(!empty($ti[3]))
                  $this->Cell(40,9,$ti[3]==""?"":$ti[3],0,1);
                  {
                    $this->setXY(15,225);
                    if(!empty($ti[4]))
                      $this->Cell(40,9,$ti[4]==""?"":$ti[4],0,1);
                }}}}}


$this->SetFont('times','B',10);
$this->setXY(113,190);
$this->Cell(100,9,"TE TJERA/OTHERS:",0,1,"L");
$this->SetFont('times','',11);
$haliti  = $_POST['other_dalje'];
$eh = explode(" ", $haliti);
$this->setXY(115,197);
if(!empty($eh[0]))
{
  $this->Cell(40,9,$eh[0]==""?"":$eh[0],0,1);
{
   $this->setXY(115,204);
   if(!empty($eh[1]))
      $this->Cell(40,9,$eh[1]==""?"":$eh[1],0,1);
      {
        $this->setXY(115,211);
        if(!empty($eh[2]))
            $this->Cell(40,9,$eh[2]==""?"":$eh[2],0,1);
              {
                $this->setXY(115,218);
                if(!empty($eh[3]))
                  $this->Cell(40,9,$eh[3]==""?"":$eh[3],0,1);
                  {
                    $this->setXY(115,225);
                    if(!empty($eh[4]))
                      $this->Cell(40,9,$eh[4]==""?"":$eh[4],0,1);
                }}}}}

$this->Line(10,237,200,237);

$this->setXY(13,241);
$this->Cell(80,8,"Dorezuar ne hyrje nga/Handed over on enter by:",0,0,"L");
$this->Cell(100,8,"Dorezuar ne dalje nga/Handed over on exit by:",0,1,"R");
$this->SetFont('', 'U');
$this->setXY(13,248);
$this->Cell(84,9,$_POST['handed_by']==""?"":$_POST['handed_by'],0,1);
$this->setXY(143,248);
$this->Cell(84,9,$_POST['handed_by_exit']==""?"":$_POST['handed_by_exit'],0,1);

$this->setXY(13,257);
$this->SetFont('','');
$this->Cell(80,8,"Verifikuar nga operatori i skenimit/Verified on enter by:",0,0,"L");
$this->Cell(100,8,"Verifikuar nga operatori i skenimit/Verified on exit by:",0,1,"R");
$this->setXY(13,264);
$this->SetFont('', 'U');
$this->Cell(84,9,$_POST['verified_by']==""?"":$_POST['verified_by'],0,1);
$this->setXY(143,264);
$this->Cell(84,9,$_POST['verified_by_exit']==""?"":$_POST['verified_by_exit'],0,1);

  $this->setY(-15);
  $this->SetFont('Times', 'I', 9);
  $this->Cell(100,5,"Limak Kosovo International Airport J.S.C. - Screening Unit - ".date("m-d-Y H:i"), 0,0,"L");
  $this->setxY(113,-15);
  $this->Cell(70,5,"Raport printed by: ".$user,0,0,"L");
}}

$pdf=new myFPDF();
$pdf->AddPage();


$dataHandover = date("d.m.Y");

$pdf->Output('I','Screening_Report_'.$dataHandover.'.pdf');
//$this->Output('D',"$emri$mbiemri".$dataHandover.".pdf");

//header("location: security.php");

?>
