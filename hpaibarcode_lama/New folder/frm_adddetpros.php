				<? 
				function getTglview($tanggal){
					list($thn,$bln,$tgl) = explode("-",$tanggal) ;
					return $bln ."/". $tgl ."/". $thn ;
				}?><h1>Add Detail processes</h1>
				<?
				$read = "readonly=\'readonly\'";
				$ex = "2";
				  
				 $hasilqw=mysql_query("SELECT *  FROM mproses where idproses='$_GET[usr]'");
				 $datatampil=mysql_fetch_array($hasilqw);
				 if ($datatampil['thnpembuatan']=='') { $tgllahir='01/01/2000'; } else { $tgllahir=getTglview($datatampil['thnpembuatan']); }
				 ?>
				 
				<form id="myForm" NAME="myForm" class="uniform" action="adddetproses.php" method="POST">
					<fieldset>
						<legend>Add Detail processes</legend>
						<dl class="inline">
							<dt><label for="name">Code Main Processes</label></dt>
							<dd>
								<input type="text" <?=$read?> value="<?=$datatampil['idproses']?>"  id="txid" name="txid" class="small required" size="50" />
							</dd>
							<dt><label for="name">Description</label></dt>
							<dd>
								<input type="text" id="txdesc" <?=$read?>  value="<?=$datatampil['nmproses']?>"  name="txdesc"  class="middle" size="50" />
							</dd>
							<dt><label for="name">Sub processes</label></dt>
							<dd>
								<select id="select2" name="txsub" class="medium" >
								<option value=''>Choose Sub Processes</option>
								<? 
								$hasil9=mysql_query("SELECT * FROM mproses where jnsproses='2'");
								while ($datatampil9=mysql_fetch_array($hasil9)){ ?>
									<option  value="<?=$datatampil9['idproses']?>"><?=$datatampil9['nmproses']?></option>
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