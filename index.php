<? include_once "koneksi.php";
session_start();
include_once "cekhakuser.php";
 ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Barcode System</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/skins/blue.css" title="blue">
<link rel="stylesheet" type="text/css" href="css/superfish.css">
<link rel="stylesheet" type="text/css" href="css/uniform.default.css">
<link rel="stylesheet" type="text/css" href="css/jquery.wysiwyg.css">
<link rel="stylesheet" type="text/css" href="css/facebox.css">
<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.8.8.custom.css">
<link rel="stylesheet" type="text/css" href="css/hend.css">
<link rel="stylesheet" type="text/css" href="chosen/chosen.css">
<!--[if lte IE 8]>
<script type="text/javascript" src="js/html5.js"></script>
<script type="text/javascript" src="js/selectivizr.js"></script>
<script type="text/javascript" src="js/excanvas.min.js"></script>
<![endif]-->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.8.custom.min.js"></script>

<script type="text/javascript" src="js/knockout-2.2.1.js"></script>
<script type="text/javascript" src="js/globalize.min.js"></script>
<script type="text/javascript" src="js/dx.chartjs.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/Delicious_500.font.js"></script>
<script type="text/javascript" src="js/jquery.flot.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/custom2.js"></script>
<script type="text/javascript" src="js/facebox.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/switcher.js"></script>
<script type="text/javascript" src="js/jscharts.js"></script>
<script src="js/raphael.2.1.0.min.js"></script>
<script src="js/justgage.1.0.1.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {

	$().live('ajaxStart',function() {
		$('#loading').show();
		$('#result').hide();
	})
	$().live('ajaxStop',function() {
		$('#loading').show();
		$('#result').fadeIn('fast');
	});

	$('#myForm').live('submit',function() {
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(data) {
				$('#result').html(data);
				
			}
		})
		return false;
	});
	$('#myFormxx').live('submit',function() {
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(data) {
				$('#result2').html(data);

			}
		})
		return false;
	});
	$('#myFormy').live('submit',function() {
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(data) {
				$('#getdat').html(data);
				document.getElementById("getdat").style.visibility="visible";
			}
		})
		return false;
	});
})

function PrintForm()
{ 
  var disp_setting="toolbar=no,location=no,directories=no,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=1000, height=700, left=0, top=0"; 
  
  var content_vlue = document.getElementById("divprint").innerHTML; 
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><link href="print.css" rel="stylesheet" type="text/css"><title>PT Dong San Indonesia</title>'); 
  // docprint.document.write('<style type="text/css"> table {font-size: 12px; border:1px; } </style>');          
   docprint.document.write('</head><body onLoad="self.print();" topmargin="0" leftmargin="0">');          
 //  docprint.document.write('</head><body onLoad="self.print();" topmargin="0" leftmargin="0">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}

function xsubmit()
{
	myFormxx.submit();
}
</script>
<script type="text/javascript" src="js/hend.js"></script>
<link rel="stylesheet" type="text/css" href="css/hend.css">
<style>
				   .dud {
					vertical-align:top;
					}
					.cih td {
					padding:2px;
					}
				</style>
	</head>

<body>

<? include_once "nav.php"; ?>

<section id="content">
	<section class="container_12 clearfix">
	
		<section id="main" class="grid_9 push_3">
		
		
			<? if ($_GET['link']==''){ 
				//include_once "info.php"; 
			?>
				
				<article id="dashboard">
				<h1>WELCOME !!!</h1>
					<img src="images/home.jpg" />
				<h1>Total Employe : 68 </h1>
				</article>
				<? }else {
				if (file_exists($_GET['link'])) { ?>
			<div id="loading" style="display:none;"><img src="images/loadingbox.gif" alt="loading..." /></div>
      		<div id="result"> </div>
			<article id="dashboard">
			<? include_once $_GET['link']; ?>
			</article>
						
				<?	} else { ?>
				
			<article id="dashboard"> <? echo "File Tidak tersedia "; ?></article> 
					<? }
			
			}
				//echo $_GET['link']; ?>
			
			
			
			
		</section>
<?
if ($_GET[h]==""){$_GET[h]=1;}
$qwtmenu= mysql_query("Select * from hd_menu where id_hdmenu='$_GET[h]'");
$datamenu=mysql_fetch_array($qwtmenu);
?>
		<aside id="sidebar" class="grid_3 pull_9">
			<div class="box menu">
				<h2>Menu <?=$datamenu['nm_hdmenu']?></h2>
				<section>
					<ul>
					<? $usrname='';
			$tampil1="SELECT m.nm_menu, m.file, ml.*  FROM tr_menulevel ml
			LEFT JOIN m_userlevel ul on ml.id_level=ul.id_level
			LEFT JOIN m_menu m on ml.id_menu=m.id_menu 
			WHERE ml.id_level='$_SESSION[leveluser]' and m.id_hdmenu='$_GET[h]' order by nm_menu";
			$hasil=mysql_query($tampil1);
			while ($data=mysql_fetch_array($hasil)){
			?>
						<li><a href="index.php?h=<?=$_GET['h']?>&link=<?=$data['file']?>"> <?=$data['nm_menu']?></a></li>
			<? } ?>
					</ul>
				</section>
			</div>
			<div class="box search">
				<center><img src="foto/<?=$_SESSION["nikuser"]?>.JPG"  /> <br /> User ID : <?=$_SESSION[userid]?> <br />NIK : <?=$_SESSION["nikuser"]?>  <br /> 
				</center>
			</div>
		</aside>
	</section>
</section>

<? include_once "footer.php"; ?>

</body>
</html>