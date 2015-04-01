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
	$errorx[] = "- Code processes boleh kosong";
}

if ($_POST['txdesc']== '') {
	$errorx[] = "- Description tidak boleh kosong";
}
if ($_POST['typpros']== '2') {

	if ($_POST['txperkiraan']== '') {
	$errorx[] = "- Estimasi Time tidak boleh kosong";
	}
	
	if ($_POST['txmac']== '') {
	$errorx[] = "- Machine tidak boleh kosong";
	}
	
}

if (isset($errorx)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $errorx);
} else {
if ($_POST['exe']=='1'){
	
	$cekuser = mysql_query("select * from mproses where idproses='$_POST[txid]' ");		  
	$banyakrow = mysql_num_rows($cekuser);
	if ($banyakrow>0 ) {
	$errorx[] = "- KOde Mesin sudah terdaftar ";
	}else{
	$hasil=mysql_query("insert into `mproses`(`idproses`,`nmproses`,`jnsproses`,`estitime`,`idmesin`) values 
	( '$_POST[txid]','$_POST[txdesc]','$_POST[typpros]','$_POST[txperkiraan]','$_POST[txmac]')");
	}
}
//edit user
if ($_POST['exe']=='2'){
$hasil=mysql_query("update `mproses` set `nmproses`='$_POST[txdesc]',jnsproses='$_POST[typpros]',`estitime`='$_POST[txperkiraan]',idmesin='$_POST[txmac]'  where `idproses`='$_POST[txid]'");
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
<script>window.location.href = 'index.php?h=<?=$_POST[hal]?>&link=df_proses.php' </script>
<?
}

}

//header('Location:index.php?h=1&link=df_user.php');
?>
