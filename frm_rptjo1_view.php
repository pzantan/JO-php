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
Report Job Order  <br />
Tangal : <?=$tanggal1?> s/d <?=$tanggal2?> <br />
					<table id="table2" border="1" cellpadding="0" cellspacing="0" class="gtable detailtable">
						<thead>
						<tr>
						<th>No </th>
						<th>No JO </th>
						<th>No SO </th>
						<th>Part Name</th>
						<th>JO Masuk</th>
						<th>Deadline</th>
						<th>Finish</th>
						<th></th>
						</tr>
						</thead>
						<? 	$r=1;
						$hasildetail2=mysql_query("SELECT * FROM tr_jo where	tgljo  BETWEEN '$tanggal1' and '$tanggal2' ");
						while ($datatampil=mysql_fetch_array($hasildetail2)){
						if ($datatampil['sts']=="i"){$status="Idle"; $editer =$datatampil['nojo'] ;}
						if ($datatampil['sts']=="r"){$status="Running"; $editer = $datatampil['nojo'] ;}
						if ($datatampil['sts']=="y"){$status="Done"; $editer = $datatampil['nojo'] ;}
						?>
						<tbody>
						<tr>
									<td><?=$r?></td>
									<td><?=$datatampil['nojo']?></td>
									<td><?=$datatampil['noso']?></td>
									<td><?=$datatampil['partnm']?></td>
									<td><?=$datatampil['tgljo']?></td>
									<td><?=$datatampil['tgldel']?></td>
									<td><?=$datatampil['endtime']?></td>
									<td><?=$status?></td>
						</tr>
						<? $r=$r+1; }?>
						</tbody>
					</table>
</div>

<div id="getdat">
</div>