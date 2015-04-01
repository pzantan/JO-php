				<? 
				function getTglview($tanggal){
					list($thn,$bln,$tgl) = explode("-",$tanggal) ;
					return $bln ."/". $tgl ."/". $thn ;
				}
				if ($_GET['usr']=='') { ?>
				<h1>Add  Subcount</h1>
				<?
				$ex = "1";
				 }else{ ?>
				<h1>Edit Data Subcount <?=$_GET['usr']?></h1>
				<?
				$read = "readonly=\'readonly\'";
				$ex = "2";
				  
				 $hasilqw=mysql_query("SELECT *  FROM m_subcont where kdsubcont='$_GET[usr]'");
				 $datatampil=mysql_fetch_array($hasilqw);
				// if ($datatampil['thnpembuatan']=='') { $tgllahir='01/01/2000'; } else { $tgllahir=getTglview($datatampil['thnpembuatan']); }
				 }
				 ?>
				 
				<form id="myForm" NAME="myForm" class="uniform" action="addsub.php" method="POST">
					<fieldset>
						<legend>Data Subcount</legend>
						<dl class="inline">
							<dt><label for="name">Code Subcount</label></dt>
							<dd>
								<input type="text" <?=$read?> value="<?=$datatampil['kdsubcont']?>"  id="txid" name="txid" class="small required" size="50" />
							</dd>
							<dt><label for="name">Description</label></dt>
							<dd>
								<input type="text" id="txdesc" value="<?=$datatampil['nmsubcont']?>"  name="txdesc"  class="small" size="50" />
							</dd>
							<dt><label for="name">Price</label></dt>
							<dd>
								<input type="text" id="txprice" value="<?=$datatampil['harga']?>"  name="txprice"  class="small" size="50" />
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