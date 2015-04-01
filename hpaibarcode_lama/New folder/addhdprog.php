<?
include_once "koneksi.php";
session_start();
//tambah user

if ($_POST['txthdmenu']== '') {
	$errorx[] = "- Header Menu harus diisi";
}


if (isset($errorx)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $errorx);
} else {
if ($_POST['exe']=='1'){
	
	$cekuser = mysql_query("select * from hd_menu where nm_hdmenu='$_POST[txthdmenu]' ");		  
	$banyakrow = mysql_num_rows($cekuser);
	if ($banyakrow>0 ) {
	$errorx[] = "- Program Menu sudah terdaftar ";
	}else{
	$hasil=mysql_query("insert into `hd_menu`(`nm_hdmenu`) values ( '$_POST[txthdmenu]')");
	}
}
//edit user
if ($_POST['exe']=='2'){
$hasil=mysql_query("update `hd_menu` set `nm_hdmenu`='$_POST[txthdmenu]' where `id_hdmenu`='$_POST[idhdprog]'");
if ($hasil){ echo " Sukses merubah data $_POST[idprog] ";} else { echo " $_POST[idhdprog] ";}
}

if ($_POST['exe']=='3'){
$hasil=mysql_query("delete from `hd_menu` where `id_hdmenu`='$_POST[idhdprog]';");
if ($hasil){ echo " Sukses Menghapus data";}
}

if (isset($errorx)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $errorx);
}else{
?>
<script>window.location.href = 'index.php?h=1&link=df_hdprog.php' </script>
<?
}

}

//header('Location:index.php?h=1&link=df_user.php');
?>
