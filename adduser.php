<?
include_once "koneksi.php";
session_start();
//tambah user

if ($_POST['userid']== '') {
	$errorx[] = "- User tidak boleh kosong";
}

if ($_POST['naamalengkap']== '') {
	$errorx[] = "- Nama Lengkap tidak boleh kosong";
}

if (isset($errorx)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $errorx);
} else {
if ($_POST['exe']=='1'){
	
	$cekuser = mysql_query("select * from m_user where usr_user='$_POST[userid]' ");		  
	$banyakrow = mysql_num_rows($cekuser);
	if ($banyakrow>0 ) {
	$errorx[] = "- User Name sudah terdaftar ";
	}else{
	$hasil=mysql_query("insert into `m_user`(`usr_user`,`usr_nama`,`usr_level`,`usr_sts`,nik) values 
	( '$_POST[userid]','$_POST[naamalengkap]','$_POST[levell]','Y','$_POST[nik]')");
	}
}
//edit user
if ($_POST['exe']=='2'){
$hasil=mysql_query("update `m_user` set `usr_nama`='$_POST[naamalengkap]',`usr_level`='$_POST[levell]', nik='$_POST[nik]'
 where `usr_user`='$_POST[userid]'");
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
<script>window.location.href = 'index.php?h=11&link=df_user.php' </script>
<?
}

}

//header('Location:index.php?h=1&link=df_user.php');
?>
