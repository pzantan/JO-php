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
	$tambhan=" and p.kdcoating like '%$_GET[cr]%' or  nmcoating like '%$_GET[cr]%' " ;
	}
	
	$per = 20;
	$pagek = $page-1; 
	$pages = $pagek*20;
	
	
	
	$qcount=mysql_query("SELECT COUNT(*) FROM mcoating p where 'cumi'='cumi' $tambhan ");
	$allcount=mysql_fetch_array($qcount);
	$banyak = $allcount[0];
	$all= ceil($banyak/$per);
	
	
?>
<h1>Data Coating (<a href="index.php?h=<?=$_GET['h']?>&link=frm_addcout.php">Add +</a> )</h1>

	
	
	 Search Coating <form action="index.php"> 
	 	 <input type='hidden' name="h" value="<?=$_GET['h']?>" />
	 <input type='hidden' name="link" value="df_cout.php" />
	 <input type="text" name="cr" value="<?=$_GET['cr']?>" />
	 </form>
	<br />
	
	<table id="table2" class="gtable detailtable">
		<thead>
		<tr>
		<th>Code Coating</th>
		<th>Description</th>
		<th>Price</th>
		<th>&nbsp;</th>
		</tr>
		</thead>
		
	<? $s=1;
			$hasilqw=mysql_query("SELECT * FROM mcoating p where 'cumi'='cumi' $tambhan limit $pages,$per");
			while ($datatampil=mysql_fetch_array($hasilqw)){ 
			//if ($datatampil['jnsproses']=="1") { $jns = "Main Proses"; $det = "<a href=\"index.php?h=$_GET[h]&link=frm_adddetpros.php&usr=$datatampil[idproses]\">Add Detail</a> <a href=\"#\" class=\"detail-link\">Det</a>";
			//} else { 
			//$jns = "Sub Proses"; $det="";
			//}
			
			?>
		<tr>
		<td><?=$datatampil['kdcoating']?></td>
		<td><?=$datatampil['nmcoating']?></td>
		<td><?=$datatampil['price']?></td>
		<td>
		<a href="index.php?h=<?=$_GET['h']?>&link=frm_addcout.php&usr=<?=$datatampil['kdcoating']?>">Edit</a> <?=$det?></td> 
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
									</tbody>
								</table>
							</td>
						</tr>
	<?	$s++;	}
	?>	
		
	</table>
	
	<div class="tablefooter clearfix">
						<div class="pagination">
							<a href="index.php?h=<?=$_GET['h']?>&link=df_cout.php&pg=<?=$page-1?>">Prev</a>
							<?  
							//$urlnya = $_SERVER['REQUEST_URL']."&pg=1";
							for($z=1;$z<=$all;$z++){ 
							 if ((($page >= $z - 3) && ($page <= $z + 3)))
								{
							?><a href="index.php?h=<?=$_GET['h']?>&link=df_cout.php&pg=<?=$z?>"><?=$z?></a><? 
								}
								} ?>
							<a href="index.php?h=<?=$_GET['h']?>&link=df_cout.php&pg=<?=$page+1?>">Next</a>
						</div>
	</div>