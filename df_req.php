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
	$tambhan=" and (t.nojo like '%$_GET[cr]%' or  t.nojo like '%$_GET[cr]%') " ;
	}
	
	if ($_GET['txstatus']<>""){
	$tmb2=" and t.sts='$_GET[txstatus]'" ;
	}
	
	$per = 20;
	$pagek = $page-1; 
	$pages = $pagek*20;
	
	
	
	$qcount=mysql_query("SELECT COUNT(*) FROM tr_reg t where t.creatuser <>'bukan apapa' $tambhan $tmb2 ");
	$allcount=mysql_fetch_array($qcount);
	$banyak = $allcount[0];
	$all= ceil($banyak/$per);
	
	
?>
<h1>Data Cost Calculation (<a href="index.php?h=<?=$_GET['h']?>&link=frm_addreq.php">Add +</a>)</h1>
	<form action="index.php"> 
					<fieldset>
						<legend>Filter Cost Calculation </legend>
						<dl class="inline">
						<dt><label for="name">TDS No</label></dt>
							<dd>
								<input type="text" name="cr" value="<?=$_GET['cr']?>" id="" class="small" />
							</dd>
							<dt><label for="select2">Status</label></dt>
							<dd>
								<select id="select2" name="txstatus" class="medium" >
								<option value="">ALL - Status</option>
								<option value="i" <? if ($_GET[txstatus]=='i') {echo "selected";}?>>Idle</option>
								<option value="r" <? if ($_GET[txstatus]=='r') {echo "selected";}?>>Running</option>
								<option value="s" <? if ($_GET[txstatus]=='s') {echo "selected";}?>>Done</option>
								</select>
							</dd>
							<div class="buttons">
							<button type="submit" class="button">View</button>
							<input type='hidden' name="h" value="<?=$_GET['h']?>" />
							<input type='hidden' name="link" value="df_jo.php" />
						</div>
						</dl>
					</fieldset>
				</form>
	<br />
	Total Record : <?=$banyak?> 
	<table id="table2" class="gtable detailtable">
		<thead>
		<tr>
		<th>TDS No</th>
		<th>Date</th>
		<th>Description</th>
		<th>Qty</th>
		<th>Tool no </th>
		<th>Custpmer</th>
		<th>Status</th>
		<th>Proses</th>
		<th>&nbsp;</th>
		</tr>
		</thead>
		
	<? $s=1;
			$hasilqw=mysql_query("SELECT * FROM tr_reg t
LEFT JOIN m_cust c ON t.`id_cust`=c.`id_cust` 
where t.sts<>'bukan apapa' $tambhan $tmb2 ORDER BY t.tgl desc limit $pages,$per  ");
			while ($datatampil=mysql_fetch_array($hasilqw)){ 
			//if ($datatampil['sts']=="i"){$status="Idle"; $editer = "<a href=index.php?h=$_GET[h]&link=frm_addjo_edit.php&idjo=$datatampil[noreq]>$datatampil[noreq]</a>";}
			//if ($datatampil['sts']=="r"){$status="<a href=index.php?h=$_GET[h]&link=frm_detailjo.php&idjo=$datatampil[noreq]>Running...</a>"; $editer = $datatampil['noreq'] ;}
			//if ($datatampil['sts']=="y"){$status="Done"; $editer = $datatampil['noreq'] ;}
			?>
		<tr>
		<td><?=$datatampil['noreq']?></td>
		<td><?=$datatampil['tgl']?></td>
		<td><?=$datatampil['descrip']?></td>
		<td><?=$datatampil['qty']?></td>
		<td><?=$datatampil['toolno']?></td>
		<td><?=$datatampil['nm_cust']?></td>
		<td><?=$status?></td>
		<td><?=$datatampil['nmproses']?></td>
		<td>
		<!--<a href="index.php?h=<?=$_GET['h']?>&link=frm_addmproses.php&usr=<?=$datatampil['idproses']?>">Edit</a>--> <?=$det?>
		<a href="#" onclick=window.open("pdf_req.php?noreq=<?=$datatampil['noreq']?>","Ratting","scrollbars=yes,toolbar=no,status=1,width=1000,height=700")>Print</a>
		<a href="#" class="detail-link">Detail</a>
		</td> 
		</tr>	
		<tr class="detail">
				<td colspan="9">
				<table>
					<thead>	<tr>
					<tr>
		<th>Code Sub processes</th>
		<th>Code processes</th>
		<th>Estimasi Time</th>
		<th>Start Time</th>
		<th>End Time</th>
		<th>Real Time</th>
		<th>Status</th>
		</tr>		
			</tr>
				</thead>
				<tbody>
									<? 	$r=1;
									$hasildetail2=mysql_query("SELECT t.*, p.nmproses,  TIMEDIFF(t.`endtime`,t.`starttime` ) AS realtime  FROM tr_jodetail t
LEFT JOIN mproses p ON t.`idproses`=p.`idproses` where t.nojo='$datatampil[nojo]' ");
									while ($datatetail2=mysql_fetch_array($hasildetail2)){ 
								
								?>
										<tr>
		<td><?=$datatetail2['idproses']?></td>
		<td><?=$datatetail2['nmproses']?></td>
		<td><?=$datatetail2['estimasi']?></td>
		<td><?=$datatetail2['starttime']?></td>
		<td><?=$datatetail2['endtime']?></td>
		<td><?=$datatetail2['realtime']?></td>
		<td><?=$datatetail2['sts']?></td>
		
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
							<? if ($_GET['pg']>1) {?>
							<a href="index.php?h=<?=$_GET['h']?>&link=<?=$_GET['link']?>&txstatus=<?=$_GET['txstatus']?>&cr=<?=$_GET['cr']?>&pg=<?=$page-1?>">Prev</a>
							<?  }
							//$urlnya = $_SERVER['REQUEST_URL']."&pg=1";
							for($z=1;$z<=$all;$z++){ 
							 if ((($page >= $z - 3) && ($page <= $z + 3)))
								{
							?><a href="index.php?h=<?=$_GET['h']?>&link=<?=$_GET['link']?>&txstatus=<?=$_GET['txstatus']?>&cr=<?=$_GET['cr']?>&pg=<?=$z?>"><?=$z?></a><? 
								}
								} 
							if ($_GET['pg']<$all) {	
								?>
							<a href="index.php?h=<?=$_GET['h']?>&link=<?=$_GET['link']?>&txstatus=<?=$_GET['txstatus']?>&cr=<?=$_GET['cr']?>&pg=<?=$page+1?>">Next</a>
							<? } ?>
						</div>
	</div>