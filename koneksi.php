<?php
$server="127.0.0.1";
$username="root";
$password="";
$database="hpai_jo";
$hrislink = mysql_connect($server,$username,$password) or die (mysql_error());
mysql_select_db($database) or die (mysql_error());
//
/*
if($_SESSION['depotr']=='' and $txtusername=='' ){
 ?>
    <script>
	alert('Mohon Login ulang, session anda expired');
	location.href='expiredlog.php';	
	
	</script>
<?	
session_destroy();

}*/
?>
