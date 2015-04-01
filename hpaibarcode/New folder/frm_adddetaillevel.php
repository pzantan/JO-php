				<? if ($_GET['idlevel']=='') { ?>
				<script>window.location.href = 'index.php?h=1&link=df_level.php' </script>
				<? } ?>
				<? 
				 $hasilqw=mysql_query("SELECT * FROM m_userlevel where id_level='$_GET[idlevel]'");
				 $datatampil=mysql_fetch_array($hasilqw);
				 ?>
				 <h1>Tambah Detail Level <?=$datatampil['nm_level']?></h1>
				<form id="myForm" NAME="myForm" class="uniform" action="adddetlevel.php" method="POST">
				
					<fieldset>
						<legend>Tambah menu di level</legend>
						<dl class="inline">
							<dt><label for="select2">Pilih Menu</label></dt>
							<dd>
								<input type="hidden" readonly='readonly'  value="<?=$_GET['idlevel']?>"  id="idlev" name="idlev"/>
								<select id="pilmenu" name="pilmenu" class="medium" >
								<option value="">pilih Menu</option>
								<? 
								$hasilqw=mysql_query("SELECT * FROM m_menu");
								while ($datatampil=mysql_fetch_array($hasilqw)){ ?>
									<option value="<?=$datatampil['id_menu']?>"><?=$datatampil['nm_menu']?> -- <?=$datatampil['file']?></option>
								<? } ?>
								</select>
								<small>Pilih Menu </small>
							</dd>
							<dt><label for="name">Add</label></dt>
							<dd>
								<label><input type="radio" name="txadd" value="y" />Yes</label>
								<label><input type="radio" name="txadd" value="n"  checked="checked" />No</label>
							</dd>
							<dt><label for="name">Edit</label></dt>
							<dd>
								<label><input type="radio" name="txedit" value="y" />Yes</label>
								<label><input type="radio" name="txedit" value="n" checked="checked" />No</label>
							</dd>
							<dt><label for="select2">Delete</label></dt>
							<dd>
								<label><input type="radio" name="txdel" value="y" />Yes</label>
								<label><input type="radio" name="txdel" value="n" checked="checked" />No</label>
							</dd>
						</dl>
						<div class="buttons">
							<button type="submit" class="button">Save</button>
							<button type="button" onclick="self.history.back();" class="button">Batal</button>
						</div>
					</fieldset>
				</form>