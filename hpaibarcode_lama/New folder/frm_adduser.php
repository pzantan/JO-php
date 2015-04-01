				<? if ($_GET['usr']=='') { ?>
				<h1>Tambah User Baru</h1>
				<?
				$ex = "1";
				 }else{ ?>
				<h1>Edit user <?=$_GET['usr']?></h1>
				<?
				$read = "readonly=\'readonly\'";
				$ex = "2";
				 } 
				 $hasilqw=mysql_query("SELECT * FROM m_user m left JOIN m_userlevel ul on m.usr_level=ul.id_level where usr_user='$_GET[usr]'");
				 $datatampil=mysql_fetch_array($hasilqw);
				 ?>
				 
				<form id="myForm" NAME="myForm" class="uniform" action="adduser.php" method="POST">
					<fieldset>
						<legend>Data User</legend>
						<dl class="inline">
							<dt><label for="name">ID / Kode User</label></dt>
							<dd>
								<input type="text" <?=$read?> value="<?=$datatampil['usr_user']?>"  id="userid" name="userid" class="small required" size="50" />
								<small>Isi dengan user id atau NIK </small>
							</dd>
							<dt><label for="name">Nama User</label></dt>
							<dd>
								<input type="text" id="naamalengkap" value="<?=$datatampil['usr_nama']?>"  name="naamalengkap"  class="small required" size="50" />
								<small>Isi dengan Nama lengkap user</small>
							</dd>
							<dt><label for="select2">Level User</label></dt>
							<dd>
								<select id="select2" name="levell" class="small" >
								<? 
								$hasilqw=mysql_query("SELECT * FROM m_userlevel");
								while ($datatampil2=mysql_fetch_array($hasilqw)){ 
								if($datatampil['usr_level']== $datatampil2['id_level']){ $sele="selected=\"selected\"" ;}else{ $sele="" ;}
								?>
									<option <?=$sele?> value="<?=$datatampil2['id_level']?>"><?=$datatampil2['nm_level']?></option>
								<? } ?>
								</select>
							<small>Level User </small>
							</dd>
							<dt><label for="select2">NIK </label></dt>
							<dd>
							<input type="text" id="nik" value="<?=$datatampil['nik']?>"  name="nik"  class="small required" size="50" />
							</dd>
						</dl>
						<input type=hidden id=exe name=exe value="<?=$ex?>" name=exee>
						<div class="buttons">
							<button type="submit" class="button">Save</button>
							<button type="button" onclick="self.history.back();" class="button">Cancel</button>
						</div>
					</fieldset>
				</form>