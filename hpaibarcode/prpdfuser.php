<? include_once "koneksi.php"; 
?>
<h1>Print Barcode User </h1>
	<form  method="POST" action="pdf2.php"> 
	<dt><label for="name">User</label></dt>
							<dd>
								<select id="txcust" name="txuser" class="medium" >
								<option value=''>Choose User</option>
								<? 
								$hasil9=mysql_query("SELECT * FROM m_user where usr_sts='Y'");
								while ($datatampil9=mysql_fetch_array($hasil9)){ ?>
									<option  value="<?=$datatampil9['nik']?>|<?=$datatampil9['usr_nama']?>"><?=$datatampil9['nik']?> <?=$datatampil9['usr_nama']?></option>
								<? } ?>
								</select>
							</dd>
	<dt><label for="name">Location</label></dt>
	<dd>
	<select id="select2" name="loc" class="small" >
	<option value="1"> 1 : 1</option>
	<option value="2"> 1 : 2</option>
	<option value="3"> 1 : 3</option>
	<option value="4"> 2 : 1</option>
	<option value="5"> 2 : 2</option>
	<option value="6"> 2 : 3</option>
	<option value="7"> 3 : 1</option>
	<option value="8"> 3 : 2</option>
	<option value="9"> 3 : 3</option>
	<option value="10"> 4 : 1</option>
	<option value="11"> 4 : 2</option>
	<option value="12"> 4 : 3</option>
</select>
							</dd>
							<button type="submit" class="button">Print</button>
	</form>
	<br />
