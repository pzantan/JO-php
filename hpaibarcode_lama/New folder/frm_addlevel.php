				<? if ($_GET['idlevel']=='') { ?>
				<h1>Tambah Level Baru</h1>
				<?
				$ex = "1";
				 }else{ ?>
				<h1>Edit Level <?=$_GET['idlevel']?></h1>
				<?
				//$read = "readonly=\'readonly\'";
				$ex = "2";
				 } 
				 $hasilqw=mysql_query("SELECT * FROM m_userlevel where id_level='$_GET[idlevel]'");
				 $datatampil=mysql_fetch_array($hasilqw);
				 ?>
				 
				<form id="myForm" NAME="myForm" class="uniform" action="addlevel.php" method="POST">
					<fieldset>
						<legend>Data level</legend>
						<dl class="inline">
							<dt><label for="name">Nama Level</label></dt>
							<dd>
								<input type="text" <?=$read?> value="<?=$datatampil['nm_level']?>"  id="txlevel" name="txlevel" class="small required" size="50" />
								<input type="hidden" value="<?=$datatampil['id_level']?>"  name="txid"  />
								<small>Isi dengan nama Level </small>
							</dd>
						</dl>
						<input type=hidden id="exe" name="exe" value="<?=$ex?>" name=exee>
						<div class="buttons">
							<button type="submit" class="button">Simpan</button>
							<button type="button" onclick="self.history.back();" class="button">Batal</button>
						</div>
					</fieldset>
				</form>