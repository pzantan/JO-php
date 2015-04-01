				<? if ($_GET['idhdprog']=='') { ?>
				<h1>Tambah Header Menu Baru</h1>
				<?
				$ex = "1";
				 }else{ ?>
				<h1>Edit Header Menu <?=$_GET['idhdprog']?></h1>
				<?
				//$read = "readonly=\'readonly\'";
				$ex = "2";
				 } 
				 $hasilqw=mysql_query("SELECT * FROM hd_menu where id_hdmenu='$_GET[idhdprog]'");
				 $datatampil=mysql_fetch_array($hasilqw);
				 ?>
				 
				<form id="myForm" NAME="myForm" class="uniform" action="addhdprog.php" method="POST">
					<fieldset>
						<legend>Data Header Menu</legend>
						<dl class="inline">
							<dt><label for="name">Nama Header Menu</label></dt>
							<dd>
								<input type="text" <?=$read?> value="<?=$datatampil['nm_hdmenu']?>"  id="txthdmenu" name="txthdmenu" class="small required" size="50" />
								<input type="hidden" value="<?=$datatampil['id_hdmenu']?>"  name="idhdprog"  />
								<small>Isi dengan nama Header Menu </small>
							</dd>
						</dl>
						<input type=hidden id="exe" name="exe" value="<?=$ex?>" name=exee>
						<div class="buttons">
							<button type="submit" class="button">Simpan</button>
							<button type="button" onclick="self.history.back();" class="button">Batal</button>
						</div>
					</fieldset>
				</form>