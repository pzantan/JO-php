<?php
require('ean13.php');
$pdf=new PDF_EAN13('P','mm','Legal');
$pdf->AddPage();
$pdf->EAN13(10,10,'JO1402000002');
$pdf->Output();
?>
