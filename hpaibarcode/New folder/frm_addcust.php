				<? if ($_GET['cusid']=='') { ?>
				<h1>Tambah Data Baru</h1>
				<?
				if( $qnosup = mysql_query("SELECT no_cust FROM m_no ") ){
				$nosupp = mysql_fetch_array($qnosup);;
				for($j=1;$j<=(6-strlen($nosupp["no_cust"]));$j++){
				$nobuk = $nobuk ."0" ;
				}
				$no_sup = "IDC-".$nobuk.$nosupp["no_cust"];
				$nobaru  = intval($rsCon["no_cust"]) + 1 ;
				}
				$notampil= $no_sup;
				$ex = "1";
				 }else{ ?>
				<h1>Edit Data <?=$_GET['cusid']?></h1>
				<?
				$hasilqw=mysql_query("SELECT * FROM m_cust s left JOIN m_negara n on s.kdneg_cust=n.kd_neg where id_cust='$_GET[cusid]'");
				$datatampil=mysql_fetch_array($hasilqw);
				$read = "readonly=\'readonly\'";
				$ex = "2";
				$notampil= $datatampil['id_cust'];
				 } 
				 
				 ?>
				 
				<form id="myForm" NAME="myForm" class="uniform" action="addcust.php" method="POST">
					<fieldset>
						<legend>Data Customer</legend>
						<dl class="inline">
							<dt><label for="name">Company Code</label></dt>
							<dd>
								<input type="text" <?=$read?> value="<?=$notampil?>"  id="txkode" name="txkode" class="small required" size="50" />
								<small>Isi dengan Kode Supplier </small>
							</dd>
							<dt><label for="name">Company Name</label></dt>
							<dd>
								<input type="text" id="nmper" value="<?=$datatampil['nm_cust']?>"  name="nmper"  class="small required" size="50" />
								<small>Isi nama Kode Perusahaan</small>
							</dd>
							<dt><label for="name">Address</label></dt>
							<dd>
								<textarea id="comments" class="medium" name="txalamat"><?=$datatampil['alm_cust']?></textarea>
								<small>Isi dengan Alamat Perusahaan</small>
							</dd>
							<dt><label for="name">Telp No.</label></dt>
							<dd>
								<input type="text" id="txtlp" value="<?=$datatampil['tlp_cust']?>"  name="txtlp"  class="small required" size="50" />
								<small>Isi dengan No telp Customer</small>
							</dd>
							<dt><label for="name">Fax No.</label></dt>
							<dd>
								<input type="text" id="txfax" value="<?=$datatampil['fax_cust']?>"  name="txfax"  class="small required" size="50" />
								<small>Isi dengan fax Customer</small>
							</dd>
							</dd>
							<dt><label for="name">Contact Person</label></dt>
							<dd>
								<input type="text" id="txcp" value="<?=$datatampil['cp_cust']?>"  name="txcp"  class="small required" size="50" />
								<small>Isi dengan Nama Contac Person</small>
							</dd>
							</dd>
							<dt><label for="name">Mobile No.</label></dt>
							<dd>
								<input type="text" id="txhp" value="<?=$datatampil['hp_cust']?>"  name="txhp"  class="small required" size="50" />
								<small>Isi dengan No Handphone Contac Person</small>
							</dd>
							</dd>
							<dt><label for="name">e-mail</label></dt>
							<dd>
								<input type="text" id="txmail" value="<?=$datatampil['email_cust']?>"  name="txmail"  class="small required" size="50" />
								<small>Isi dengan Alamat Email Contac Person</small>
							</dd>
							</dd>
							<dt><label for="name">NPWP</label></dt>
							<dd>
								<input type="text" id="txnpwp" value="<?=$datatampil['npwp_sp']?>"  name="txnpwp"  class="small required" size="50" />
								<small>Isi dengan NPWP Customer</small>
							</dd>
							<dt><label for="select2">Country</label></dt>
							<dd>
								<select id="select2" name="kdneg" class="small" >
								<? 
								$hasil8=mysql_query("SELECT * FROM m_negara");
								while ($datatampil8=mysql_fetch_array($hasil8)){ ?>
									<option <? if($datatampil['kdneg_cust']== $datatampil8['kd_neg']){echo "selected=\"selected\"" ;} ?> 
									value="<?=$datatampil8['kd_neg']?>">
									<?=$datatampil8['kd_neg']?>-<?=$datatampil8['nm_neg']?>
									</option>
								<? } ?>
								</select>
								<small>Pilih Kode Negara Customer</small>
							</dd>
						</dl>
						<input type=hidden id=exe name=exe value="<?=$ex?>" name=exee>
						<input type=hidden id=hal name=hal value="<?=$_GET['h']?>" name=exee>
						<div class="buttons">
							<button type="submit" class="button">Save</button>
							<button type="button" onclick="self.history.back();" class="button">Cancel</button>
						</div>
					</fieldset>
				</form>