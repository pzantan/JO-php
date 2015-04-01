<? include_once "koneksi.php"; 
$qs=mysql_query("SELECT tr_c,tr_d,tr_i FROM tr_menulevel ml
left join m_menu m on ml.id_menu=m.id_menu
WHERE m.file ='$_GET[link]' and ml.id_level='$_SESSION[leveluser]'");
$dtijin=mysql_fetch_array($qs);?>
<h1>Tabel Customer </h1>
	<? if ($dtijin[tr_c]=='y') { ?>  <a href="index.php?h=<?=$_GET['h']?>&link=frm_addcust.php">Add </a> <? } ?>
	<table id="table2" class="gtable detailtable">
		<thead>
		<tr>
		<th>No </th>
		<th>Company Code</th>
		<th>Company</th>
		<th>Contact Person</th>
		<th>&nbsp;</th>
		</tr>
		</thead>
		
	<? $s=1;
			$hasilqw=mysql_query("SELECT * FROM m_cust s left JOIN m_negara n on s.kdneg_cust=n.kd_neg where sts_cust='Y'");
			while ($datatampil=mysql_fetch_array($hasilqw)){ ?>
		<tr>
		<td><?=$s?> </th>
		<td><?=$datatampil['id_cust']?></td>
		<td><?=$datatampil['nm_cust']?></td>
		<td><?=$datatampil['cp_cust']?></td>
		<td>
		<? if ($dtijin[tr_d]=='y') { ?> <a href="index.php?h=<?=$_GET['h']?>&link=frm_addcust.php&cusid=<?=$datatampil['id_cust']?>">Edit</a> <? } ?>
		/ <? if ($dtijin[tr_d]=='y') { ?> <a href="index.php?h=<?=$_GET['h']?>&link=frm_delcust.php&cusid=<?=$datatampil['id_cust']?>">Delete</a> <? } ?>
		/ <a href="#" class="detail-link">Detail</a>
		</td>	
		</tr>
				<tr class="detail">
							<td colspan="7">
								<table>
									<tbody>	<tr>
											<th width="20%">Company Code</th>
											<th width="80%"><?=$datatampil['id_cust']?></th>
											</tr>
											
											<tr>
											<th>Company</th>
											<th><?=$datatampil['nm_cust']?></th>
											</tr>
											
											<tr>
											<th>Contact Person</th>
											<th><?=$datatampil['cp_cust']?></th>
											</tr>
											
											<tr>
											<th>Address</th>
											<th><?=$datatampil['alm_cust']?></th>
											</tr>
											
											<tr>
											<th>Telp No.</th>
											<th><?=$datatampil['tlp_cust']?></th>
											</tr>
											
											<tr>
											<th>Fax No.</th>
											<th><?=$datatampil['fax_cust']?></th>
											</tr>
											
											<tr>
											<th>Mobile No.</th>
											<th><?=$datatampil['hp_cust']?></th>
											</tr>
											
											<tr>
											<th>e-mail</th>
											<th><?=$datatampil['email_cust']?></th>
											</tr>
											
											<tr>
											<th>Country</th>
											<th><?=$datatampil['nm_neg']?></th>
											</tr>
											
											<tr>
											<th>NPWP</th>
											<th><?=$datatampil['npwp_sp']?></th>
											</tr>
											
									</tbody>
								</table>
							</td>
						</tr>	

	<?	$s++;	}
	?>	
		
	</table>