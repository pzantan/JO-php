<? include_once "koneksi.php";
			$cekinfo=mysql_query("SELECT count(*) as jmlcoun FROM hdkpicard where reportto='$_SESSION[nikuser]' and sts_app='I'");
			$dtinfo=mysql_fetch_array($cekinfo);
			$jmlinfo = $dtinfo['jmlcoun'];
			if ($jmlinfo>0) {
?>
			<article id="dashboard">
			<h1>Alert!!! <?=$_SESSION[nikuser]?></h1>
			<table id="table2" class="gtable detailtable">
		<thead>
		<tr>
		<th>NIK</th>
		<th>Name</th>
		<th>Input Time</th>
		<th>&nbsp;</th>
		</tr>
		</thead>
		
	<?
			$crkpi=mysql_query("SELECT h.*, k.namakaryawan FROM hdkpicard h
left join mkaryawan k on h.nik=k.nik
where reportto='$_SESSION[nikuser]' and sts_app='I'");
			while ($dtnkpi=mysql_fetch_array($crkpi)){;
			?>
		<tr>
		<td><?=$dtnkpi['nik']?></td>
		<td><?=$dtnkpi['namakaryawan']?></td>
		<td><?=$dtnkpi['tglinput']?></td>
		<td><a href="index.php?h=<?=$_GET['h']?>&link=frm_addkpicardapp.php&notran=<?=$dtnkpi['nokpicard']?>"> App </a> </td>
		</tr>	
		<? } ?>
	</table>
			</article>
			<? } ?>