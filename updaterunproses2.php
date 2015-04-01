<?include_once "koneksi.php";
session_start();

$kurang=$_POST['txqty']-($_POST['txfg']+$_POST['txng']);

if ($_POST['txfg'] + $_POST['txng']== '0') {
	$errorx[] = "- Finish Good dan NG Harus di input";
} else {
	//$errorx[] = "- Finish Good = $_POST[txfg] sisa $_POST[txqty] Total $_POST[txtot] kurang $kurang";
}

if (($_POST['txfg'] + $_POST['txng'])>$_POST['txqty']) {
	$errorx[] = "- Finish melebihi Qty" ;
}

//$errorx[] ="cek  $_POST[txng] kurang = $kurang ";
if (isset($errorx)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $errorx);
} else {

//$hasil=mysql_query("update tr_jo set sts='r' where nojo='$_POST[nojo]'");
		if ($kurang==0){
		$hasil=mysql_query("update tr_jodetail set sts='y', endtime=now(), fg=fg+'$_POST[txfg]', ng=ng+'$_POST[txng]' where nojotr='$_POST[txkode]'");
		}else{
		$hasil=mysql_query("update tr_jodetail set sts='i', endtime=now(), fg=fg+'$_POST[txfg]', ng=ng+'$_POST[txng]'  where nojotr='$_POST[txkode]'");
		}
		$hasil=mysql_query("update tr_jodetail2 set sts='y', endtime=now(), fg='$_POST[txfg]', ng='$_POST[txng]' where nojotr='$_POST[txkode]' and sts='r'");
		$hasil=mysql_query("update tr_jo set ng=ng+'$_POST[txng]'  where nojo='$_POST[txkodejo]'");
?>
Sukses !
<script>window.location.href = 'index.php?h=3&link=startjo.php' </script>
<? } ?>