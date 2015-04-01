<?
include_once "koneksi.php";
session_start();
//tambah user

if ($_POST['pilmenu']== '') {
	$errorx[] = "- Harus memilih menu";
}


if (isset($errorx)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $errorx);
} else {
	//echo "$_POST[idlev] -- $_POST[pilmenu] -- $_POST[txadd] -- $_POST[txedit] -- $_POST[txdel] cobaaa ";
	
	$cekuser = mysql_query("SELECT * FROM tr_menulevel WHERE id_level='$_POST[idlev]' and id_menu='$_POST[pilmenu]'");		  
	$banyakrow = mysql_num_rows($cekuser);
	if ($banyakrow>0 ) {
	$errorx[] = "- Menu tersebut sudah ada ";
	}else{
	$hasil=mysql_query("insert into `tr_menulevel`(`id_level`,`id_menu`,`tr_c`,`tr_d`,`tr_i`) values ( '$_POST[idlev]','$_POST[pilmenu]','$_POST[txadd]','$_POST[txedit]','$_POST[txdel]')");
	}
	if (isset($errorx)) {
	echo '  <b>Error</b>: <br />'.implode('<br />', $errorx);
	}else{
	echo "Sukses";
	?>
	
	<script>window.location.href = 'index.php?h=1&link=df_level.php' </script>
	<?
	}
	
}

//header('Location:index.php?h=1&link=df_user.php');
?>
