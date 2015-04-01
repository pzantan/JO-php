<? include_once "koneksi.php"; ?>
<h1>User List </h1>
	<a href="index.php?h=<?=$_GET['h']?>&link=frm_adduser.php">Add </a>
	<table id="table2" class="gtable detailtable">
		<thead>
		<tr>
		<th>No </th>
		<th>User ID</th>
		<th>User Name</th>
		<th>Level</th>
		<th>NIK</th>
		<th>&nbsp;</th>
		</tr>
		</thead>
		
	<? $s=1;
			$hasilqw=mysql_query("SELECT * FROM m_user m LEFT JOIN m_userlevel ul ON m.usr_level=ul.id_level");
			while ($datatampil=mysql_fetch_array($hasilqw)){ ?>
		<tr>
		<td><?=$s?> </th>
		<td><?=$datatampil['usr_user']?></td>
		<td><?=$datatampil['usr_nama']?></td>
		<td><?=$datatampil['nm_level']?></td>
		<td><?=$datatampil['nik']?></td>
		<td>
		<a href="index.php?h=<?=$_GET['h']?>&link=frm_pwsuser.php&usr=<?=$datatampil['usr_user']?>">Set Password</a> 
		/ <a href="index.php?h=<?=$_GET['h']?>&link=frm_adduser.php&usr=<?=$datatampil['usr_user']?>">Edit</a> 
		/ <a href="index.php?h=<?=$_GET['h']?>&link=frm_deluser.php&usr=<?=$datatampil['usr_user']?>">Delete</a></td>
		</tr>	
		<tr class="detail">
							<td colspan="9"></td>
						</tr>

	<?	$s++;	}
	?>	
		
	</table>