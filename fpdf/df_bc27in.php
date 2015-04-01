<? include_once "koneksi.php"; ?>
<h1>Tabel BC 27 IN </h1> 
	<a href="index.php?h=<?=$_GET[h]?>&link=frm_addbc27in.php"> Input BC IN </a>
	<table id="table2" class="gtable detailtable">
		<thead>
		<tr>
		<th>No BC</th>
		<th>Tgl BC 27</th>
		<th>Customer</th>
		<th>Status</th>
		<th>&nbsp;</th>
		</tr>
		</thead>
		
	<? $s=1;
			$hasilqw=mysql_query("SELECT no_bc27, tgl_bc27, nama as nm_cust FROM hd_bc27in b 
left JOIN view_suppcust c on b.id_cust=c.kode");
			while ($datatampil=mysql_fetch_array($hasilqw)){
		if ($datatampil['no_bc27']=='') { $stat="<a href=\"index.php?h=$_GET[h]&link=frm_addbc27in.php&sjcust=$datatampil[no_sjincust]\"> Input BC </a>" ; 
		} 
		else {$stat="<a href=\"#\" onclick=window.open(\"isipdf2.php?nobc=$datatampil[no_bc27]\",\"Ratting\",\"scrollbars=yes,toolbar=no,status=1\")>Print</a>";
		$inp ="<a href=\"index.php?h=$_GET[h]&link=frm_addwocust.php&sjcust=$datatampil[no_sjincust]\"> Input WO Cust </a>";
		}
			?>
		<tr>
		<td><?=$datatampil['no_bc27']?></th>
		<td><?=$datatampil['tgl_bc27']?></td>
		<td><?=$datatampil['nm_cust']?></td>
		<td><?=$stat?> </td>
		<td>
		<a href="#" class="detail-link">Detail</a>
		</td>	
		</tr>
					<tr class="detail">
							<td colspan="7">
								<table>
									<thead>	<tr>
											
											<th>NO WO</th>
											<th>Part No</th>
											<th>Part Name</th>
											<th>Jumlah</th>
											<th>Sat</th>
											<th>Terkirim</th>
												
											</tr>
									</thead>
									<tbody>
									<? 	$r=1;
									$hasildetail2=mysql_query("SELECT * FROM tr_woin t left join m_barang b on t.brg_trwo=b.kd_brg where nosjin='$datatampil[no_sjincust]'");
									while ($datatetail2=mysql_fetch_array($hasildetail2)){ ?>
										<tr>											
											<td><?=$datatetail2['nowo']?></td>
											<td><?=$datatetail2['part_no']?></td>
											<td><?=$datatetail2['nm_brg']?></td>
											<td><?=$datatetail2['qty_trwo']?></td>
											<td><?=$datatetail2['sat_brg']?></td>
											<td><?=$datatetail2['pengurang']?></td>											
										</tr>
									<? $r++; } ?>
									</tbody>
								</table>
							</td>
						</tr>

	<?	$s++;	}
	?>	
		
	</table>