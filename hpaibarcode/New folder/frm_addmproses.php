				<? 
				function getTglview($tanggal){
					list($thn,$bln,$tgl) = explode("-",$tanggal) ;
					return $bln ."/". $tgl ."/". $thn ;
				}
				if ($_GET['usr']=='') { ?>
				<h1>Add Master Proses</h1>
				<?
				$ex = "1";
				 }else{ ?>
				<h1>Edit Data Master PRoses <?=$_GET['usr']?></h1>
				<?
				$read = "readonly=\'readonly\'";
				$ex = "2";
				  
				 $hasilqw=mysql_query("SELECT *  FROM mproses where idproses='$_GET[usr]'");
				 $datatampil=mysql_fetch_array($hasilqw);
				 if ($datatampil['thnpembuatan']=='') { $tgllahir='01/01/2000'; } else { $tgllahir=getTglview($datatampil['thnpembuatan']); }
				 }
				 ?>
				 
				<form id="myForm" NAME="myForm" class="uniform" action="addmproses.php" method="POST">
					<fieldset>
						<legend>Data Mater Proses</legend>
						<dl class="inline">
							<dt><label for="name">Code processes</label></dt>
							<dd>
								<input type="text" <?=$read?> value="<?=$datatampil['idproses']?>"  id="txid" name="txid" class="small required" size="50" />
							</dd>
							<dt><label for="name">Description</label></dt>
							<dd>
								<input type="text" id="txdesc" value="<?=$datatampil['nmproses']?>"  name="txdesc"  class="small" size="50" />
							</dd>
							<dt><label for="name">Type</label></dt>
							<dd>
								<select id="select2" name="typpros" class="small" >
								<option value="1" <? if ($datatampil['jnsproses']=='1'){echo 'selected';} ?>>Main Proses</option>
								<option value="2" <? if ($datatampil['jnsproses']=='2'){echo 'selected';} ?>>Sub Proses</option>
								</select>
							</dd>
							<dt><label for="name">Estimasi Time</label></dt>
							<dd>
								<input type="text" id="txperkiraan" value="<?=$datatampil['estitime']?>"  name="txperkiraan"  class="small" size="50" /> Minute
							</dd>
							<dt><label for="name">Machine</label></dt>
							<dd>
								<select id="select2" name="txmac" class="medium" >
								<option value=''>Choose Machine</option>
								<? 
								$hasil9=mysql_query("SELECT * FROM m_mesin");
								while ($datatampil9=mysql_fetch_array($hasil9)){ ?>
									<option <? if($datatampil['idmesin']== $datatampil9['idmesin']){echo "selected=\"selected\"" ;} ?> value="<?=$datatampil9['idmesin']?>"><?=$datatampil9['nmmesin']?></option>
								<? } ?>
								</select>
							</dd>
						</dl>
						<input type=hidden id=exe name=exe value="<?=$ex?>" name=exee>
						<input type=hidden id=hal name=hal value="<?=$_GET['h']?>" name=exee>
						<div class="buttons">
							<button type="submit" class="button">Simpan</button>
							<button type="button" onclick="self.history.back();" class="button">Batal</button>
						</div>
					</fieldset>
				</form>