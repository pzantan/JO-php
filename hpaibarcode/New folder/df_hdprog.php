<? include_once "koneksi.php"; ?>
<h1>Header Menu List </h1>
	<a href="index.php?h=<?=$_GET['h']?>&link=frm_addhdprog.php">Add </a>
	<table id="table2" class="gtable detailtable">
		<thead>
		<tr>
		<th>Menu Header ID</th>
		<th>Menu Header Name</th>
		<th>&nbsp;</th>
		</tr>
		</thead>
		
	<? $s=1;
			$hasilqw=mysql_query("SELECT * FROM hd_menu");
			while ($datatampil=mysql_fetch_array($hasilqw)){ ?>
		<tr>
		<td><?=$datatampil['id_hdmenu']?></td>
		<td><?=$datatampil['nm_hdmenu']?></td>
		<td>
		 <a href="index.php?h=<?=$_GET['h']?>&link=frm_addhdprog.php&idhdprog=<?=$datatampil['id_hdmenu']?>">Edit</a> 
		/ <a href="index.php?h=<?=$_GET['h']?>&link=frm_delhdprog.php&idhdprog=<?=$datatampil['id_hdmenu']?>">Delete</a></td>
		</tr>	
		<tr class="detail">
							<td colspan="9"></td>
						</tr>
	<?	$s++;	}
	?>	
		
	</table>