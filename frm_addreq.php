				<h1>HPAI QUOTATION </h1>
				<? function gettglv($tanggal){
					list($thn,$bln,$tgl) = explode("-",$tanggal) ;
					return $bln ."/". $tgl ."/". $thn ;
				}
				//$qnosup = mysql_query("SELECT * FROM ");
				//$dt = mysql_fetch_array($qnosup);
				$tglhariini=date('m/d/Y');
				$blnini = date('m');
				$thnini = date('Y');
				if( $qnosup = mysql_query("SELECT req_no FROM m_no ") ){
				$nosupp = mysql_fetch_array($qnosup);;
				for($j=1;$j<=(6-strlen($nosupp["req_no"]));$j++){
				$nobuk = $nobuk ."0" ;
				}
				$nojo = $nobuk.$nosupp["req_no"] . "/HPAI/$blnini/$thnini";
				}
				?>
								 
				<form id="myFormy" NAME="myForm" class="uniform" action="addreq.php" method="POST">
					<fieldset>
						<legend>Header of QUOTATION</legend>
			<table width='100%' >
			<tr> <td> <b> TDS No</b> </td><td> :  </td><td> <input type="text" value="<?=$nojo?>" id="nojo" name="nojo" readonly="readonly" class="small" size="20" maxlength="40"  /> </td> 
			<td> <b>Date </b> </td><td> :  </td><td> <input type="text" name="tgljo" value='<?=$tglhariini?>' readonly="readonly" id="dob3" maxlength="10" class="small" /> </td> </tr>
			
			<tr>
			  <td> <b>Description</b> </td>
			  <td> :  </td><td> <input type="text" name="txdesc" value=""  id="txdesc"  class="medium" /> </td>
			<td><strong>Quantity </strong></td>
			<td> :  </td><td> <input type="text" name="txqty" id="txqty" value="1"  class="small" /> </td> </tr>
			
			<tr> <td> <b> Customer Name </b> </td>
			  <td> :  </td><td> <select id="getcust2" name="txcust" class="medium" >
				<? 
				$hasil3=mysql_query("SELECT * FROM m_cust");
				while ($datatampil3=mysql_fetch_array($hasil3)){ ?>
				<option value="<?=$datatampil3['id_cust']?>"><?=$datatampil3['nm_cust']?></option>
				<? } ?>
				</select></td> 
			<td> <b>Tool no </b> </td>
			<td> :  </td><td> <input type="text" name="txtoolno" id="txtoolno" class="small" /></td> </tr>

			<tr> <td> <b>  Risk Cost </b> </td>
			  <td> :  </td><td> <select id="txriskt" name="txriskt" class="medium" >
				<option>30</option>
				<option>60</option>
				</select> %</td> 
			<td> <b>Packing Price </b> </td>
			<td> :  </td><td> <input type="text" name="txprice" id="txprice" value="0"  class="small" /></td> </tr>
			</table>
					</fieldset>
					<fieldset>
						<legend>Matrial Cost   </legend>		
					<table  width='100%'>
					<tr> <td> <b>Material  </b> </td><td> :  </td><td> <select id="txmat" name="txqrc" class="small" >
								<option></option>
								<? 
								$hasil9=mysql_query("SELECT * FROM m_matrial ");
								while ($datatampil9=mysql_fetch_array($hasil9)){ ?>
									<option  value="<?=$datatampil9['kdmatrial']?>|<?=$datatampil9['price']?>|<?=$datatampil9['bahan']?> <?=$datatampil9['size']?>"
									><?=$datatampil9['bahan']?> <?=$datatampil9['size']?></option>
								<? } ?>
								</select></td>
			<td> <b> Price </b> </td> <td> :  </td> <td> <input type="hidden" name="txid" id="txid" class="small" /> <input type="text" name="txhrg" id="txhrg" class="small" /></td>
			<td> <b> Pcs </b> </td> 
			<td> :  </td><td> <input type="text" name="txpcsmat" id="txpcsmat" class="small" /></td> <td> <input type="button" class="addmat" value="Add" /></td></tr>
				
					</table>
					<br />
					<table id="table2" class="gtable detailtable">
						<thead>
						<tr>
						<th>Matrial Name</th>
						<th>Price</th>
						<th>Qty</th>
						<th>Total Price</th>
						<th>&nbsp;</th>
						</tr>
						</thead>
						<tbody class="listmat">
						</tbody>
						</table>
					</fieldset>
					
										<fieldset>
						<legend> Machining Cost</legend>
						<table id="table2" class="gtable detailtable">
						<thead>
						<tr>
						<th>Processes</th>
						<th>Price</th>
						<th>Setting Time</th>
						<th>Production Time</th>
						<th>&nbsp;</th>
						</tr>
						</thead>
						<tr>
						<td><select name="2" id="txmach" class="sel" >
								<option value="">Choose Machine</option>
								<? 
								$hasil9=mysql_query("SELECT * FROM m_mesin");
								while ($datatampil9=mysql_fetch_array($hasil9)){ ?>
									<option  value="<?=$datatampil9['idmesin']?>|<?=$datatampil9['nmmesin']?>|<?=$datatampil9['hrg']?>"><?=$datatampil9['nmmesin']?></option>
								<? } ?>
								</select>
						</td>
						<td><input type="text" value="0" id="hrgtxmc"  name="hrgtxmc" size="10" /> </td>
	 					<td><input type="text" value="0" id="mintxmc"  name="mintxmc" size="10" /> </td>
	 					<td><input type="text" value="0" id="mintxmc2"  name="mintxmc2" size="10" /> </td>
	 					
						
						<td>	<input type="button" class="addmach" value="Add" />  </td>

						</tr>	
						</table>
						<!-- tabel list -->
						<table id="table2" class="gtable detailtable">
						<thead>
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
						</thead>
						<tbody class="listmach">
						</tbody>
						</table>
					</fieldset>
					
					<fieldset>
						<legend> Coating  Cost </legend>		
					<table  width='100%'>
					<tr> <td> <b>Coating dia & length  </b> </td><td> :  </td><td> <select id="txco" name="txco" class="small" >
								<option></option>
								<? 
								$hasil9=mysql_query("SELECT * FROM mcoating ");
								while ($datatampil9=mysql_fetch_array($hasil9)){ ?>
									<option  value="<?=$datatampil9['kdcoating']?>|<?=$datatampil9['nmcoating']?>|<?=$datatampil9['price']?>"><?=$datatampil9['nmcoating']?></option>
								<? } ?>
								</select></td>
			<td> <b> Price </b> </td> <td> :  </td> <td><input type="text" name="txhrgco" id="txhrgco" class="small" /></td>
			<td> <b> Pcs </b> </td>
			<td> :  </td><td> <input type="text" name="txpcsco" id="txpcsco" class="small" /></td> <td> <input type="button" class="addco" value="Add" /></td></tr>
				
					</table>
					<br />
					<table id="table2" class="gtable detailtable">
						<thead>
						<tr>
						<th>Coating Name/ Diameter</th>
						<th>Qty</th>
						<th>Price</th>
						<th>Total</th>
						<th>&nbsp;</th>
						</tr>
						</thead>
						<tbody class="listco">
						</tbody>
						</table>
					</fieldset>
					<fieldset>
					<legend>Subcount </legend>		
					<table  width='100%'>
					<tr> <td> <b>Sub-Con Process  </b> </td><td> :  </td><td> <select id="txsub" name="txsub" class="small" >
								<option></option>
								<? 
								$hasil9=mysql_query("SELECT * FROM m_subcont ");
								while ($datatampil9=mysql_fetch_array($hasil9)){ ?>
									<option  value="<?=$datatampil9['kdsubcont']?>|<?=$datatampil9['nmsubcont']?>|<?=$datatampil9['harga']?>"><?=$datatampil9['nmsubcont']?></option>
								<? } ?>
								</select></td>
			<td> <b> Price </b> </td> <td> :  </td> <td><input type="text" name="txhrgsub" id="txhrgsub" class="small" /></td>
			<td> <b> Pcs </b> </td>
			<td> :  </td><td> <input type="text" name="txqtysub" id="txqtysub" class="small" /></td> <td> <input type="button" class="addsub" value="Add" /></td></tr>
				
					</table>
					<br />
					<table id="table2" class="gtable detailtable">
						<thead>
						<tr>
						<th>Processes</th>
						<th>Qty</th>
						<th>Price</th>
						<th>Total</th>
						<th>&nbsp;</th>
						</tr>
						</thead>
						<tbody class="listsub">
						</tbody>
						</table>
					</fieldset>
					<fieldset>
						<div class="buttons">
							<button type="submit" class="button">View</button>
							<button type="button" onclick="self.history.back();" class="button">Cancel</button>
							
						</div>
					</fieldset>
					<script src="chosen/jquery-1.4.4.min.js" type="text/javascript"></script>
  <script src="chosen/chosen.jquery.js" type="text/javascript"></script>
  <script type="text/javascript"> $(".sel").chosen(); </script>
				</form>
				<div id ="getdat"></div>