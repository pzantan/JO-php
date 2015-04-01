<?include_once "koneksi.php";
session_start();
//tambah user
function getTanggaldb($tanggal){
		list($bln,$tgl,$thn) = explode("/",$tanggal) ;
		return $thn ."-". $bln ."-". $tgl ;
	}
$txtgl = getTanggaldb($_POST['txtgl']);
$tgldel = getTanggaldb($_POST['tgldel']);

$kdmat = $_POST[kdmat];
$nmmat = $_POST[nmmat];
$hrgmat = $_POST[hrgmat];
$jmlmat = $_POST[jmlmat];
$jmltotmat = $_POST[jmltotmat];


?>
<form id="myForm" NAME="myForm" class="" action="addreq2.php" method="POST">
			<table width='100%' align="left" >
			<tr> <td> <b> TDS No</b> </td><td> :  </td><td> <input type="text" value="<?=$_POST[nojo]?>" id="nojo" name="nojo" readonly="readonly" class="small" size="20" maxlength="40"  /> </td> 
			<td> <b>Date </b> </td><td> :  </td><td> <input type="text" name="tgljo" value='<?=$_POST[tgljo]?>' readonly="readonly" id="dob3" maxlength="10" class="small" /> </td> </tr>
			<tr>
			  <td> <b>Description</b> </td>
			  <td> :  </td><td> <input type="text" name="txdesc" value="<?=$_POST[txdesc]?>" id="txdesc"  class="medium" /> </td>
			<td><strong>Quantity </strong></td>
			<td> :  </td><td> <input type="text" name="txqty" id="txqty" value="<?=$_POST[txqty]?>" class="small" /> </td> </tr>
			
			<tr> <td> <b> Customer Name </b> </td>
			  <td> :  </td><td> <select id="getcust2" name="txcust" class="medium" >
				<? 
				$hasil3=mysql_query("SELECT * FROM m_cust");
				while ($datatampil3=mysql_fetch_array($hasil3)){ ?>
				<option value="<?=$datatampil3['id_cust']?>" <? if($_POST[txcust]== $datatampil3['id_cust']){echo "selected=\"selected\"" ;} ?> ><?=$datatampil3['nm_cust']?></option>
				<? } ?>
				</select></td> 
			<td> <b>Tool no </b> </td>
			<td> :  </td><td> <input type="text" name="txtoolno" value="<?=$_POST[txtoolno]?>" id="txtoolno" class="small" /></td> </tr>

			<tr> <td> <b>  Risk Cost </b> </td>
			  <td> :  </td><td> <select id="txriskt" name="txriskt" class="medium" >
				<option <? if ($_POST[txriskt]=='30'){echo 'selected';} ?> >30</option>
				<option <? if ($_POST[txriskt]=='60'){echo 'selected';} ?>>60</option>
				</select> %</td> 
			<td> <b>Packing Price </b> </td>
			<td> :  </td><td> <input type="text" name="txprice" value="<?=$_POST[txprice]?>" id="txprice" class="small" /></td> </tr>
			</table>
			
			<br />
			<legend>Matrial Cost   </legend>
			<table id="table2" class="gtable">
						<thead>
						<tr>
						<th>Matrial Name</th>
						<th>Price</th>
						<th>Qty</th>
						<th>Total Price</th>
						<th>Total Matrial Cost</th>
						</tr>
						</thead>
						<tbody class="listmat">
						<?$gtmc = 0; for($i=0;$i<count($kdmat);$i++){?>
						<tr>
						<td><input type='hidden' value='<?=$kdmat[$i]?>' name='kdmat[]' /> <input type='text' value='<?=$nmmat[$i]?>' name='nmmat[]' /></td>
						<td><input type='text' value='<?=$hrgmat[$i]?>' name='hrgmat[]' /></td>
						<td><input type='text' value='<?=$jmlmat[$i]?>' name='jmlmat[]' /></td>
						<td><input type='text' value='<?=$jmltotmat[$i]?>' name='jmltotmat[]' /></td>
						<td>&nbsp;</td>
						</tr>
						<? $gtmc= $gtmc + $jmltotmat[$i] ; }?>
						<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><input valign='right' type='text' value='<?=$gtmc?>' name='gtmc' id='gtmc' /></td>
						</tr>
						<tr>
						<td> Risk Cost</td>
						<td></td>
						<td></td>
						<td></td>
						<? $riskrp = $gtmc*$_POST[txriskt]/100 ; ?>
						<td><input valign='right' type='text' value='<?=$riskrp?>' name='riskrp' id='riskrp' /></td>
						</tr>
						</tbody>
						</table>
			<br />
			<?
			
			$kdmach = $_POST[kdmach];
			$nmmach = $_POST[nmmach];
			$minmach = $_POST[minmach];
			$minmach2 = $_POST[minmach2];
			$hrgmach = $_POST[hrgmach];
			$totmach = $_POST[totmach];
			$totmach2 = $_POST[totmach2];
			$jmltotmach = $_POST[jmltotmach];
			
			?>
			<legend> Machining Cost</legend>
			<table id="table2" class="gtable">
						<thead>
						<tr>
						<tr>
						<th>Processes</th>
						<th>Price</th>
						<th>Setting Time</th>
						<th>Setting Price</th>
						<th>Production Time</th>
						<th>Production Price</th>
						<th>Total</th>
						<th>&nbsp;</th>
						</tr>
						</tr>
						</thead>
						<tbody class="listmat">
						<?$gtmach = 0; $totjum1 = 0; $totjum2 = 0; for($i=0;$i<count($kdmach);$i++){?>
						<tr>
						<td><input type='hidden' value='<?=$kdmach[$i]?>' name='kdmach[]' /><input type='text' value='<?=$nmmach[$i]?>' name='nmmach[]' /></td>
						<td><input type='text' value='<?=$hrgmach[$i]?>' size='5' name='hrgmach[]' /></td>
						<td><input type='text' value='<?=$minmach[$i]?>' size='5' name='minmach[]' /></td>
						<td><input type='text' value='<?=$totmach[$i]?>' size='5' name='totmach[]' /></td>
						<td><input type='text' value='<?=$minmach2[$i]?>' size='5' name='minmach2[]' /></td>
						<td><input type='text' value='<?=$totmach2[$i]?>' size='5' name='totmach2[]' /></td>
						<td><input type='text' value='<?=$jmltotmach[$i]?>' size='5' name='jmltotmach[]' /></td>
						<td></td>
						</tr>
						<? $gtmach= $gtmach + $jmltotmach[$i] ; 
						$totjum1 = $totjum1 + $totmach[$i] ;
						$totjum2 = $totjum2 + $totmach2[$i] ;
						}?>
						<tr>
						<td></td>
						<td></td>
						<td></td>
						<td><input valign='right' type='text' value='<?=$totjum1?>' name='tothrgmach1' size='5' /></td>
						<td></td>
						<td><input valign='right' type='text' value='<?=$totjum2?>' name='tothrgmach2' size='5'/></td>
						<td><input valign='right' type='text' value='<?=$gtmach?>' name='gtmach' size='5' /></td>
						</tr>
						</tbody>
						</table>
			<br />
			<?
			$kdco = $_POST[kdco];
			$nmco = $_POST[nmco];
			$qtyco = $_POST[qtyco];
			$hrgco = $_POST[hrgco];
			$jmltotco = $_POST[jmltotco];
			
			?>
			<legend>Coating  Cost</legend>
			<table id="table2" class="gtable">
						<thead>
						<tr>
						<th>Coating Name/ Diameter</th>
						<th>Price</th>
						<th>Qty</th>
						<th>Total Price</th>
						<th>Total Machining Cost</th>
						</tr>
						</thead>
						<tbody class="listmat">
						<?$gtco = 0; for($i=0;$i<count($kdco);$i++){?>
						<tr>
						<td><input type='hidden' value='<?=$kdco[$i]?>' name='kdco[]' /> <input type='text' value='<?=$nmco[$i]?>' name='nmmat[]' /></td>
						<td><input type='text' value='<?=$hrgco[$i]?>' name='hrgco[]' /></td>
						<td><input type='text' value='<?=$qtyco[$i]?>' name='qtyco[]' /></td>
						<td><input type='text' value='<?=$jmltotco[$i]?>' name='jmltotco[]' /></td>
						<td>&nbsp;</td>
						</tr>
						<? $gtco= $gtco + $jmltotco[$i] ; }?>
						<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><input valign='right' type='text' value='<?=$gtco?>' name='grtotco' id='grtotco' /></td>
						</tr>
						</tbody>
						</table>
			<br />
			<?
			
			$kdsub = $_POST[kdsub];
			$nmsub = $_POST[nmsub];
			$qtysub = $_POST[qtysub];
			$hrgsub = $_POST[hrgsub];
			$jmltotsub = $_POST[jmltotsub];
			
			?>
			<legend>Subcont Cost</legend>
			<table id="table2" class="gtable">
						<thead>
						<tr>
						<th>Subcont Name</th>
						<th>Price</th>
						<th>Qty</th>
						<th>Total Price</th>
						<th>Total Machining Cost</th>
						</tr>
						</thead>
						<tbody class="listmat">
						<?$gtsub = 0; for($i=0;$i<count($kdsub);$i++){?>
						<tr>
						<td><input type='hidden' value='<?=$kdsub[$i]?>' name='kdsub[]' /> <input type='text' value='<?=$nmsub[$i]?>' name='nmmat[]' /></td>
						<td><input type='text' value='<?=$hrgsub[$i]?>' name='hrgsub[]' /></td>
						<td><input type='text' value='<?=$qtysub[$i]?>' name='qtysub[]' /></td>
						<td><input type='text' value='<?=$jmltotsub[$i]?>' name='jmltotsub[]' /></td>
						<td>&nbsp;</td>
						</tr>
						<? $gtsub= $gtsub + $jmltotsub[$i] ; }?>
						<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><input valign='right' type='text' value='<?=$gtsub?>' name='grtotsub' id='grtotsub' /></td>
						</tr>
						
						
						</tbody>
						</table>
						<br />
						<table id="table2" class="gtable">
						<thead>
						<tr>
						<th width="20%"></th>
						<th width="10%"></th>
						<th width="10%"></th>
						<th width="20%"></th>
						<th width="40%"></th>
						</tr>
						</thead>
						<tbody class="listmat">
						<tr>
						<td>Selling Price</td>
						<td></td>
						<td></td>
						<td align='right'><input type='text' style="text-align:right" value='1' name='jmlsel1' id='jmlsel1'  size='5px' /> Pcs</td>
						<?  $totalsel = $riskrp+$gtsub+$gtco+$gtmach+$gtmc+$_POST[txprice] ; ?>
						<td align='right'><input type='text' style="text-align:right" value='<?=number_format($totalsel/0.7,2,".","")?>' name='totsel1' id='totsel1' /></td>
						</tr>
						<tr>
						<td></td>
						<td></td>
						<td></td>
						<td align='right'><input type='text' style="text-align:right" value='5'name='jmlsel2' id='jmlsel2'size='5px' /> Pcs</td>
						<?  $totalsel2 = ($gtsub+$gtco+$gtmc+$_POST[txprice]) +($gtmach/5)  + (($riskrp/5 ) / 0.7); ?>
						<td align='right'><input type='text' style="text-align:right" value='<?=number_format($totalsel2,2,".","")?>' name='totsel5' id='totsel5' /></td>
						</tr>
						<tr>
						<td></td>
						<td></td>
						<td></td>
						<td align='right'><input type='text' style="text-align:right" value='10' name='jmlsel3' id='jmlsel3' size='5px' /> Pcs</td>
						<?  $totalsel3 = ($gtsub+$gtco+$gtmc+$_POST[txprice]) +($gtmach/10)  + (($riskrp/10 ) / 0.7); ?>
						<td align='right'><input type='text' style="text-align:right" value='<?=number_format($totalsel3,2,".","")?>' name='totsel10'  id='totsel10' /></td>
						</tr>
						<tr>
						<td></td>
						<td></td>
						<td></td>
						<td align='right'><input type='text' style="text-align:right" value='30' name='jmlsel4' id='jmlsel4' size='5px' /> Pcs</td>
						<?  $totalsel3 = ($gtsub+$gtco+$gtmc+$_POST[txprice]) +($gtmach/30)  + (($riskrp/30 ) / 0.7); ?>
						<td align='right'><input  type='text' style="text-align:right" value='<?=number_format($totalsel3,2,".","")?>' name='totsel30'  id='totsel30' /></td>
						</tr>
						<tr>
						<td></td>
						<td></td>
						<td></td>
						<td align='right'><input type='text' style="text-align:right" value='80' name='jmlsel5' id='jmlsel5' size='5px' /> Pcs</td>
						<?  $totalsel3 = ($gtsub+$gtco+$gtmc+$_POST[txprice]) +($gtmach/80)  + (($riskrp/80 ) / 0.7); ?>
						<td align='right'><input type='text' style="text-align:right" value='<?=number_format($totalsel3,2,".","")?>' name='totsel80'  id='totsel80' /></td>
						</tr>
						<tr>
						<td></td>
						<td></td>
						<td></td>
						<td align='right'><input type='text' style="text-align:right" value='100' name='jmlsel1' id='jmlsel1' size='5px' /> Pcs</td>
						<?  $totalsel3 = ($gtsub+$gtco+$gtmc+$_POST[txprice]) +($gtmach/100)  + (($riskrp/100 ) / 0.7); ?>
						<td align='right'><input type='text' style="text-align:right" value='<?=number_format($totalsel3,2,".","")?>' name='totsel100' id='totsel100' /></td>
						</tr>
						
						
						</tbody>
						</table>
			<br />
			<button  type="button" class="button" id="closebut">Close</button>
			<button type="submit"   class="button" >Save</button>
			<br /><br /><br /><br />
			</form>