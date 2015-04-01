<?
include_once "koneksi.php";
session_start();
//tambah user

if ($_POST['txkode']== '') {
	$errorx[] = "- User tidak boleh kosong";
}

if ($_POST['nmper']== '') {
	$errorx[] = "- Nama Peusahaan/ Company tidak boleh kosong";
}

if (isset($errorx)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $errorx);
} else {
if ($_POST['exe']=='1'){
	
	$cekuser = mysql_query("select * from m_cust where id_cust='$_POST[txkode]' ");		  
	$banyakrow = mysql_num_rows($cekuser);
	if ($banyakrow>0 ) {
	$errorx[] = "- User Name sudah terdaftar ";
	}else{
	$hasil=mysql_query("insert into `m_cust`(`id_cust`,`nm_cust`,`alm_cust`,`cp_cust`,`tlp_cust`,`fax_cust`,`hp_cust`,`email_cust`,`kdneg_cust`,`npwp_sp`,`sts_cust`) 
				values ( '$_POST[txkode]','$_POST[nmper]','$_POST[txalamat]','$_POST[txcp]','$_POST[txtlp]','$_POST[txfax]','$_POST[txhp]',
			'$_POST[txmail]','$_POST[kdneg]','$_POST[txnpwp]','Y');
			");
	mysql_query("update m_no set no_cust=no_cust + 1 ");
	}
}
//edit user
if ($_POST['exe']=='2'){
$hasil=mysql_query("update `m_cust` set `nm_cust`='$_POST[nmper]',`alm_cust`='$_POST[txalamat]',`cp_cust`='$_POST[txcp]',`tlp_cust`='$_POST[txtlp]',
`fax_cust`='$_POST[txfax]',`hp_cust`='$_POST[txhp]',`email_cust`='$_POST[txmail]',`kdneg_cust`='$_POST[kdneg]',`npwp_sp`='$_POST[txnpwp]' where `id_cust`='$_POST[txkode]'");
if ($hasil){ echo " Sukses merubah data";}
}

if ($_POST['exe']=='3'){
$hasil=mysql_query("update `m_cust` set `sts_cust`='T' where `id_cust`='$_POST[txkode]'");
if ($hasil){ echo " Sukses Merubah data";}
}

//$errorx[] = "- tanggal KB harus H-$_SESSION[exkbsetup] atau H+$_SESSION[exkbsetup] ";
if (isset($errorx)) {
	echo '  <br /> &nbsp; &nbsp; <b>Error</b>: <br />'.implode('<br />', $errorx);
}else{
?>
<script>window.location.href = 'index.php?h=<?=$_POST[hal]?>&link=df_customer.php' </script>
<?
}

}

//header('Location:index.php?h=1&link=df_user.php');
?>
