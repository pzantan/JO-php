			<h1>Report JO Customer</h1>
				<? $tglawal = date('m/'.'d/'.'Y'); ?>
			<form id="myFormxx" NAME="myFormxx" class="uniform" action="frm_rptjo2.php" method="POST">
					<fieldset>
							<dt><label for="name">Tanggal Request</label></dt>
							<dd>
								<input type="text" name="tgl1" value="<?=$tglawal?>" id="dob" maxlength="10" class="small" /> S/d
								<input type="text" name="tgl2" value="<?=$tglawal?>" id="dob2" maxlength="10" class="small" />
							</dd>
							<dt><label for="select2">Customer</label></dt>
							<dd>
								<select id="select2" name="txcust" class="medium" >
								<option value="">ALL - Customer</option>
								<? 
								$hasil3=mysql_query("SELECT * FROM m_cust");
								while ($datatampil3=mysql_fetch_array($hasil3)){ ?>
									<option value="<?=$datatampil3['id_cust']?>">
									<?=$datatampil3['id_cust']?>-<?=$datatampil3['nm_cust']?></option>
								<? } ?>
								</select>
							</dd>
							<button type="submit" class="button">View</button>
							
						</dl>
					</fieldset>
					<div id="result2"></div>
				</form>