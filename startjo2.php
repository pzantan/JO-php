<? include_once "koneksi.php"; 
?>
<h1>Running JO <?=$_GET['nojo']?> </h1>
	 User<form action="index.php"> 
	<input type='hidden' name="h" value="<?=$_GET['h']?>" />
	<input type='hidden' name="link" value="startjo2.php" />
	<input type="text" name="cr" value="<?=$_GET['cr']?>" />
	<input type="hidden" name="nojo" value="<?=$_GET['nojo']?>" />
	<input type="hidden" name="noproses" value="<?=$_GET['noproses']?>" />
	<input type="hidden" name="tqty" value="<?=$_GET['tqty']?>" />
	<input type="hidden" name="tqng" value="<?=$_GET['tqng']?>" />
	<input type="hidden" name="notrans" value="<?=$_GET['notrans']?>" />
	</form>
	<br />
<?
if ($_GET['cr']<>""){
$cekuser = mysql_query("select * from m_user where nik='$_GET[cr]' ");		  
$banyakrow = mysql_num_rows($cekuser);
	if ($banyakrow>0 ) {
$crkpi=mysql_query("select * from m_user where nik='$_GET[cr]'");
$dtjo=mysql_fetch_array($crkpi);?>
<form id="myForm" NAME="myForm" class="uniform" action="updaterunproses.php" method="POST">
<table width='50%'>
			<tr> <td> <b> User Name</b> </td><td> :  </td><td>  <?=$dtjo[usr_nama]?></td> <td>  </td><td><input type="hidden" name="kduser" value="<?=$dtjo[nik]?>" / </td><td> </td> </tr>
</table>
<br />
<table width='100%'>
	<tr><th>Code Sub processes</th><th>Code processes</th><th>Estimasi Time</th><th>Mechine</th></tr>
	<? 	$r=1;
									$hasildetail2=mysql_query("SELECT t.*, p.nmproses, m.`nmmesin`,p.idmesin FROM tr_jodetail t 
LEFT JOIN mproses p ON t.`idproses`=p.`idproses`
LEFT JOIN m_mesin m ON p.`idmesin` = m.`idmesin`
WHERE t.nojotr='$_GET[notrans]' ");
									while ($datatetail2=mysql_fetch_array($hasildetail2)){ 
									?>
		<tr>
		<td><?=$datatetail2['idproses']?></td>
		<td><?=$datatetail2['nmproses']?></td>
		<td><?=$datatetail2['estimasi']?> Menit</td>
		<td>
		<select id="sele" name="txmac" class="medium" >
								<? 
								$hasil9=mysql_query("SELECT * FROM m_mesin");
								while ($datatampil9=mysql_fetch_array($hasil9)){ ?>
									<option <? if($datatetail2['idmesin']== $datatampil9['idmesin']){echo "selected=\"selected\"" ;} ?> value="<?=$datatampil9['idmesin']?>"><?=$datatampil9['nmmesin']?></option>
								<? } ?>
								</select>
		</td> 
		</tr>
		<? $r++; } ?>
</table>
<br />
<div class="buttons">
<input type="hidden" name="nojo" value="<?=$_GET['nojo']?>" />
<input type="hidden" name="noproses" value="<?=$_GET['noproses']?>" />
<button type="submit" class="button">Run Proccess</button>
<input type="hidden" name="tqty" value="<?=$_GET['tqty']?>" />
<input type="hidden" name="tqng" value="<?=$_GET['tqng']?>" />
<input type="hidden" name="notrans" value="<?=$_GET['notrans']?>" />
</div>
</form>
<? }} ?>