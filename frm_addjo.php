				<? 
				$tmbhn=date('ym');
				$tglhariini=date('m/d/Y');
				if( $qnosup = mysql_query("SELECT jo_no FROM m_no ") ){
				$nosupp = mysql_fetch_array($qnosup);;
				for($j=1;$j<=(6-strlen($nosupp["jo_no"]));$j++){
				$nobuk = $nobuk ."0" ;
				}
				$nojo = "T".$tmbhn.$nobuk.$nosupp["jo_no"];
				$nojo1 = $tmbhn.$nobuk.$nosupp["jo_no"];
				}
				
				function getTglview($tanggal){
					list($thn,$bln,$tgl) = explode("-",$tanggal) ;
					return $bln ."/". $tgl ."/". $thn ;
				}
				if ($_GET['usr']=='') { ?>
				<h1>Add Job Order</h1>
				<?
				$ex = "1";
				 }else{ ?>
				<h1>Edit Job Order <?=$_GET['usr']?></h1>
				<?
				$read = "readonly=\'readonly\'";
				$ex = "2";
				  
				 $hasilqw=mysql_query("SELECT *  FROM mproses where idproses='$_GET[usr]'");
				 $datatampil=mysql_fetch_array($hasilqw);
				 if ($datatampil['thnpembuatan']=='') { $tgllahir='01/01/2000'; } else { $tgllahir=getTglview($datatampil['thnpembuatan']); }
				 }
				 ?>
				 
				<form id="myForm" NAME="myForm" class="uniform" action="addjo.php" method="POST">
					<fieldset>
						<legend>Data Job Order</legend>
						<dl class="inline">
							<dt><label for="name" >Type (code)</label></dt>
							<dd>
								<select id="kdjo" class="kdjo" name="kdjo" >
								<option value='T'>Standard</option>
								<option value='S'>Special</option>
								<option value='R'>Regrinding/Modification</option>
								<option value='TR'>Trial</option>
								</select>
							</dd>
							<dt><label for="name">Job Number</label></dt>
							<dd>
								<input type="text" <?=$read?> value="<?=$nojo?>"  id="txid" name="txid" class="small required" size="50" />
								<input type="hidden" <?=$read?> value="<?=$nojo1?>"  id="txid2" name="txid2"/>
							</dd>
							<dt><label for="name" >Priority</label></dt>
							<dd>
								<select id="kdurgn" class="kdurgn" name="kdurgn" >
								<option value='3'>Normal</option>
								<option value='2'>Urgent</option>
								<option value='1'>TOP Urgent</option>
								</select>
							</dd>
							<dt><label for="name">Date</label></dt>
							<dd>
								<input type="text" id="dob" value="<?=$tglhariini?>"  name="txtgl"  class="small required" size="50" />
							</dd>
							<dt><label for="name">Part Name</label></dt>
							<dd>
								<input type="text" id="txdesc" value="<?=$datatampil['nmproses']?>"  name="txpartnm"  class="small required" size="50" />
							</dd>
							<dt><label for="name">Total Qty</label></dt>
							<dd>
								<input type="text" id="txqty" value="0"  name="txqty"  class="small  required" size="50" />
							</dd>
							<dt><label for="name">Delevery Date</label></dt>
							<dd>
								<input type="text" id="dob2" value="<?=$tglhariini?>"  name="tgldel"  class="small required" size="50" />
							</dd>
							<dt><label for="name">NO PO</label></dt>
							<dd>
								<input type="text" id="nopo" value=""  name="nopo"  class="small" size="50" />
							</dd>
							<dt><label for="name">No SO</label></dt>
							<dd>
								<input type="text" id="noso" value=""  name="noso"  class="small" size="50" />
							</dd>
							<dt><label for="name">Price</label></dt>
							<dd>
								<input type="text" id="hrg" value=""  name="hrg"  class="small" size="50" />
							</dd>
							<dt><label for="name">Customer</label></dt>
							<dd>
								<select id="txcust" name="txcust" class="medium" >
								<option value=''>Choose Customer</option>
								<? 
								$hasil9=mysql_query("SELECT * FROM m_cust where sts_cust='Y'");
								while ($datatampil9=mysql_fetch_array($hasil9)){ ?>
									<option  value="<?=$datatampil9['id_cust']?>"><?=$datatampil9['id_cust']?> <?=$datatampil9['nm_cust']?></option>
								<? } ?>
								</select>
							</dd>
						</dl>
						<input type=hidden id=exe name=exe value="<?=$ex?>" name=exee>
						<input type=hidden id=hal name=hal value="<?=$_GET['h']?>" name=exee>
					</fieldset>
					<fieldset>
						<legend>Input Processes</legend>
						<table id="table2" class="gtable detailtable">
						<thead>
						<tr>
						<th>Processes</th>
						<th>Estimasi </th>
						<th>Machine</th>
						<th>&nbsp;</th>
						</tr>
						</thead>
						<tr>
						<td> <select name="isi1" id="isi1x" class="sel getmsn" >
								<option value="">Choose Processes</option>
								<? 
								$hasil9=mysql_query("SELECT * FROM mproses ");
								while ($datatampil9=mysql_fetch_array($hasil9)){ ?>
									<option  value="<?=$datatampil9['idproses']?>|<?=$datatampil9['nmproses']?>"><?=$datatampil9['idproses']?> <?=$datatampil9['nmproses']?></option>
								<? } ?>
								</select>
						</td>
						
	 					<td colspan="2">	<div id="ganti"> <input type="text" value="0" id="isi2"  name="isi2" size="10" /> Minute  &nbsp; &nbsp; &nbsp;
							<select name="2" id="isi3" class="sel" >
								<option value="">Choose Machine</option>
								<? 
								$hasil9=mysql_query("SELECT * FROM m_mesin");
								while ($datatampil9=mysql_fetch_array($hasil9)){ ?>
									<option  value="<?=$datatampil9['idmesin']?>|<?=$datatampil9['nmmesin']?>"><?=$datatampil9['nmmesin']?></option>
								<? } ?>
								</select>
						</div>
						</td>
						
						<td>	<input type="button" class="addpro" value="Add" />  </td>

						</tr>	
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
						<th>&nbsp;</th>
						</tr>
						</thead>
						<tbody class="last">
						</tbody>
						</table>
					</fieldset>
					<fieldset>
						<div class="buttons">
							<button type="submit" class="button">Save</button>
							<button type="button" onclick="self.history.back();" class="button">Cancel</button>
						</div>
					</fieldset>
				</form>