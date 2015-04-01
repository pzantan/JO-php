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

if ($_POST['txcust']<>"") { $tambahline = "and t.idcust like '%$_POST[txcust]%' ";}

if ($_POST['short']=="1") { $tambahshort = " order by hb.no_tbprod ";}
if ($_POST['short']=="2") { $tambahshort = " order by br.part_no ";}
if ($_POST['short']=="3") { $tambahshort = " order by br.nm_brg ";}
if ($_POST['short']=="4") { $tambahshort = " order by hb.no_hdwo ";}
?>

<div id="divprint">
Report Rekap Job Order Percustomer <br />
Tangal : <?=$tanggal1?> s/d <?=$tanggal2?> <br />
					<table id="table2" border="1" cellpadding="0" cellspacing="0" class="gtable detailtable">
						<thead>
						<tr>
						<th>No </th>
						<th>Customer</th>
						<th>Qty</th>
						<th>Jo count</th>
						<th></th>
						</tr>
						</thead>
						<? 	$r=1;
						$hasildetail2=mysql_query("SELECT t.`idcust`, c.`nm_cust`,t.sts, t.qty, SUM(t.qty) AS jumlahtools, COUNT(t.`nojo`) AS jmljo FROM tr_jo t
LEFT JOIN mproses p ON t.`iproses`= p.`idproses`
LEFT JOIN m_cust c ON t.`idcust`=c.`id_cust`
where	
t.tgljo  BETWEEN '$tanggal1' and '$tanggal2'  $tambahline

GROUP BY t.`idcust` ORDER BY c.`nm_cust`
");
						while ($datatampil=mysql_fetch_array($hasildetail2)){
						if ($datatampil['sts']=="i"){$status="Idle"; $editer =$datatampil['nojo'] ;}
						if ($datatampil['sts']=="r"){$status="Running"; $editer = $datatampil['nojo'] ;}
						if ($datatampil['sts']=="y"){$status="Done"; $editer = $datatampil['nojo'] ;}
						?>
						<tbody>
						<tr>
									<td><?=$r?></td>
									<td><?=$datatampil['nm_cust']?></td>
									<td><?=$datatampil['jumlahtools']?></td>
									<td><?=$datatampil['jmljo']?></td>
									<td><a href="detailjo_cust.php?cust=<?=$datatampil['idcust']?>&tgl1=<?=$tanggal1?>&tgl2=<?=$tanggal2?>" id="munx" title="Add Month Schedule"> Detail </a></td>
						</tr>
						<? $r=$r+1; }?>
						</tbody>
					</table>
</div>

<div id="getdat">
</div>