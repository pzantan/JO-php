<? include_once "koneksi.php"; ?>
<h1>Tabel Menu</h1>
	<a href="index.php?h=<?=$_GET['h']?>&link=frm_addprog.php">Add </a>
	<table id="table2" class="gtable detailtable">
		<thead>
		<tr>
		<th>No </th>
		<th>File Program</th>
		<th>Nama Menu</th>
		<th>Menu Header</th>
		<th>&nbsp;</th>
		</tr>
		</thead>
		
	<? $s=1;
			$hasilqw=mysql_query("SELECT * FROM m_menu m LEFT JOIN hd_menu h on m.id_hdmenu=h.id_hdmenu");
			while ($datatampil=mysql_fetch_array($hasilqw)){ ?>
		<tr>
		<td><?=$s?> </th>
		<td><?=$datatampil['file']?></td>
		<td><?=$datatampil['nm_menu']?></td>
		<td><?=$datatampil['nm_hdmenu']?></td>
		<td>
		 <a href="index.php?h=<?=$_GET['h']?>&link=frm_addprog.php&idprog=<?=$datatampil['id_menu']?>">Edit</a> 
		/ <a href="index.php?h=<?=$_GET['h']?>&link=frm_delprog.php&idprog=<?=$datatampil['id_menu']?>">Delete</a></td>
		</tr>	
		<tr></tr>	
	<?	$s++;	}
	?>	
		
	</table>