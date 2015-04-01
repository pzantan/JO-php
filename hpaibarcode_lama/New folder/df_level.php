<? include_once "koneksi.php"; ?>
<h1>Level List  </h1>
	<a href="index.php?h=<?=$_GET['h']?>&link=frm_addlevel.php">Add </a>
	<table id="table2" class="gtable detailtable">
		<thead>
		<tr>
		<th><input type="checkbox" class="checkall" /></th>
		<th>Level ID</th>
		<th>Level Name</th>
		<th>&nbsp;</th>
		</tr>
		</thead>
		<tbody>
	<? 		$s=1;
			$hasilqw=mysql_query("SELECT * FROM m_userlevel");
			while ($datatampil=mysql_fetch_array($hasilqw)){ ?>
		
		<tr>
		<td><input type="checkbox" class="checkall" /></td>
		<td><?=$datatampil['id_level']?></td>
		<td><?=$datatampil['nm_level']?></td>
		<td>
		 <a href="index.php?h=<?=$_GET['h']?>&link=frm_addlevel.php&idlevel=<?=$datatampil['id_level']?>">Edit</a> 
		/ <a href="index.php?h=<?=$_GET['h']?>&link=frm_dellevel.php&idlevel=<?=$datatampil['id_level']?>">Delete</a>
		/ <a href="#" class="detail-link">Detail</a>
		/ <a href="index.php?h=<?=$_GET['h']?>&link=frm_adddetaillevel.php&idlevel=<?=$datatampil['id_level']?>" >Add Detail</a>
		</td>
		</tr>
					<tr class="detail">
							<td colspan="7">
								<table>
									<thead>	<tr>
											<th>No</th>
											<th>Menu Name</th>
											<th>File Name</th>
											<th>Add</th>
											<th>Edit</th>
											<th>Delete</th>
											<th>Action</th>
											</tr>
									</thead>
									<tbody>
									<? 	$r=1;
									$hasildetail=mysql_query("SELECT m.nm_menu, m.file, ml.*  FROM tr_menulevel ml
										LEFT JOIN m_userlevel ul on ml.id_level=ul.id_level
										LEFT JOIN m_menu m on ml.id_menu=m.id_menu WHERE ml.id_level='$datatampil[id_level]' ");
									while ($datatetail=mysql_fetch_array($hasildetail)){ ?>
										<tr>
											<td><?=$r?></td>
											<td><?=$datatetail['nm_menu']?></td>
											<td><?=$datatetail['file']?></td>
											<td><?=$datatetail['tr_c']?></td>
											<td><?=$datatetail['tr_d']?></td>
											<td><?=$datatetail['tr_i']?></td>
											<td><a href="index.php?h=<?=$_GET['h']?>&link=frm_deldetlevel.php&idulevel=<?=$datatetail['tr_idulevel']?>">Delete</a></td>
										</tr>
									<? $r++; } ?>
									</tbody>
								</table>
							</td>
						</tr>
		
	<?	$s++;	}
	?>	
		</tbody>
	</table>