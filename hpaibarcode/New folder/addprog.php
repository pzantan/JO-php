<?
include_once "koneksi.php";
session_start();
//tambah user

if ($_POST['fileprog']== '') {
	$errorx[] = "- File program harus diisi";
}

if ($_POST['txmenu']== '') {
	$errorx[] = "- Nama Menu harus diisi";
}

if (isset($errorx)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $errorx);
} else {
if ($_POST['exe']=='1'){
	
	$cekuser = mysql_query("select * from m_menu where file='$_POST[fileprog]' ");		  
	$banyakrow = mysql_num_rows($cekuser);
	if ($banyakrow>0 ) {
	$errorx[] = "- Program Menu sudah terdaftar ";
	}else{
	$hasil=mysql_query("insert into `m_menu`(`file`,`nm_menu`,`id_hdmenu`) values ( '$_POST[fileprog]','$_POST[txmenu]','$_POST[txhd]')");
	}
}
//edit user
if ($_POST['exe']=='2'){
$hasil=mysql_query("update `m_menu` set `file`='$_POST[fileprog]',`nm_menu`='$_POST[txmenu]', id_hdmenu='$_POST[txhd]' where `id_menu`='$_POST[idprog]'");
if ($hasil){ echo " Sukses merubah data $_POST[idprog] ";} else { echo " $_POST[idprog] ";}
}

if ($_POST['exe']=='3'){
$hasil=mysql_query("delete from `m_menu` where `id_menu`='$_POST[idprog]';");
if ($hasil){ echo " Sukses Menghapus data";}
}

if (isset($errorx)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $errorx);
}else{
?>
<script>window.location.href = 'index.php?h=1&link=df_program.php' </script>
<?
}

}

//header('Location:index.php?h=1&link=df_user.php');
?>
