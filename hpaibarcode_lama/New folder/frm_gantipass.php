				<h1>Change Password <?=$_SESSION["usernama"]?> </h1>
				<? 
				 $hasilqw=mysql_query("SELECT * FROM m_user m left JOIN m_userlevel ul on m.usr_level=ul.id_level where usr_user='$_GET[usr]'");
				 $datatampil=mysql_fetch_array($hasilqw);
				 ?>
				
				<form id="myForm" NAME="myForm" class="uniform" action="gatipass.php" method="POST">
					<fieldset>
						<legend>User Data</legend>
						<dl class="inline">
							<dt><label for="name">User ID</label></dt>
							<dd>
								<input type="text" readonly='readonly'  value="<?=$_SESSION[userid]?>"  id="userid" name="userid" class="small required" size="50" />
							</dd>
							<dt><label for="name">Old Password</label></dt>
							<dd>
								<input type="password" id="txtpass3" name="txtpass3"  class="small required" size="50" />
							</dd>
							<dt><label for="name">New Password</label></dt>
							<dd>
								<input type="password" id="txtpass1" name="txtpass1"  class="small required" size="50" />
							</dd>
							<dt><label for="select2">Re type New Password</label></dt>
							<dd>
								<input type="password" id="txtpass2" name="txtpass2"  class="small required" size="50" />
							</dd>
						</dl>
						<input type=hidden id=exe name=exe value="3" name=exee>
						<div class="buttons">
							<button type="submit" class="button">Save</button>
							<button type="button" onclick="self.history.back();" class="button">Cancel</button>
						</div>
					</fieldset>
				</form>