			<h1>Report User Log</h1>
				<? $tglawal = date('m/'.'d/'.'Y'); ?>
			<form id="myFormxx" NAME="myFormxx" class="uniform" action="frm_rrptjo_man2.php" method="POST">
					<fieldset>
							<dt><label for="name">Tanggal Request</label></dt>
							<dd>
								<input type="text" name="tgl1" value="<?=$tglawal?>" id="dob" maxlength="10" class="small" /> S/d
								<input type="text" name="tgl2" value="<?=$tglawal?>" id="dob2" maxlength="10" class="small" />
							</dd>
							<dt><label for="select2">User</label></dt>
							<dd>
								<select id="select2" name="txcust" class="medium" >
								<!--<option value="">ALL - Machine</option>-->
								<? 
								$hasil3=mysql_query("SELECT * FROM m_user");
								while ($datatampil3=mysql_fetch_array($hasil3)){ ?>
									<option value="<?=$datatampil3['nik']?>">
									<?=$datatampil3['nik']?>-<?=$datatampil3['usr_nama']?></option>
								<? } ?>
								</select>
							</dd>
							<button type="submit" class="button">View</button>
							
						</dl>
					</fieldset>
					<div id="result2"></div>
				</form>