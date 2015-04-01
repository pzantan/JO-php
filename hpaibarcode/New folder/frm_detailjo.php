				<? 
				 $hasilqw=mysql_query("SELECT t.*, p.`nmproses`, c.`nm_cust` FROM tr_jo t
LEFT JOIN mproses p ON t.`iproses`= p.`idproses`
LEFT JOIN m_cust c ON t.`idcust`=c.`id_cust` where nojo='$_GET[idjo]'");
				 $datatampil=mysql_fetch_array($hasilqw);
				 ?>
				 
				<form id="myForm" NAME="myForm" class="uniform" action="stopjo.php" method="POST">
					<fieldset>
			<legend>JO Information</legend>
			<table width='100%'>
			<tr> <td> <b> Job Number  </b> </td><td> :  </td><td> <?=$kds?> <?=$datatampil[nojo]?></td> <td>  </td><td> <input type="hidden"  <?=$read?> value="<?=$datatampil[nojo]?>"  id="nojo" name="nojo" class="small required" size="10" />  </td><td> </td> </tr>
			<tr> <td> <b> Part Name  </b> </td><td> :  </td><td> <?=$datatampil['partnm']?> </td> <td> <b>Date </b> </td><td> :  </td><td> <?=$datatampil['tgljo']?></td> </tr>
			<tr> <td> <b> Total Qty </b> </td><td> :  </td><td> <?=$datatampil['qty']?> <input type="hidden" value="<?=$datatampil['qty']?>"  id="txqty" name="txqty" /> </td> <td> <b>Delevery Date</b> </td><td> :  </td><td> <?=$datatampil['tgldel']?> </td> </tr>
			<tr> <td> <b> NO PO  </b> </td><td> :  </td><td width="400"> <?=$datatampil['nopo']?> </td> <td> <b>No SO</b> </td><td> :  </td><td> <?=$datatampil['noso']?> </td> </tr>
			<tr> <td> <b> Customer  </b> </td><td> :  </td><td> <?=$datatampil['nm_cust']?> </td> <td> <b>Priority</b> </td><td> :  </td><td> <?=$datatampil['urgnt_typ']?> </td> </tr>
			<tr> <td> <b> Qty Ok  </b> </td><td> :  </td><td> <input type="text" value="<?=$datatampil['qty']?>"  id="txgr" name="txgr" class="small required"/> </td> <td> <b>Qty NG</b> </td><td> :  </td><td> <input type="text" value="0"  id="txng" name="txng" class="small required"/> </td> </tr>
			</table>
			</fieldset>
					<fieldset>
						<legend>List Processes</legend>
						<table id="table2" class="gtable detailtable">
						<thead>
						<tr>
						<th>Processes</th>
						<th>Estimasi </th>
						<th>Machine</th>
						<th>Start</th>
						<th>And</th>
						</tr>
						</thead>
						<tbody class="last">
						<?
						$hasilqw=mysql_query("SELECT t.*, p.nmproses, m.`nmmesin` FROM tr_jodetail t 
LEFT JOIN mproses p ON t.`idproses`=p.`idproses`
LEFT JOIN m_mesin m ON p.`idmesin` = m.`idmesin`
WHERE nojo='$_GET[idjo]'");
			while ($dtls=mysql_fetch_array($hasilqw)){ ?>
			<tr>
						<td><?=$dtls[nmproses]?></td>
						<td><?=$dtls[estimasi]?> Minute </td>
						<td><?=$dtls[nmmesin]?></td>
						<td><?=$dtls[starttime]?></td>
						<td><?=$dtls[endtime]?></td>
						</tr>
			<? } ?>
						</tbody>
						</table>
					</fieldset>
					<fieldset>
						<div class="buttons">
							<button type="submit" class="button">Stop JO</button>
							<button type="button" onclick="self.history.back();" class="button">Back</button>
						</div>
					</fieldset>
				</form>