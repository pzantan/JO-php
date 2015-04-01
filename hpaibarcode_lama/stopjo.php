<?include_once "koneksi.php";
session_start();

if ($_POST['txgr'] < $_POST['txng']) {
	$errorx[] = "NG melebihi qty";
}
//$errorx[] = $_POST[nojo];
if (isset($errorx)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $errorx);
} else {
$hasil=mysql_query("update tr_jo set sts='y', endtime=now() where nojo='$_POST[nojo]'");
//$hasil=mysql_query("update tr_jodetail set sts='r', starttime=now(), pelaksana='$_POST[kduser]', qty='$_POST[tqty]' where nojo='$_POST[nojo]' and idproses='$_POST[noproses]'");
?>
Sukses !
<script>window.location.href = 'index.php?h=3&link=df_jo.php' </script>
<? } ?>