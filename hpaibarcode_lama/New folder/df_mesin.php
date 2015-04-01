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
	$tambhan=" and idmesin like '%$_GET[cr]%' or  nmmesin like '%$_GET[cr]%' " ;
	}
	
	$per = 20;
	$pagek = $page-1; 
	$pages = $pagek*20;
	
	
	
	$qcount=mysql_query("SELECT COUNT(*) FROM m_mesin");
	$allcount=mysql_fetch_array($qcount);
	$banyak = $allcount[0];
	$all= ceil($banyak/$per);
	
	
?>
<h1>Data Machine  (<a href="index.php?h=<?=$_GET['h']?>&link=frm_addmesin.php">Add +</a> )</h1>

	
	
	 Search Machine <form action="index.php"> 
	 	 <input type='hidden' name="h" value="<?=$_GET['h']?>" />
	 <input type='hidden' name="link" value="df_mesin.php" />
	 <input type="text" name="cr" value="<?=$_GET['cr']?>" />
	 </form>
	<br />
	
	<table id="table2" class="gtable detailtable">
		<thead>
		<tr>
		<th>No </th>
		<th>Code Machine</th>
		<th>Description</th>
		<th>Type</th>
		<th>Year</th>
		<th>Remarks</th>
		<th>&nbsp;</th>
		</tr>
		</thead>
		
	<? $s=1;
			$hasilqw=mysql_query("SELECT * FROM m_mesin where sts='Y' $tambhan limit $pages,$per");
			while ($datatampil=mysql_fetch_array($hasilqw)){ ?>
		<tr>
		<td><?=$s?> </th>
		<td><?=$datatampil['idmesin']?></td>
		<td><?=$datatampil['nmmesin']?></td>
		<td><?=$datatampil['mtype']?></td>
		<td><?=$datatampil['thnpembuatan']?></td>
		<td><?=$datatampil['ket']?></td>
		<td>
		<a href="index.php?h=<?=$_GET['h']?>&link=frm_addmesin.php&usr=<?=$datatampil['idmesin']?>">Edit</a> 
		/ <a href="#" class="detail-link">Delete</a></td>
		</tr>	
		<tr class="detail">

						</tr>
	<?	$s++;	}
	?>	
		
	</table>
	
	<div class="tablefooter clearfix">
						<div class="pagination">
							<a href="index.php?h=<?=$_GET['h']?>&link=df_mesin.php&pg=<?=$page-1?>">Prev</a>
							<?  
							//$urlnya = $_SERVER['REQUEST_URL']."&pg=1";
							for($z=1;$z<=$all;$z++){ 
							 if ((($page >= $z - 3) && ($page <= $z + 3)))
								{
							?><a href="index.php?h=<?=$_GET['h']?>&link=df_mesin.php&pg=<?=$z?>"><?=$z?></a><? 
								}
								} ?>
							<a href="index.php?h=<?=$_GET['h']?>&link=df_mesin.php&pg=<?=$page+1?>">Next</a>
						</div>
	</div>