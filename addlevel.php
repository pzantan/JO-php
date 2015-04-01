<?
include_once "koneksi.php";
session_start();
//tambah user

if ($_POST['txlevel']== '') {
	$errorx[] = "- Nama level Tidak boleh kosong";
}


if (isset($errorx)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $errorx);
} else {
if ($_POST['exe']=='1'){
	
	$cekuser = mysql_query("select * from m_userlevel where id_level='$_POST[txid]' ");		  
	$banyakrow = mysql_num_rows($cekuser);
	if ($banyakrow>0 ) {
	$errorx[] = "- Level tersebut sudah terdaftar ";
	}else{
	$hasil=mysql_query("insert into m_userlevel (nm_level) values ( '$_POST[txlevel]')");
	}
}
//edit user
if ($_POST['exe']=='2'){
$hasil=mysql_query("update m_userlevel set nm_level='$_POST[txlevel]' where id_level='$_POST[txid]'");
if ($hasil){ echo " Sukses merubah data $_POST[txid] ";} else { echo " $_POST[txid] ";}
}

if ($_POST['exe']=='3'){
$hasil=mysql_query("delete from m_userlevel where id_level='$_POST[txid]';");
if ($hasil){ echo " Sukses Menghapus data";}
}

if (isset($errorx)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $errorx);
}else{
?>
<script>window.location.href = 'index.php?h=1&link=df_level.php' </script>
<?
}

}

//header('Location:index.php?h=1&link=df_user.php');
?>
