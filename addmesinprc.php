<?
include_once "koneksi.php";
session_start();
//tambah user
function getTanggaldb($tanggal){
		list($bln,$tgl,$thn) = explode("/",$tanggal) ;
		return $thn ."-". $bln ."-". $tgl ;
	}
$txthn = getTanggaldb($_POST['txthn']);



if (isset($errorx)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $errorx);
} else {
if ($_POST['exe']=='1'){
}
//edit user
if ($_POST['exe']=='2'){
$hasil=mysql_query("update `m_mesin` set `hrg`='$_POST[txhrg]'  where `idmesin`='$_POST[txid]'");
if ($hasil){ echo " Sukses merubah data";}
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
<script>window.location.href = 'index.php?h=<?=$_POST[hal]?>&link=df_mesinprc.php' </script>
<?
}

}

//header('Location:index.php?h=1&link=df_user.php');
?>
