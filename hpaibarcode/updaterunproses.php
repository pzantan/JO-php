<?include_once "koneksi.php";
session_start();

$hasil=mysql_query("update tr_jo set sts='r' where nojo='$_POST[nojo]'");
$hasil=mysql_query("update tr_jodetail set sts='r', starttime=now(), pelaksana='$_POST[kduser]', qty='$_POST[tqty]' where nojo='$_POST[nojo]' and idproses='$_POST[noproses]'");
?>
Sukses !
<script>window.location.href = 'index.php?h=3&link=startjo.php' </script>
