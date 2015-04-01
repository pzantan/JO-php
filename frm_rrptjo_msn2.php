<?
include_once "koneksi.php";
//include_once "f_qtystok.php";
function getTanggaldb($tanggal){
		list($bln,$tgl,$thn) = explode("/",$tanggal) ;
		return $thn ."-". $bln ."-". $tgl ;
	}

//echo $_GET['pesno'];
$tanggal1 = getTanggaldb($_POST['tgl1']);
$tanggal2 = getTanggaldb($_POST['tgl2']);

//echo $_POST['liner']." $tanggal1 $tanggal2 ";

if ($_POST['txcust']<>"") { $tambahline = "and t.idmesin like '%$_POST[txcust]%' ";}

if ($_POST['short']=="1") { $tambahshort = " order by hb.no_tbprod ";}
if ($_POST['short']=="2") { $tambahshort = " order by br.part_no ";}
if ($_POST['short']=="3") { $tambahshort = " order by br.nm_brg ";}
if ($_POST['short']=="4") { $tambahshort = " order by hb.no_hdwo ";}
?>

<div id="divprint">
Report Machine  <br />
Tangal : <?=$tanggal1?> s/d <?=$tanggal2?> <br />
					<table id="table2" border="1" cellpadding="0" cellspacing="0" class="gtable detailtable">
						<thead>
						<tr>
						<th>No JO</th>
						<th>Nama Mesin</th>
						<th>Nama Proses</th>
						<th>Start Time</th>
						<th>End Time</th>
						<th>Estimasi</th>
						<th>Real</th>
						<th>Status</th>
						</tr>
						</thead>
						<? 	$r=1; $totreal=0;
						$hasildetail2=mysql_query("SELECT t.*, m.`nmmesin`,  p.`nmproses`, MINUTE(TIMEDIFF(t.`endtime`,t.`starttime` )) AS realtime FROM tr_jodetail t
LEFT JOIN m_mesin m ON t.`idmesin`=m.`idmesin`
LEFT JOIN mproses p ON t.`idproses`=p.`idproses`
where	
t.starttime  BETWEEN '$tanggal1' and '$tanggal2'  $tambahline
");
						while ($datatampil=mysql_fetch_array($hasildetail2)){
						if ($datatampil['sts']=="i"){$status="Idle"; $editer =$datatampil['nojo'] ;}
						if ($datatampil['sts']=="r"){$status="Running"; $editer = $datatampil['nojo'] ;}
						if ($datatampil['sts']=="y"){$status="Done"; $editer = $datatampil['nojo'] ;}
						?>
						<tbody>
						<tr>
									<td><?=$datatampil['nojo']?></td>
									<td><?=$datatampil['nmmesin']?></td>
									<td><?=$datatampil['nmproses']?></td>
									<td><?=$datatampil['starttime']?></td>
									<td><?=$datatampil['endtime']?></td>
									<td><?=$datatampil['estimasi']?></td>
									<td><?=$datatampil['realtime']?></td>
									<td><?=$status?></td>
						</tr>
						<? $r=$r+1; $totreal=$totreal+$datatampil['realtime']; }?>
						<tr>
									<td></td>
									<td>Total</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td><?=$totreal?></td>
									<td></td>
						</tr>
						</tbody>
					</table>
</div>

<div id="getdat">
</div>