<?
require('code39.php');
$pdf=new PDF_Code39('L','mm',array(210,165));
$pdf->AddPage();
list($nik,$nmuser) = explode("|",$_POST['txuser']) ;

//$_POST['loc']=4;
if ($_POST['loc']==1) {
$gbrx=5; $gbry=15; $jdlx=10; $jdly=13; $tx1x=25; $tx1y=20; $tx2x=25; $tx2y=25; $tx3x=25; $tx3y=30; 
}
if ($_POST['loc']==2) {
$gbrx=77; $gbry=15; $jdlx=81; $jdly=13; $tx1x=97; $tx1y=20; $tx2x=97; $tx2y=25; $tx3x=97; $tx3y=30; 
}
if ($_POST['loc']==3) {
$gbrx=150; $gbry=15; $jdlx=154; $jdly=13; $tx1x=170; $tx1y=20; $tx2x=170; $tx2y=25; $tx3x=170; $tx3y=30; 
}
if ($_POST['loc']==4) {
$gbrx=5; $gbry=55; $jdlx=10; $jdly=54; $tx1x=25; $tx1y=60; $tx2x=25; $tx2y=65; $tx3x=25; $tx3y=70; 
}
if ($_POST['loc']==5) {
$gbrx=77; $gbry=55; $jdlx=81; $jdly=54; $tx1x=97; $tx1y=60; $tx2x=97; $tx2y=65; $tx3x=97; $tx3y=70; 
}
if ($_POST['loc']==6) {
$gbrx=150; $gbry=55; $jdlx=154; $jdly=54; $tx1x=170; $tx1y=60; $tx2x=170; $tx2y=65; $tx3x=170; $tx3y=70; 
}
if ($_POST['loc']==7) {
$gbrx=5; $gbry=95; $jdlx=10; $jdly=94; $tx1x=25; $tx1y=100; $tx2x=25; $tx2y=105; $tx3x=25; $tx3y=110; 
}
if ($_POST['loc']==8) {
$gbrx=77; $gbry=95; $jdlx=81; $jdly=94; $tx1x=97; $tx1y=100; $tx2x=97; $tx2y=105; $tx3x=97; $tx3y=110; 
}
if ($_POST['loc']==9) {
$gbrx=150; $gbry=95; $jdlx=154; $jdly=94; $tx1x=170; $tx1y=100; $tx2x=170; $tx2y=105; $tx3x=170; $tx3y=110; 
}
if ($_POST['loc']==10) {
$gbrx=5; $gbry=135; $jdlx=10; $jdly=134; $tx1x=25; $tx1y=140; $tx2x=25; $tx2y=145; $tx3x=25; $tx3y=150; 
}
if ($_POST['loc']==11) {
$gbrx=77; $gbry=135; $jdlx=81; $jdly=134; $tx1x=97; $tx1y=140; $tx2x=97; $tx2y=145; $tx3x=97; $tx3y=150; 
}
if ($_POST['loc']==12) {
$gbrx=150; $gbry=135; $jdlx=154; $jdly=134; $tx1x=170; $tx1y=140; $tx2x=170; $tx2y=145; $tx3x=170; $tx3y=150; 
}

//col 1:1
//$pdf->Image($filename,$gbrx,$gbry);
$pdf->Code39($gbrx,$gbry, $nik);
$pdf->SetFont('Arial','',8);
$pdf->Text($jdlx,$jdly,$nmuser);
//$pdf->Text($tx1x,$tx1y,$_POST['noid']);
//$pdf->Text($tx2x,$tx2y,$_POST['txdep']);
//$pdf->Text($tx3x,$tx3y,$_POST['txbr']);



$pdf->Output();
?>