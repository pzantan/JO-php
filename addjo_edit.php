<?
include_once "koneksi.php";
session_start();
//tambah user
function getTanggaldb($tanggal){
		list($bln,$tgl,$thn) = explode("/",$tanggal) ;
		return $thn ."-". $bln ."-". $tgl ;
	}
$txtgl = getTanggaldb($_POST['txtgl']);
$tgldel = getTanggaldb($_POST['tgldel']);

$kdmat = $_POST[kdbrgtx];
$qtymat = $_POST[qtytx];
$kdmesin = $_POST[kdmesin];

if ($_POST['txcust']== '') {
	$errorx[] = "- Customer harus dipilih";
}

if ($_POST['txqty']== 0) {
	$errorx[] = "- Qty Harus lebih dari 0";
}

if (isset($errorx)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $errorx);
} else {
	
	$hasil=mysql_query("INSERT INTO `tr_jo`(`nojo`,`jorev`,`tgljo`,`tgldel`,`partnm`,`qty`,`iproses`,`idcust`,`nopo`,`noso`,`starttime`,`usr`,`timecreate`,typejo,urgnt_typ)VALUES 
	('$_POST[txid]','0','$txtgl','$tgldel','$_POST[txpartnm]','$_POST[txqty]','$_POST[txsub]','$_POST[txcust]','$_POST[nopo]','$_POST[noso]',now(),'$_SESSION[userid]',now(),'$_POST[kdjo]','$_POST[kdurgn]');");
	$hasil=mysql_query("UPDATE `tr_jo` set `tgljo`='$txtgl',`tgldel`='$tgldel',`partnm`='$_POST[txpartnm]',`qty`='$_POST[txqty]',`iproses`='$_POST[txsub]',
	`idcust`='$_POST[txcust]',`nopo`='$_POST[nopo]',`noso`='$_POST[noso]',urgnt_typ='$_POST[kdurgn]',harga='$_POST[hrg]' where nojo='$_POST[txid]' ;");
	mysql_query("delete from `tr_jodetail` where nojo='$_POST[txid]' ");
	$jmltime = 0;
	for($i=0;$i<count($kdmat);$i++){
			$jmltime = $jmltime+$qtymat[$i];
			$hasil=mysql_query("INSERT INTO `tr_jodetail`(`nojo`, `idproses`, `estimasi`, `starttime`,idmesin)
				VALUES ('$_POST[txid]','$kdmat[$i]','$qtymat[$i]',now(),'$kdmesin[$i]');");
	}
	mysql_query("update tr_jo set esttime='$jmltime' where nojo='$_POST[txid]' ");
	mysql_query("update m_no set jo_no=jo_no + 1 ");
?>
<script>window.location.href = 'index.php?h=<?=$_POST[hal]?>&link=df_jo.php' </script>
<?

}
//header('Location:index.php?h=1&link=df_user.php');
?>
