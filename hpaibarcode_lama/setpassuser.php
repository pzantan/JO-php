<?
include_once "koneksi.php";
session_start();
//tambah user

if ($_POST['txtpass1']== '') {
	$errorx[] = "- Password tidak boleh kosong";
}
if ($_POST['txtpass2']== '') {
	$errorx[] = "- Password tidak boleh kosong";
}
if ($_POST['txtpass2']!=$_POST['txtpass1']) {
	$errorx[] = "- Password harus sama ";
}
if (isset($errorx)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $errorx);
} else {
$hasil=mysql_query("update `m_user` set usr_pass='". md5($_POST['txtpass1']) ."' where `usr_user`='$_POST[userid]'");
if ($hasil){ echo " Sukses merubah data";}
?>
<script>window.location.href = 'index.php?h=1&link=df_user.php' </script>
<?
}

//header('Location:index.php?h=1&link=df_user.php');
?>
