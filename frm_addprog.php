				<? if ($_GET['idprog']=='') { ?>
				<h1>Add Menu</h1>
				<?
				$ex = "1";
				 }else{ ?>
				<h1>Edit Menu <?=$_GET['idprog']?></h1>
				<?
				//$read = "readonly=\'readonly\'";
				$ex = "2";
				 } 
				 $hasilqw=mysql_query("SELECT * FROM m_menu m left JOIN hd_menu hd on m.id_hdmenu=hd.id_hdmenu where id_menu='$_GET[idprog]'");
				 $datatampil=mysql_fetch_array($hasilqw);
				 ?>
				 
				<form id="myForm" NAME="myForm" class="uniform" action="addprog.php" method="POST">
					<fieldset>
						<legend>Menu</legend>
						<dl class="inline">
							<dt><label for="name">Program File</label></dt>
							<dd>
								<input type="text" <?=$read?> value="<?=$datatampil['file']?>"  id="fileprog" name="fileprog" class="small required" size="50" />
								<input type="hidden" value="<?=$datatampil['id_menu']?>"  name="idprog"  />
								<small>Insert file name  </small>
							</dd>
							<dt><label for="name">Menu Name</label></dt>
							<dd>
								<input type="text" id="txmenu" value="<?=$datatampil['nm_menu']?>"  name="txmenu"  class="small required" size="50" />
								<small>Insert Menu Name</small>
							</dd>
							<dt><label for="select2">Menu Header</label></dt>
							<dd>
								<select id="select2" name="txhd" class="small" >
								<? 
								$hasil3=mysql_query("SELECT * FROM hd_menu");
								while ($datatampil3=mysql_fetch_array($hasil3)){ ?>
									<option <? if ($datatampil3['id_hdmenu']==$datatampil['id_hdmenu']) { echo "selected=\"selected\""; } ?> value="<?=$datatampil3['id_hdmenu']?>"><?=$datatampil3['nm_hdmenu']?></option>
								<? } ?>
								</select>
								<small>Choose Menu Header </small>
							</dd>
						</dl>
						<input type=hidden id=exe name=exe value="<?=$ex?>" name=exee>
						<div class="buttons">
							<button type="submit" class="button">Save</button>
							<button type="button" onclick="self.history.back();" class="button">Cancel</button>
						</div>
					</fieldset>
				</form>