<?
include_once "koneksi.php";
session_start();
//tambah user

if ($_POST['txtpass1']== '') {
	$errorx[] = "- Password tidak boleh kosong";
}
if ($_POST['txtpass3']== '') {
	$errorx[] = "- Password tidak boleh kosong";
}
if ($_POST['txtpass2']== '') {
	$errorx[] = "- Password tidak boleh kosong";
}
if ($_POST['txtpass2']!=$_POST['txtpass1']) {
	$errorx[] = "- Password baru dan Re tye Password harus sama ";
}
$capee="select * from m_user u 	where usr_user='".$_SESSION['userid'] ."' and usr_pass='". md5($_POST["txtpass3"]) ."'";
	$sqlLogin = mysql_query($capee);
	$banyak =mysql_num_rows($sqlLogin);
if ($banyak<	1) {
	$errorx[] = "- Pasword lama Salah";
}
	
if (isset($errorx)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $errorx);
} else {
$hasil=mysql_query("update `m_user` set usr_pass='". md5($_POST['txtpass1']) ."' where `usr_user`='$_POST[userid]'");
if ($hasil){ echo " Sukses merubah data";}
//echo " Sukses merubah data ". $_POST["txtpass3"]. ' ' . $banyak;
?>
<script>window.location.href = 'index.php?h=1' </script>
<?
}

//header('Location:index.php?h=1&link=df_user.php');
?>
