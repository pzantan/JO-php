<? include_once "koneksi.php"; 
list($kdpro,$nmpro) = explode("|",$_GET['cba']) ;
$hasil4=mysql_query("SELECT * FROM mproses where idproses='$kdpro'");
$dtkamar=mysql_fetch_array($hasil4);
?>
	 					<input type="text" value="<?=$dtkamar['estitime']?>" id="isi2"  name="isi2" size="10" /> Minute  &nbsp; &nbsp; &nbsp; 
							<select name="2" id="isi3" class="sel" >
								<option value="">Choose Mechine</option>
								<? 
								$hasil9=mysql_query("SELECT * FROM m_mesin");
								while ($datatampil9=mysql_fetch_array($hasil9)){ ?>
									<option <? if($dtkamar['idmesin']== $datatampil9['idmesin']){echo "selected=\"selected\"" ;} ?> value="<?=$datatampil9['idmesin']?>|<?=$datatampil9['nmmesin']?>"><?=$datatampil9['nmmesin']?></option>
								<? } ?>
								</select>