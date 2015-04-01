<? include_once "koneksi.php";
 ?>
<header id="top1">
	<div class="container_12 clearfix">
		<div id="logo" class="grid_5">
			<!-- replace with your website title or logo -->
			<img src="images/logojudul.jpg" alt="PT. Cakarwala" />
		</div>
		<!--
		<div id="userinfo" class="grid_3">
			Welcome, <a href="#"><?=$_SESSION["namaluser"]?></a>
		</div>
		-->
	</div>
</header>

<nav id="topmenu2">
	<div class="container_12 clearfix">
		<div class="grid_12">
			<ul id="mainmenu" class="sf-menu">
			<? $usrname='';
			$tampil1="SELECT DISTINCt(hd.id_hdmenu), hd.nm_hdmenu  FROM tr_menulevel ml
						LEFT JOIN m_menu m on ml.id_menu=m.id_menu 
						LEFT JOIN hd_menu hd on m.id_hdmenu=hd.id_hdmenu
						WHERE ml.id_level='$_SESSION[leveluser]' order by hd.id_hdmenu ";
			$hasil=mysql_query($tampil1);
			while ($data=mysql_fetch_array($hasil)){
			?>
				<li><a href="index.php?h=<?=$data['id_hdmenu']?>"><?=$data['nm_hdmenu']?></a></li>
			<? } ?>
			</ul>
			<ul id="usermenu">
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
</nav>