<? include_once "koneksi.php"; ?>
<table id="table2" class="gtable detailtable">
						<thead>
						<tr>
						<th>Sub Proses</th>
						<th>Estimasi</th>
						<th>Mesin</th>
						<th>&nbsp;</th>
						</tr>
						</thead>
						<? 	$r=1;
									$hasildetail=mysql_query("SELECT * FROM trproses t
LEFT JOIN mproses p ON t.`detpros`=p.`idproses`
LEFT JOIN m_mesin m ON p.`idmesin`=m.`idmesin`
 where t.mpros='$_GET[cba]'");
									while ($datatetail=mysql_fetch_array($hasildetail)){ 
						?>
						<tbody>
						<tr>
						<td><input type='hidden' value='<?=$datatetail['idproses']?>' name='kdbrgtx[]' /><input readonly="readonly" type='text' value='<?=$datatetail['nmproses']?>' name='nmbrgtx[]' /></td>
						<td><input type='text' value='<?=$datatetail['estitime']?>' name='qtytx[]' size="4"  /> Minute </td>
						<td><input type='text' value='<?=$datatetail['nmmesin']?>' readonly="readonly" size="40" name='sattx[]' /></td>
						<td><input type='button' class='del' value='del' /></td>
						</tr>
						<? $r++; } ?>
						</tbody>
					</table>