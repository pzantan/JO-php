<?include_once "koneksi.php";
session_start();
//$hasil=mysql_query("update tr_jo set sts='r' where nojo='$_POST[nojo]'");
$hasil=mysql_query("update tr_jodetail set sts='y', endtime=now(), ng='$_POST[tqty]' where nojo='$_POST[txkode]' and idproses='$_POST[txproses]'");
?>
Sukses !
<script>window.location.href = 'index.php?h=3&link=startjo.php' </script>
