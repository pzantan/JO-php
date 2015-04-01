<? include_once "koneksi.php"; 
?>
<h1>Running JO </h1>
	 Search JO <form action="index.php"> 
	<input type='hidden' name="h" value="<?=$_GET['h']?>" />
	<input type='hidden' name="link" value="startjo.php" />
	<input type="text" name="cr" value="<?=$_GET['cr']?>" />
	</form>
	<br />
<?
if ($_GET['cr']<>""){
$crkpi=mysql_query("SELECT t.*, p.`nmproses`, c.`nm_cust` FROM tr_jo t
LEFT JOIN mproses p ON t.`iproses`= p.`idproses`
LEFT JOIN m_cust c ON t.`idcust`=c.`id_cust` where nojo='$_GET[cr]'");
$dtjo=mysql_fetch_array($crkpi);

if ($dtjo[nojo]<>""){
$crpros=mysql_query("SELECT t.*, p.nmproses, m.`nmmesin` FROM tr_jodetail t 
LEFT JOIN mproses p ON t.`idproses`=p.`idproses` 
LEFT JOIN m_mesin m ON p.`idmesin` = m.`idmesin` where  t.nojo='$_GET[cr]' and t.sts='r'");


$dtrun=mysql_fetch_array($crpros);
if ($dtrun[nojo]<>""){
?>
<form id="myForm" NAME="myForm" class="uniform" action="updaterunproses2.php" method="POST">
<table width='100%'>
			<tr> <td> <b> JO NO </b> </td><td> :  </td><td>  <?=$dtrun[nojo]?></td> <td>  </td>
			<td> <input type="hidden"  <?=$read?> value="<?=$dtrun[nojotr]?>"  id="txkode" name="txkode" class="small required" size="10" /> 
			<input type="hidden"  <?=$read?> value="<?=$dtrun[nojo]?>"  id="txkodejo" name="txkodejo" class="small required" size="10" />  </td><td> </td> </tr>
			
			<tr> <td> <b> Proses Name  </b> </td><td> :  </td><td> <?=$dtrun[idproses]?> <input type="hidden"  <?=$read?> value="<?=$dtrun[idproses]?>"  id="idproses" name="txproses" class="small required" size="10" /> </td> 
			<td>  <b> Start Time  </b> </td><td>: </td><td> <?=$dtrun[starttime]?> </td> </tr>
			
			<tr><td> <b>Proses</b> </td><td> :  </td><td> <?=$dtrun[nmproses]?> </td> 
			 <td> <b> Mechine </b> </td><td> :  </td><td> <?=$dtrun[nmmesin]?> </td> </tr>
			
			<tr> <td> <b> Sisa Quantity  </b> </td><td> :  </td><td> <?=$dtrun[qty]-($dtrun[fg]+$dtrun[ng])?> <input type="hidden"  <?=$read?> value="<?=$dtrun[qty]-($dtrun[fg]+$dtrun[ng])?>"  id="txqty" name="txqty" class="small required" size="10" /></td> 
			<td> <b>Total Qty </b> </td><td> :  </td><td> <?=$dtrun[qty]-$dtrun[ng]?> /  <?=$dtrun[ng]?> <input type="hidden"  <?=$read?> value="<?=$dtrun[qty]-$dtrun[ng]?>"  id="txtot" name="txtot" class="small required" size="10" /> </td> </tr>
			<tr> <td> <b>Finis Good </b> </td><td> :</td><td> <input type="text"  <?=$read?> value="0"  id="txfg" name="txfg" class="small required" size="10" /> </td> 
			<td> <b> NG </b> </td><td> :  </td><td> <input type="text"  <?=$read?> value="0"  id="txng" name="txng" class="small required" size="10" /></td> 
			</tr>
</table>
<div class="buttons">
<button type="submit" class="button">End Proccess</button>
</div>
</form>
<?}else{?>
<table width='100%'>
			<tr> <td> <b> JO NO </b> </td><td> :  </td><td>  <?=$dtjo[nojo]?></td> <td>  </td><td> <input type="hidden"  <?=$read?> value="<?=$dtjo[nojo]?>"  id="txkode" name="txkode" class="small required" size="10" />  </td><td> </td> </tr>
			<tr> <td> <b> Part Name  </b> </td><td> :  </td><td> <?=$dtjo[partnm]?> </td> <td> <b>Process Date </b> </td><td> :  </td><td> <?=$dtjo[tgljo]?>	 </td> </tr>
			<tr> <td> <b> Customer  </b> </td><td> :  </td><td> <?=$dtjo[nm_cust]?> </td> <td> <b>Proses</b> </td><td> :  </td><td> <?=$dtjo[nmproses]?> </td> </tr>
			<tr> <td> <b> Quantity  </b> </td><td> :  </td><td> <?=$dtjo[qty]?> </td> <td> <b>Delevery Date</b> </td><td> :  </td><td> <?=$dtjo[tgldel]?> </td> </tr>
</table>
<br />
<table width='100%'>
	<tr><th>Code Sub processes</th><th>Code processes</th><th>Estimasi Time</th><th>Qty</th><th>Finish Good</th><th>NG</th><th>&nbsp;</th></tr>
	<? 	$r=1;
									$hasildetail2=mysql_query("SELECT t.*, p.nmproses, m.`nmmesin` FROM tr_jodetail t 
LEFT JOIN mproses p ON t.`idproses`=p.`idproses`
LEFT JOIN m_mesin m ON p.`idmesin` = m.`idmesin`
WHERE nojo='$dtjo[nojo]' ");
									while ($datatetail2=mysql_fetch_array($hasildetail2)){ 
									?>
		<tr>
		<td><?=$datatetail2['idproses']?></td>
		<td><?=$datatetail2['nmproses']?></td>
		<td><?=$datatetail2['estimasi']?> Menit</td>
		<td><?=$datatetail2['qty']?></td>
		<td><?=$datatetail2['fg']?></td>
		<td><?=$datatetail2['ng']?></td>
		<td>
		<? if ($datatetail2['sts']=="i"){ ?>
		<a href="index.php?h=<?=$_GET['h']?>&link=startjo2.php&nojo=<?=$dtjo[nojo]?>&noproses=<?=$datatetail2['idproses']?>&tqty=<?=$dtjo[qty]?>&tqng=<?=$dtjo[ng]?>&notrans=<?=$datatetail2['nojotr']?>"> Run </a> </td> 
		<?}else{ ?>
		Done !
		<?} ?>
		</tr>
		<? $r++; } ?>
</table>
<? }

}else{ ?>
JO No Not Found
<?} } ?>