<?
	
	if (date('Ymd')>20191212){
	header("location:login.php?err=erorr12");
	return;
	}
	session_start();
	//include_once "cssjs.php";
	//include_once "simclass.php";
	include_once "koneksi.php";
	//$objCon = new koneksidb();
	$capee="select * from m_user u left join m_userlevel l on  u.usr_level=l.id_level
	where usr_user='". $_POST["username"] ."' and usr_pass='". md5($_POST["txPsWord"]) ."'";
	$sqlLogin = mysql_query($capee);
	$r=mysql_fetch_array($sqlLogin);
	$banyak =mysql_num_rows($sqlLogin);
	//if($qryLogin = $objCon->GenQuery($sqlLogin)){
		if($banyak>0){
			//$rsConn = mysql_fetch_array($qryLogin);
			$_SESSION["login"]    = "LogNow";
			$_SESSION["userid"]   = $r["usr_user"] ;
			$_SESSION["usernm"]   = $r["usr_name"] ;
			$_SESSION["usernama"] = $r["usr_nama"] ;
			$_SESSION["leveluser"] = $r["usr_level"] ;
			$_SESSION["namaluser"] = $r["nm_level"] ;
			$_SESSION["dept"]   = $r["id_dept"] ;
			$_SESSION["nm_dept"]   = $r["nm_dep"] ;
			$_SESSION["nikuser"]   = $r["nik"] ;
			setcookie("cuserid",$rsConn["usr_id"] );
			//$sqlper = mysql_query("select * from m_setup");
			//$rsConn7 = mysql_fetch_array($sqlper);
			//$_SESSION["nm_per"]   = $rsConn7["nm_per"] ;
			//$_SESSION["alamat_per"]   = $rsConn7["alamat"] ;
			//$_SESSION["NPWP_per"]   = $rsConn7["NPWP"] ;
			//$_SESSION["noijin"]   = $rsConn7["noijin"] ;
			//$_SESSION["direktur"]   = $rsConn7["direktur"] ;
			//$_SESSION["apl"]   = $rsConn7["apl"] ;
			//$_SESSION["telppp"]   = $rsConn7["telp"] ;
			//$_SESSION["faxp"]   = $rsConn7["faxp"] ;
			//setcookie("cuserid",$rsConn["usr_id"] );
//			$_SESSION["dept"]   = $rsConn["usr_dept"] ;
//			$_SESSION["level"]  = $rsConn["usr_level"] ;
/*			$_SESSION["koders"] = $rsCon2["mr_rs"];
			$_SESSION["NAMARS"] = "APOTIK HOSANA MEDICA JATI MAKMUR";
			$_SESSION["ALMRS"] = "JL. JATI MAKMUR NO.27 PONDOK GEDE";
			$_SESSION["TLPRS"] = "Telp. (021) 8461050 (Hunting)  Fax.(021) 84990481	";		
			$_SESSION["KOTA"] = "Jakarta Timur";	
*/
//			$objCon->GenQuery("insert into sd_history values('". $_SESSION["userid"] ."','". $_SERVER['REMOTE_ADDR'] ."','Login','". date("Y-m-d") ."','". date("H:i:s") ."' )");
			
			//checkNoReg();	
			header("location:index.php");
		}else{
			//$_SESSION["errmsg"] = "1";
			header("location:login.php?err=1");
			//echo $capee;
		}
	//}else{
	//	echo "Error SQL Syntax!";
	//}
?>
