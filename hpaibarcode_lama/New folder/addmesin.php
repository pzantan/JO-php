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
	$errorx[] = "- code Machine boleh kosong";
}

if ($_POST['nmmesin']== '') {
	$errorx[] = "- Description tidak boleh kosong";
}
if ($_POST['txthn']== '') {
	$errorx[] = "- Tahun Pembuatan tidak boleh kosong";
}

if (isset($errorx)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $errorx);
} else {
if ($_POST['exe']=='1'){
	
	$cekuser = mysql_query("select * from m_mesin where idmesin='$_POST[txid]' ");		  
	$banyakrow = mysql_num_rows($cekuser);
	if ($banyakrow>0 ) {
	$errorx[] = "- KOde Mesin sudah terdaftar ";
	}else{
	$hasil=mysql_query("insert into `m_mesin`(`idmesin`,`nmmesin`,mtype,`thnpembuatan`,`ket`) values 
	( '$_POST[txid]','$_POST[nmmesin]','$_POST[txtype]','$txthn','$_POST[txket]')");
	}
}
//edit user
if ($_POST['exe']=='2'){
$hasil=mysql_query("update `m_mesin` set `nmmesin`='$_POST[nmmesin]',mtype='$_POST[txtype]',`thnpembuatan`='$txthn',ket='$_POST[txket]'  where `idmesin`='$_POST[txid]'");
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
<script>window.location.href = 'index.php?h=<?=$_POST[hal]?>&link=df_mesin.php' </script>
<?
}

}

//header('Location:index.php?h=1&link=df_user.php');
?>
