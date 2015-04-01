<?include_once "koneksi.php";
session_start();

//$errorx[] = "- Sub processes Tidak boleh kosong";


if (isset($errorx)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $errorx);
} else {

$hasil=mysql_query("update tr_jo set sts='r' where nojo='$_POST[nojo]'");
$hasil=mysql_query("update tr_jodetail set sts='r', starttime=now(), pelaksana='$_POST[kduser]', qty='$_POST[tqty]', ng='$_POST[tqng]' where nojotr='$_POST[notrans]'");
$hasil2=mysql_query("INSERT INTO tr_jodetail2 (nojotr,nojo,idproses,estimasi,starttime,endtime,qty,fg,ng,pelaksana,idmesin)
SELECT nojotr,nojo,idproses,estimasi,starttime,endtime,qty,fg,ng,pelaksana,idmesin FROM tr_jodetail where nojotr='$_POST[notrans]';");
?>
Sukses !
<script>window.location.href = 'index.php?h=3&link=startjo.php' </script>
<? } ?>