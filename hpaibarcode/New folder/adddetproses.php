<?
include_once "koneksi.php";
session_start();
//tambah user
function getTanggaldb($tanggal){
		list($bln,$tgl,$thn) = explode("/",$tanggal) ;
		return $thn ."-". $bln ."-". $tgl ;
	}
$txthn = getTanggaldb($_POST['txthn']);

if ($_POST['txsub']== '') {
	$errorx[] = "- Sub processes boleh kosong";
}
if (isset($errorx)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $errorx);
} else {
if ($_POST['exe']=='2'){
	
	$cekuser = mysql_query("select * from trproses where mpros='$_POST[txid]' and detpros='$_POST[txsub]' ");		  
	$banyakrow = mysql_num_rows($cekuser);
	if ($banyakrow>0 ) {
	$errorx[] = "- sudah terdaftar ";
	}else{
	$hasil=mysql_query("insert into `trproses`(`mpros`,`detpros`) values 
	( '$_POST[txid]','$_POST[txsub]')");
	}
}
if ($_POST['exe']=='3'){
$hasil=mysql_query("delete from `m_user` where `usr_user`='$_POST[userid]';");
if ($hasil){ echo " Sukses Menghapus data";}
}

//$errorx[] = "- tanggal KB harus H-$_SESSION[exkbsetup] atau H+$_SESSION[exkbsetup] ";
if (isset($errorx)) {
	echo '  <br /> &nbsp; &nbsp; <b>Error</b>: <br />'.implode('<br />', $errorx);
}else{
?>
<script>window.location.href = 'index.php?h=<?=$_POST[hal]?>&link=df_proses.php' </script>
<?
}

}

//header('Location:index.php?h=1&link=df_user.php');
?>
