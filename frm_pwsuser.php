				 <h1>Set Password User <?=$_GET['usr']?> </h1>
				<? if ($_GET['usr']=='') { ?>
				<script>window.location.href = 'index.php?h=1&link=df_user.php' </script>
				<? } ?>
				<? 
				 $hasilqw=mysql_query("SELECT * FROM m_user m left JOIN m_userlevel ul on m.usr_level=ul.id_level where usr_user='$_GET[usr]'");
				 $datatampil=mysql_fetch_array($hasilqw);
				 ?>
				
				<form id="myForm" NAME="myForm" class="uniform" action="setpassuser.php" method="POST">
					<fieldset>
						<legend>Data User</legend>
						<dl class="inline">
							<dt><label for="name">ID / Kode User</label></dt>
							<dd>
								<input type="text" readonly='readonly'  value="<?=$datatampil['usr_user']?>"  id="userid" name="userid" class="small required" size="50" />
							</dd>
							<dt><label for="name">Password</label></dt>
							<dd>
								<input type="password" id="txtpass1" name="txtpass1"  class="small required" size="50" />
							</dd>
							<dt><label for="select2">Re type Password</label></dt>
							<dd>
								<input type="password" id="txtpass2" name="txtpass2"  class="small required" size="50" />
							</dd>
						</dl>
						<input type=hidden id=exe name=exe value="3" name=exee>
						<div class="buttons">
							<button type="submit" class="button">Save</button>
							<button type="button" onclick="self.history.back();" class="button">Batal</button>
						</div>
					</fieldset>
				</form>