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
$crkpi=mysql_query("SELECT t.*, p.`nmproses`, c.`nm_cust` FROM tr_jo t
LEFT JOIN mproses p ON t.`iproses`= p.`idproses`
LEFT JOIN m_cust c ON t.`idcust`=c.`id_cust` where nojo='$_GET[nojo]'");
			$dtjo=mysql_fetch_array($crkpi);
			$blnjln = setbulan($dtnkpi['bln']);

$pdf = new PDF_Code39('P','mm','Legal');
$pdf->AddPage();
$pdf->Image('images/logo-oerlikon.jpg',10,10);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,5,'',0);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(0,5,'PT. HPMT ARTODA INDONESIA',0);
$pdf->Code39(110, 10, $dtjo['nojo']);

$partnames = stripslashes($dtjo['partnm']);
$partnames = iconv('UTF-8', 'windows-1252', $partnames);

$pdf->SetFont('Arial','',10);
$pdf->Ln();$pdf->Cell(0,5,'Production Process Flow',0);
$pdf->Ln();$pdf->Ln();$pdf->Cell(30,5,'Date',0);$pdf->Cell(5,5,':',0);$pdf->Cell(0,5,$dtjo['tgljo'],0);
$pdf->Ln();$pdf->Cell(30,5,'Part Name',0);$pdf->Cell(5,5,':',0);$pdf->Cell(0,5,$partnames,0);
$pdf->Ln();$pdf->Cell(30,5,'Delevery Date',0);$pdf->Cell(5,5,':',0);$pdf->Cell(0,5,$dtjo['tgldel'],0);
$pdf->Ln();$pdf->Cell(30,5,'Total Qty',0);$pdf->Cell(5,5,':',0);$pdf->Cell(0,5,$dtjo['qty'],0);
$pdf->Ln();$pdf->Cell(30,5,'Process',0);$pdf->Cell(5,5,':',0);$pdf->Cell(0,5,$dtjo['nmproses'],0);
$pdf->Ln();$pdf->Cell(30,5,'Customer',0);$pdf->Cell(5,5,':',0);$pdf->Cell(0,5,$dtjo['idcust'],0);
$pdf->Ln();$pdf->Cell(30,5,'SO Number',0);$pdf->Cell(5,5,':',0);$pdf->Cell(0,5,$dtjo['noso'],0);

$pdf->Ln();$pdf->Ln();
$pdf->Ln();$pdf->Ln();

$pdf->Cell(55,6,'Process Flow ',1);$pdf->Cell(80,6,"Machine",1);$pdf->Cell(0,6,'Remark',1);
$hasilqw=mysql_query("SELECT t.`idproses`, p.nmproses, m.`nmmesin` FROM tr_jodetail t 
LEFT JOIN mproses p ON t.`idproses`=p.`idproses`
LEFT JOIN m_mesin m ON p.`idmesin` = m.`idmesin`
WHERE nojo='$_GET[nojo]'");
			while ($dtls=mysql_fetch_array($hasilqw)){ 
$pdf->Ln();$pdf->Cell(55,6,$dtls['nmproses'],1);$pdf->Cell(80,6,$dtls['nmmesin'],1);$pdf->Cell(0,6,'',1);
}

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->Ln();$pdf->Cell(30,6,'Issued By',1);$pdf->Cell(30,6,'Order By',1);$pdf->Cell(0,6,'Remark',1);
$pdf->Ln();$pdf->Cell(30,30,'',1);$pdf->Cell(30,30,'',1);$pdf->Cell(0,30,'',1);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->Rect(118,43,30,10);
$pdf->Rect(148,43,30,10);
$pdf->Text(120,50, urgnttyp($dtjo['urgnt_typ']));
$pdf->Text(150,50, typejo($dtjo['typejo']));
$pdf->Output();
?>
