<?include_once "koneksi.php"; require('code39.php');
function setbulan($tgl){
		$bulan[1]  = "January";
		$bulan[2]  = "February";
		$bulan[3]  = "March";
		$bulan[4]  = "April";
		$bulan[5]  = "May";
		$bulan[6]  = "June";
		$bulan[7]  = "July";
		$bulan[8]  = "August";
		$bulan[9]  = "September";
		$bulan[10]  = "October";
		$bulan[11]  = "November";
		$bulan[12]  = "December";
		return  $bulan[$tgl] ;
	}
function urgnttyp($j){
		$textt[3]  = "NORMAL";
		$textt[2]  = "URGENT";
		$textt[1]  = "TOP URGENT";
		return  $textt[$j] ;
	}
function typejo($j){
		$textt["T"]  = "STANDART";
		$textt["S"]  = "SPECIAL";
		$textt["R"]  = "REGRINDING";
		$textt["TR"]  = "TRIAL";
		return  $textt[$j] ;
	}
$crkpi=mysql_query("SELECT t.*, c.`nm_cust` FROM tr_reg t
LEFT JOIN m_cust c ON t.`id_cust`=c.`id_cust` where t.noreq='$_GET[noreq]'");
			$dtjo=mysql_fetch_array($crkpi);
			$blnjln = setbulan($dtnkpi['bln']);

$pdf = new PDF_Code39('P','mm','A4');
$pdf->AddPage();
$pdf->Image('images/logo-oerlikon.jpg',10,10);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,5,'',0);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(0,5,'PT. HPMT ARTODA INDONESIA');
//$pdf->Code39(10, 10, $dtjo['noreq']);

$partnames = stripslashes($dtjo['partnm']);
$partnames = iconv('UTF-8', 'windows-1252', $partnames);

$pdf->SetFont('Arial','',10);
$pdf->Ln();$pdf->Cell(0,5,'Cost Calculation',0);
$pdf->Ln();$pdf->Ln();$pdf->Cell(30,5,'TDS No',0);$pdf->Cell(5,5,':',0);$pdf->Cell(0,5,$dtjo['noreq'],0);
$pdf->Ln();$pdf->Cell(30,5,'Date',0);$pdf->Cell(5,5,':',0);$pdf->Cell(0,5,$dtjo['tgl'],0);
$pdf->Ln();$pdf->Cell(30,5,'Description',0);$pdf->Cell(5,5,':',0);$pdf->Cell(0,5,$dtjo['descrip'],0);
$pdf->Ln();$pdf->Cell(30,5,'Tool no',0);$pdf->Cell(5,5,':',0);$pdf->Cell(0,5,$dtjo['toolno'],0);
$pdf->Ln();$pdf->Cell(30,5,'Qty',0);$pdf->Cell(5,5,':',0);$pdf->Cell(0,5,$dtjo['qty'],0);
$pdf->Ln();$pdf->Cell(30,5,'Customer',0);$pdf->Cell(5,5,':',0);$pdf->Cell(0,5,"$dtjo[id_cust] | $dtjo[nm_cust]",0);

$pdf->Ln();$pdf->Ln();
$pdf->Ln();$pdf->Ln();

$pdf->Cell(55,6,' Selling Price ',1);$pdf->Cell(80,6,"1 Pcs",1,0,'R');$pdf->Cell(0,6,number_format($dtjo[sel1]),1,0,'R');
$pdf->Ln();$pdf->Cell(55,6,' ',1);$pdf->Cell(80,6,"5 Pcs",1,0,'R');$pdf->Cell(0,6,number_format($dtjo[sel5]),1,0,'R');
$pdf->Ln();$pdf->Cell(55,6,' ',1);$pdf->Cell(80,6,"30 Pcs",1,0,'R');$pdf->Cell(0,6,number_format($dtjo[sel30]),1,0,'R');
$pdf->Ln();$pdf->Cell(55,6,' ',1);$pdf->Cell(80,6,"80 Pcs",1,0,'R');$pdf->Cell(0,6,number_format($dtjo[sel80]),1,0,'R');
$pdf->Ln();$pdf->Cell(55,6,' ',1);$pdf->Cell(80,6,"100 Pcs",1,0,'R');$pdf->Cell(0,6,number_format($dtjo[sel100]),1,0,'R');

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->Ln();$pdf->Cell(70,6,'',0);$pdf->Cell(30,6,'Estimator',1,0,'C');$pdf->Cell(30,6,'Sales Engr',1,0,'C');$pdf->Cell(30,6,'Marketing.Mgr',1,0,'C');$pdf->Cell(30,6,'General Manager',1,0,'C');
$pdf->Ln();$pdf->Cell(70,6,'',30);$pdf->Cell(30,30,'',1);$pdf->Cell(30,30,'',1);$pdf->Cell(30,30,'',1);$pdf->Cell(30,30,'',1);
$pdf->Ln();$pdf->Cell(70,6,'',0);$pdf->Cell(30,6,'Roderick AC',1,0,'C');$pdf->Cell(30,6,'',1);$pdf->Cell(30,6,'',1);$pdf->Cell(30,6,'Chonglian Sim.',1,0,'C');

$pdf->Ln();
$pdf->SetFont('Arial','',8);
$pdf->Ln();$pdf->Cell(0,5,'Remark.',0);
$pdf->Ln();$pdf->Cell(0,5,'Delivery will be 3-4 weeks after the P.O confirmation',0);
$pdf->Ln();$pdf->Cell(0,5,'from Customer, additional schedule depending on the',0);
$pdf->Ln();$pdf->Cell(0,5,'availability of raw material stocks at warehouse.',0);


//$pdf->Rect(118,43,30,10);
//$pdf->Rect(148,43,30,10);
//$pdf->Text(120,50, urgnttyp($dtjo['urgnt_typ']));
//$pdf->Text(150,50, typejo($dtjo['typejo']));
$pdf->Output();
?>
