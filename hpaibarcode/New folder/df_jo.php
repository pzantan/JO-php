<? include_once "koneksi.php"; 
$qs=mysql_query("SELECT tr_c,tr_d,tr_i FROM tr_menulevel ml
left join m_menu m on ml.id_menu=m.id_menu
WHERE m.file ='$_GET[link]' and ml.id_level='$_SESSION[leveluser]'");
$dtijin=mysql_fetch_array($qs);

if ($_GET['pg']==""){
	$page=1;
	}else{
	$page=$_GET['pg'];
	}
	
	if ($_GET['cr']<>""){
	$tambhan=" and t.nojo like '%$_GET[cr]%' or  t.nojo like '%$_GET[cr]%' " ;
	}
	
	$per = 20;
	$pagek = $page-1; 
	$pages = $pagek*20;
	
	
	
	$qcount=mysql_query("SELECT COUNT(*) FROM tr_jo");
	$allcount=mysql_fetch_array($qcount);
	$banyak = $allcount[0];
	$all= ceil($banyak/$per);
	
	
?>
<h1>Data JO (<a href="index.php?h=<?=$_GET['h']?>&link=frm_addjo.php">Add +</a> )</h1>

	
	
	 Search JO <form action="index.php"> 
	 	 <input type='hidden' name="h" value="<?=$_GET['h']?>" />
	 <input type='hidden' name="link" value="df_jo.php" />
	 <input type="text" name="cr" value="<?=$_GET['cr']?>" />
	 </form>
	<br />
	
	<table id="table2" class="gtable detailtable">
		<thead>
		<tr>
		<th>JO No</th>
		<th>Date</th>
		<th>Part Name</th>
		<th>Qty</th>
		<th>Estimasi Time</th>
		<th>Customer</th>
		<th>Status</th>
		<th>&nbsp;</th>
		</tr>
		</thead>
		
	<? $s=1;
			$hasilqw=mysql_query("SELECT t.`nojo`, t.`tgljo`,t.`partnm`,t.`esttime`, p.`nmproses`, c.`nm_cust`,t.sts, t.qty FROM tr_jo t
LEFT JOIN mproses p ON t.`iproses`= p.`idproses`
LEFT JOIN m_cust c ON t.`idcust`=c.`id_cust` where t.sts<>'bukan apapa' $tambhan limit $pages,$per");
			while ($datatampil=mysql_fetch_array($hasilqw)){ 
			if ($datatampil['sts']=="i"){$status='Idle';}
			if ($datatampil['sts']=="r"){$status="<a href=index.php?h=$_GET[h]&link=frm_detailjo.php&idjo=$datatampil[nojo]>Running...</a>";}
			if ($datatampil['sts']=="y"){$status="Done";}
			?>
		<tr>
		<td><?=$datatampil['nojo']?></td>
		<td><?=$datatampil['tgljo']?></td>
		<td><?=$datatampil['partnm']?></td>
		<td><?=$datatampil['qty']?></td>
		<td><?=$datatampil['esttime']?></td>
		<td><?=$datatampil['nm_cust']?></td>
		<td><?=$status?></td>
		<td>
		<!--<a href="index.php?h=<?=$_GET['h']?>&link=frm_addmproses.php&usr=<?=$datatampil['idproses']?>">Edit</a>--> <?=$det?>
		<a href="#" onclick=window.open("pdf_jo.php?nojo=<?=$datatampil['nojo']?>","Ratting","scrollbars=yes,toolbar=no,status=1,width=1000,height=700")>Print</a>
		</td> 
		</tr>	
		<tr class="detail">
				<td colspan="6">
				<table>
					<thead>	<tr>
					<tr>
		<th>Code Sub processes</th>
		<th>Code processes</th>
		<th>Estimasi Time</th>
		<th>&nbsp;</th>
		</tr>		
			</tr>
				</thead>
				<tbody>
									<? 	$r=1;
									$hasildetail2=mysql_query("SELECT * FROM trproses t
LEFT JOIN mproses p ON t.`detpros`=p.`idproses` where t.mpros='$datatampil[idproses]' ");
									while ($datatetail2=mysql_fetch_array($hasildetail2)){ 
									?>
										<tr>
		<td><?=$datatetail2['idproses']?></td>
		<td><?=$datatetail2['nmproses']?></td>
		<td><?=$datatetail2['estitime']?></td>
		<td>
		<a href=""> X </a> </td> 
		</tr>	
									<? 
									$r++; } ?>
									</tbody>
								</table>
							</td>
						</tr>
	<?	$s++;	}
	?>	
		
	</table>
	
	<div class="tablefooter clearfix">
						<div class="pagination">
							<a href="index.php?h=<?=$_GET['h']?>&link=df_jo.php&pg=<?=$page-1?>">Prev</a>
							<?  
							//$urlnya = $_SERVER['REQUEST_URL']."&pg=1";
							for($z=1;$z<=$all;$z++){ 
							 if ((($page >= $z - 3) && ($page <= $z + 3)))
								{
							?><a href="index.php?h=<?=$_GET['h']?>&link=df_jo.php&pg=<?=$z?>"><?=$z?></a><? 
								}
								} ?>
							<a href="index.php?h=<?=$_GET['h']?>&link=df_jo.php&pg=<?=$page+1?>">Next</a>
						</div>
	</div>