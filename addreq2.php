<?
include_once "koneksi.php";
session_start();
//tambah user
function getTanggaldb($tanggal){
		list($bln,$tgl,$thn) = explode("/",$tanggal) ;
		return $thn ."-". $bln ."-". $tgl ;
	}
$txtgl = getTanggaldb($_POST['txtgl']);
$tgljo = getTanggaldb($_POST['tgljo']);

$kdmat = $_POST[kdmat];
$nmmat = $_POST[nmmat];
$hrgmat = $_POST[hrgmat];
$jmlmat = $_POST[jmlmat];
$jmltotmat = $_POST[jmltotmat];

$kdmach = $_POST[kdmach];
$nmmach = $_POST[nmmach];
$minmach = $_POST[minmach];
$hrgmach = $_POST[hrgmach];
$jmltotmach = $_POST[jmltotmach];

$kdco = $_POST[kdco];
$nmco = $_POST[nmco];
$qtyco = $_POST[qtyco];
$hrgco = $_POST[hrgco];
$jmltotco = $_POST[jmltotco];

$kdsub = $_POST[kdsub];
$nmsub = $_POST[nmsub];
$qtysub = $_POST[qtysub];
$hrgsub = $_POST[hrgsub];
$jmltotsub = $_POST[jmltotsub];



if ($_POST['txcust']== '') {
	$errorx[] = "- Customer harus dipilih";
}

if ($_POST['txqty']== 0) {
	$errorx[] = "- Qty Harus lebih dari 0";
}

if (isset($errorx)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $errorx);
} else {
	
	$hasil=mysql_query("INSERT INTO `tr_reg`(`noreq`,`tgl`,`descrip`,`qty`,`id_cust`,`toolno`,`riskper`,`hrg_pack`,`riskrp`,
	`totmat`,`totmach`,`totco`,`totsub`,sel1,sel5,sel30,sel80,sel100,createtime,creatuser)VALUES 
	('$_POST[nojo]','$tgljo','$_POST[txdesc]','$_POST[txqty]','$_POST[txcust]','$_POST[txtoolno]','$_POST[txriskt]','$_POST[txprice]','$_POST[riskrp]',
	'$_POST[gtmc]','$_POST[gtmach]','$_POST[grtotco]','$_POST[grtotsub]','$_POST[totsel1]','$_POST[totsel5]','$_POST[totsel30]','$_POST[totsel80]','$_POST[totsel100]',now(),'$_SESSION[userid]');");

	//$jmltime = 0;
	for($i=0;$i<count($kdmat);$i++){
			$hasil=mysql_query("INSERT INTO `tr_regmat`(`noreq`, `kdmatrial`, `price`, `qty`,totprice)
				VALUES ('$_POST[nojo]','$kdmat[$i]','$hrgmat[$i]','$jmlmat[$i]','$jmltotmat[$i]');");
	}
	
	for($i=0;$i<count($kdmach);$i++){
			$hasil=mysql_query("INSERT INTO `tr_regmach`(`noreq`, `idmesin`, `menit`, `price`,totprice)
				VALUES ('$_POST[nojo]','$kdmach[$i]','$minmach[$i]','$hrgmach[$i]','$jmltotmach[$i]');");
	}
	for($i=0;$i<count($kdco);$i++){
			$hasil=mysql_query("INSERT INTO `tr_regcoat`(`noreq`, `kdcoating`, `price`, `qty`,totprice)
				VALUES ('$_POST[nojo]','$kdco[$i]','$hrgco[$i]','$qtyco[$i]','$$jmltotco[$i]');");
	}
	
	for($i=0;$i<count($kdsub);$i++){
			$hasil=mysql_query("INSERT INTO `tr_regsub`(`noreq`, `kdsubcont`, `price`, `qty`,totprice)
				VALUES ('$_POST[nojo]','$kdsub[$i]','$hrgsub[$i]','$qtysub[$i]','$jmltotmat[$i]');");
	}
	//mysql_query("update tr_jo set esttime='$jmltime' where nojo='$_POST[txid]' ");
	mysql_query("update m_no set req_no=req_no + 1 ");
?>
<script>window.location.href = 'index.php?h=3&link=df_req.php' </script>
<?

}
//header('Location:index.php?h=1&link=df_user.php');
?>
