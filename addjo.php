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
if ($_POST['exe']=='1'){
	
	$cekuser = mysql_query("select * from tr_jo where nojo='$_POST[txid]' ");		  
	$banyakrow = mysql_num_rows($cekuser);
	if ($banyakrow>0 ) {
	$errorx[] = "- NO JO Sudah terdaftar";
	}else{
	$hasil=mysql_query("INSERT INTO `tr_jo`(`nojo`,`jorev`,`tgljo`,`tgldel`,`partnm`,`qty`,`iproses`,`idcust`,`nopo`,`noso`,`starttime`,`usr`,`timecreate`,typejo,urgnt_typ,harga)VALUES 
	('$_POST[txid]','0','$txtgl','$tgldel','$_POST[txpartnm]','$_POST[txqty]','$_POST[txsub]','$_POST[txcust]','$_POST[nopo]','$_POST[noso]',now(),'$_SESSION[userid]',now(),'$_POST[kdjo]','$_POST[kdurgn]','$_POST[hrg]');");
	$jmltime = 0;
	for($i=0;$i<count($kdmat);$i++){
			$jmltime = $jmltime+$qtymat[$i];
			$hasil=mysql_query("INSERT INTO `tr_jodetail`(`nojo`, `idproses`, `estimasi`, `starttime`,idmesin)
				VALUES ('$_POST[txid]','$kdmat[$i]','$qtymat[$i]',now(),'$kdmesin[$i]');");
	}
	mysql_query("update tr_jo set esttime='$jmltime' where nojo='$_POST[txid]' ");
	mysql_query("update m_no set jo_no=jo_no + 1 ");
}
/*edit user
if ($_POST['exe']=='2'){
$hasil=mysql_query("update `m_mesin` set `nmmesin`='$_POST[nmmesin]',mtype='$_POST[txtype]',`thnpembuatan`='$txthn',ket='$_POST[txket]'  where `idmesin`='$_POST[txid]'");
if ($hasil){ echo " Sukses merubah data";}
}

if ($_POST['exe']=='3'){
$hasil=mysql_query("delete from `m_user` where `usr_user`='$_POST[userid]';");
if ($hasil){ echo " Sukses Menghapus data";}
}
*/
//$errorx[] = "- tanggal KB harus H-$_SESSION[exkbsetup] atau H+$_SESSION[exkbsetup] ";
if (isset($errorx)) {
	echo '  <br /> &nbsp; &nbsp; <b>Error</b>: <br />'.implode('<br />', $errorx);
}else{
?>
<script>window.location.href = 'index.php?h=<?=$_POST[hal]?>&link=df_jo.php' </script>
<?
}

}
}
//header('Location:index.php?h=1&link=df_user.php');
?>
