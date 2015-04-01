<? include_once "koneksi.php"; 
?>
<h1>Proccess Running JO </h1>
	<br />
	
	<table id="table2" class="gtable detailtable">
		<thead>
		<tr>
		<th>JO No</th>
		<th>Time Start</th>
		<th>Part Name</th>
		<th>Proccess</th>
		<th>Mechine</th>
		<th>Customer</th>
		<th>User</th>
		<th>&nbsp;</th>
		</tr>
		</thead>
		
	<? $s=1;
			$hasilqw=mysql_query("SELECT t.*, p.nmproses, m.`nmmesin`, h.partnm, c.nm_cust FROM tr_jodetail t 
LEFT JOIN mproses p ON t.`idproses`=p.`idproses` 
LEFT JOIN m_mesin m ON p.`idmesin` = m.`idmesin` 
left join tr_jo h on t.nojo=h.nojo
LEFT JOIN m_cust c ON h.`idcust`=c.`id_cust`
where  t.sts='r'");
			while ($datatampil=mysql_fetch_array($hasilqw)){ 
			?>
		<tr>
		<td><?=$datatampil['nojo']?></td>
		<td><?=$datatampil['starttime']?></td>
		<td><?=$datatampil['partnm']?></td>
		<td><?=$datatampil['nmproses']?></td>
		<td><?=$datatampil['nmmesin']?></td>
		<td><?=$datatampil['nm_cust']?></td>
		<td><?=$status?></td>
		<td>		</td> 
		</tr>	
		<tr class="detail">
				<td colspan="6">
				</td>
						</tr>
	<?	$s++;	}
	?>	
		
	</table>