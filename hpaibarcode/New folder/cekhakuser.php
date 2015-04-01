<?
session_start();
if(!isset($_SESSION["login"]) || $_SESSION["login"]!="LogNow"){
	
header("location:login.php");
//echo "belum login";
}
?>
