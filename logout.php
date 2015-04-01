<?
session_start();
//include_once "simclass.php";
//$oDb = new koneksidb;
//$oDb->GenQuery("insert into ar_history values('". $_SESSION["userid"] ."','". $_SERVER['REMOTE_ADDR'] ."','Logout','". date("Y-m-d") ."',now() )");
$_SESSION=array();
session_destroy();
header("location:login.php");
?>