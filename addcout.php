<?
include_once "koneksi.php";
session_start();
//tambah user
function getTanggaldb($tanggal){
		list($bln,$tgl,$thn) = explode("/",$tanggal) ;
		return $thn ."-". $bln ."-". $tgl ;
	}
$txthn = getTanggaldb($_POST['txthn']);

if ($_POST['txid']== '') {
	$errorx[] = "- Code Material empty";
}
if (isset($errorx)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $errorx);
} else {
if ($_POST['exe']=='1'){
	
	$cekuser = mysql_query("select * from mcoating where kdcoating='$_POST[txid]' ");		  
	$banyakrow = mysql_num_rows($cekuser);
	if ($banyakrow>0 ) {
	$errorx[] = "- sudah terdaftar ";
	}else{
	$hasil=mysql_query("insert into `mcoating`(kdcoating,nmcoating,price) values 
	( '$_POST[txid]','$_POST[txdesc]','$_POST[txprice]')");
	}
}

if ($_POST['exe']=='2'){
$hasil=mysql_query("update `mcoating` set `nmcoating`='$_POST[txdesc]', price='$_POST[txprice]'  where `kdcoating`='$_POST[txid]'");
if ($hasil){ echo " Sukses merubah data $_POST[txdesc] ";} else { echo " Gagal";}
}
if ($_POST['exe']=='3'){
$hasil=mysql_query("delete from `mcoating` where `kdcoating`='$_POST[txid]';");
if ($hasil){ echo " Sukses Menghapus data";}
}

//$errorx[] = "- tanggal KB harus H-$_SESSION[exkbsetup] atau H+$_SESSION[exkbsetup] ";
if (isset($errorx)) {
	echo '  <br /> &nbsp; &nbsp; <b>Error</b>: <br />'.implode('<br />', $errorx);
}else{
?>
<script>window.location.href = 'index.php?h=<?=$_POST[hal]?>&link=df_cout.php' </script>
<?
}

}

//header('Location:index.php?h=1&link=df_user.php');
?>
