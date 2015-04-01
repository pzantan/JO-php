
			$(document).ready(function(){		
				
				$('.del').live('click',function(){
					$(this).parent().parent().remove();
				});
				$('#isi1').live('change',function(){
					var isinya = document.getElementById('isi1').value;
					isinya = isinya.split("|");
					document.getElementById('isi3').value=isinya[2];
					document.getElementById('isi4').value=isinya[3];
					$('#isi2').focus();	
				
				});
				$('.add').live('click',function(){
					//$(this).val('Delete');
					//$(this).attr('class','del');
					//isinya = "sdamdasdlas";
					
					var isinya = document.getElementById('isi1').value;
					var isinya2 = document.getElementById('isi2').value;
					var isinya3 = document.getElementById('isi3').value;
					isinya = isinya.split("|");
					var appendTxt = "<tr><td><input type='hidden' value='"+ isinya[0] +"' name='kdbrgtx[]' />";
					appendTxt +="<input type='text' value='"+ isinya[1] +"' name='nmbrgtx[]' /></td>";
					appendTxt +="<td><input type='text' value='"+isinya2+"' name='qtytx[]' /></td>";
					appendTxt +="<td><input type='text' value='"+isinya3+"' name='sattx[]' /></td>";
					appendTxt +="<td><input type='button' class='del' value='del' /></td></tr>";
					$('.last').after(appendTxt);	
					$('#isi1').focus();	
						
					//alert('coba');
				});
				$('.addmkpi').live('click',function(){
					//$(this).val('Delete');
					//$(this).attr('class','del');
					//isinya = "sdamdasdlas";
					
					var isinya = document.getElementById('isi1').value;
					var isinya2 = document.getElementById('isi2').value;
					isinya = isinya.split("|");
					var appendTxt = "<tr><td><input type='text' value='"+ isinya[0] +"' name='kdbkpi[]' readonly /></td>";
					appendTxt +="<td><input type='text' value='"+ isinya[1] +"' name='nmkpi[]' /></td>";
					appendTxt +="<td><input type='text' value='"+isinya2+"' name='wgkpi[]' /></td>";
					appendTxt +="<td><input type='button' class='del' value='del' /></td></tr>";
					$('.last').after(appendTxt);	
					$('#isi1').focus();	
						
					//alert('coba');
				});
				$('.addharga2').live('click',function(){
					//$(this).val('Delete');
					//$(this).attr('class','del');
					//isinya = "sdamdasdlas";
					
					var isinya = document.getElementById('isi1').value;
					var isinya2 = document.getElementById('isi2').value;
					var isinya3 = document.getElementById('isi3').value;
					var isinya6 = document.getElementById('isi6').value;
					var isinya7 = document.getElementById('isi7').value;
					isinya = isinya.split("|");
					var appendTxt = "<tr><td><input type='hidden' value='"+ isinya[0] +"' name='kdbrgtx[]' />";
					appendTxt +="<input type='text' value='"+ isinya[1] +"' name='nmbrgtx[]' /></td>";
					appendTxt +="<td><input type='text' value='"+isinya2+"' name='qtytx[]' size='3' /></td>";
					appendTxt +="<td><input type='text' value='"+isinya3+"' name='sattx[]' size='5' /></td>";
					appendTxt +="<td><input type='text' value='"+isinya6+"' name='qtykem[]'  size='7' /></td>";
					appendTxt +="<td><input type='text' value='"+isinya7+"' name='jnkem[]'  size='10' /></td>";
					appendTxt +="<td><input type='button' class='del' value='del' /></td></tr>";
					$('.last').after(appendTxt);	
					$('#isi1').focus();	
						
					//alert('coba');
				}); 
				$('.addharga').live('click',function(){
					//$(this).val('Delete');
					//$(this).attr('class','del');
					//isinya = "sdamdasdlas";
					
					var isinya = document.getElementById('isi1').value;
					var isinya2 = document.getElementById('isi2').value;
					var isinya3 = document.getElementById('isi3').value;
					var isinya4 = document.getElementById('isi4').value;
					var isinya5 = isinya2*isinya4;
					isinya = isinya.split("|");
					var appendTxt = "<tr><td><input type='hidden' value='"+ isinya[0] +"' name='kdbrgtx[]' />";
					appendTxt +="<input type='text' value='"+ isinya[1] +"' name='nmbrgtx[]' /></td>";
					appendTxt +="<td><input type='text' value='"+isinya2+"' name='qtytx[]' size='3' /></td>";
					appendTxt +="<td><input type='text' value='"+isinya3+"' name='sattx[]' size='5' /></td>";
					appendTxt +="<td><input type='text' value='"+isinya4+"' name='hrgtx[]'  size='3' /></td>";
					appendTxt +="<td><input type='text' value='"+isinya5+"' name='jmltx[]'  size='5' /></td>";
					appendTxt +="<td><input type='button' class='del' value='del' /></td></tr>";
					$('.last').after(appendTxt);	
					$('#isi1').focus();	
						
					//alert('coba');
				}); 
				$('.add2').live('click',function(){
					
					var isinya = document.getElementById('isi1').value;
					var isinya2 = document.getElementById('isi2').value;
					var isinya3 = document.getElementById('isi3').value;
					var isinya4 = document.getElementById('isi4').value;
					isinya = isinya.split("|");
					var appendTxt = "<tr><td><input type='hidden' value='"+ isinya[0] +"' name='kdbrgtx[]' />";
					appendTxt +="<input type='text' value='"+ isinya[1] +"' name='nmbrgtx[]' /></td>";
					appendTxt +="<td><input type='text' value='"+isinya2+"' size=\"3\" name='qtytx[]' /></td>";
					appendTxt +="<td><input type='text' value='"+isinya3+"' size=\"3\" name='sattx[]' /></td>";
					appendTxt +="<td><input type='text' value='"+isinya4+"' name='ketisi[]' /></td>";
					appendTxt +="<td><input type='button' class='del' value='del' /></td></tr>";
					$('.last').after(appendTxt);	
					$('#isi1').focus();	
						
					//alert('coba');
				}); 
				$('.addpro').live('click',function(){
					
					var isinya = document.getElementById('isi1x').value;
					var isinya2 = document.getElementById('isi2').value;
					var isinya3 = document.getElementById('isi3').value;
					isinya = isinya.split("|");
					isin3 = isinya3.split("|");
					var appendTxt = "<tr><td><input type='hidden' value='"+ isinya[0] +"' name='kdbrgtx[]' />";
					appendTxt +="<input type='text' value='"+ isinya[1] +"' name='nmbrgtx[]' /></td>";
					appendTxt +="<td><input type='text' value='"+isinya2+"' size=\"3\" name='qtytx[]' /> Minute</td>";
					appendTxt +="<td><input type='hidden' value='"+isin3[0]+"' size=\"3\" name='kdmesin[]' /><input type='text' value='"+isin3[1]+"' size=\"30\" name='nmmesin[]' /></td>";
					appendTxt +="<td><input type='button' class='del' value='del' /></td></tr>";
					$('.last').after(appendTxt);	
					$('#isi1').focus();	
						
					//alert('coba');
				}); 
				
				$('#txsup').live('change',function(){
					var isinya = document.getElementById('txsup').value;
					isinya = isinya.split("|");
					var isifull = "<input type=hidden value='"+isinya[0]+"' id=kdsup name=kdsupp /> Kode Supplier : "+isinya[0]+"  <br /> Nanma Supplier : "+isinya[1]+"  <br /> Negara :"+isinya[2];
					$('#isitxsup').html(isifull);	
				
				});
				
				$('#txsub').live('change',function(){
					var isinya = document.getElementById('txsub').value;
					isinya = isinya.split("|");
					var isifull = "Kode Subcont : "+isinya[0]+"  <br /> Nanma Subcont : "+isinya[1]+"  <br /> Negara :"+isinya[2];
					$('#isitxsup').html(isifull);	
				
				});
				
				$('#gettxwo').live('change',function(){
					//alert('duuuttt');
					var isi= this.value;
					$.ajax({
						type: 'GET',
						url: 'getdetailwo.php',
						data: 'cba='+isi,
						success: function(data) {
						//$('#result').html(data);
						$('#detwoo').html(data);
						}
						})
						return false;
				});
				$('#gettxwo2').live('change',function(){
					//alert('duuuttt');
					var isi= this.value;
					$.ajax({
						type: 'GET',
						url: 'getdetailwo2.php',
						data: 'cba='+isi,
						success: function(data) {
						//$('#result').html(data);
						$('#detwoo').html(data);
						}
						})
						return false;
				});
				$('#getpoin').live('change',function(){
					//alert('duuuttt');
					var isi= this.value;
					$.ajax({
						type: 'GET',
						url: 'getdetailpoin.php',
						data: 'cba='+isi,
						success: function(data) {
						//$('#result').html(data);
						$('#detpoin').html(data);
						}
						})
						return false;
				});
				$('#getpoout').live('change',function(){
					//alert('duuuttt');
					var isi= this.value;
					$.ajax({
						type: 'GET',
						url: 'getdetailpoout.php',
						data: 'cba='+isi,
						success: function(data) {
						//$('#result').html(data);
						$('#detpoin').html(data);
						}
						})
						return false;
				});
				$('#getsj').live('change',function(){
					//alert('duuuttt');
					var isi= this.value;
					$.ajax({
						type: 'GET',
						url: 'getdetailsj.php',
						data: 'cba='+isi,
						success: function(data) {
						//$('#result').html(data);
						$('#detpoin').html(data);
						}
						})
						return false;
				});
				$('#getbrgpo').live('change',function(){
					//alert('duuuttt');
					var isi= this.value;
					$.ajax({
						type: 'GET',
						url: 'getbrgpoin.php',
						data: 'cba='+isi,
						success: function(data) {
						//$('#result').html(data);
						$('#ganti').html(data);
						}
						})
						return false;
				});
				$('#getmodel').live('change',function(){
					//alert('duuuttt');
					var isi= this.value;
					var isinya = document.getElementById('pesanno').value;
					$.ajax({
						type: 'GET',
						url: 'getmodelpesan.php',
						data: 'cba='+isi+'&pesno='+isinya,
						success: function(data) {
						//$('#result').html(data);
						$('#hasil').html(data);
						}
						})
						return false;
				});
				$('#getsjcust').live('change',function(){
					//alert('duuuttt');
					var isinya = document.getElementById('getsjcust').value;
					//alert(isinya);
					isinya = isinya.split("|");
					var isifull = "<input type='hidden' value='"+ isinya[0] +"' name='nosjnya' />"+"Tanggal : "+isinya[1]+"  Nanma Customer : "+isinya[2];
					$('#isitexsj').html(isifull);	
				});
				$('#tombol1').live('click',function(){
					//alert('duuuttt');
					var blnnya = document.getElementById('bln').value;
					var thnnya = document.getElementById('thn').value;
					var brgnya = document.getElementById('isi1').value;
					var depnya = document.getElementById('dep').value;
					$.ajax({
						type: 'GET',
						url: 'viewbrg.php',
						data: 'bln='+blnnya+'&thn='+thnnya+'&brg='+brgnya+'&dep='+depnya,
						success: function(data) {
						//$('#result').html(data);
						$('#tampilstok').html(data);
						}
						})
						return false;
				});
				$('#tombol2').live('click',function(){
					//alert('duuuttt');
					var blnnya = document.getElementById('bln').value;
					var thnnya = document.getElementById('thn').value;
					var brgnya = document.getElementById('isi1').value;
					var depnya = document.getElementById('dep').value;
					$.ajax({
						type: 'GET',
						url: 'viewbrgajus.php',
						data: 'bln='+blnnya+'&thn='+thnnya+'&brg='+brgnya+'&dep='+depnya,
						success: function(data) {
						//$('#result').html(data);
						$('#tampilstok').html(data);
						}
						})
						return false;
				});
				$('#tombol3').live('click',function(){
					//alert('duuuttt');
					var blnnya = document.getElementById('bln').value;
					var thnnya = document.getElementById('thn').value;
					var brgnya = document.getElementById('isi1').value;
					var depnya = document.getElementById('dep').value;
					$.ajax({
						type: 'GET',
						url: 'viewopname.php',
						data: 'bln='+blnnya+'&thn='+thnnya+'&brg='+brgnya+'&dep='+depnya,
						success: function(data) {
						//$('#result').html(data);
						$('#tampilstok').html(data);
						}
						})
						return false;
				});
				$('#txsjtosub').live('change',function(){
					//alert('duuuttt');
					var isi= this.value;
					$.ajax({
						type: 'GET',
						url: 'getdetailpoout.php',
						data: 'cba='+isi,
						success: function(data) {
						//$('#result').html(data);
						$('#detpoin').html(data);
						}
						})
						return false;
				});
				$('#getdatak').live('click',function(){
					//alert('duuuttt');
					var isi= this.value;
					$.ajax({
						type:'GET',
						url: 'frm_addkarirkar.php',
						data: 'cba='+isi,
						success: function(data) {
						//$('#result').html(data);
						$('#getdatanya').html(data);
						}
						})
						return false;
				});
				$('#getproses').live('change',function(){
					//alert('duuuttt');
					var isi= this.value;
					$.ajax({
						type:'GET',
						url: 'getproses.php',
						data: 'cba='+isi,
						success: function(data) {
						//$('#result').html(data);
						$('#tampil').html(data);
						}
						})
						return false;
				});				
				$('#munx').live('click',function(){
					
					var isi= this.href;
					//alert(isi);
					document.getElementById("getdat").style.visibility="visible";
					$.ajax({
						type:'GET',
						url: isi,
						data: 'cba='+isi,
						success: function(data) {
						//$('#result').html(data);
						$('#getdat').html(data);
						}
						})
						return false;
				});	
				$('.getmsn').live('change',function(){
					
					var isi= this.value;
					//alert(isi);
					//document.getElementById("getdat").style.visibility="visible";
					$.ajax({
						type:'GET',
						url: 'getmesin.php',
						data: 'cba='+isi,
						success: function(data) {
						//$('#result').html(data);
						$('#ganti').html(data);
						}
						})
						return false;
				});	
				
				$('.kdjo').live('change',function(){
					
					var isi= this.value;
					var nomor = document.getElementById('txid2').value;
					nomor = isi+nomor;
					document.getElementById('txid').value = nomor;
					//alert(isi);
					
					return false;
				});	
				$('#closebut').live('click',function(){
					document.getElementById("getdat").style.visibility="hidden";
					return false;
				});	
				$().live('nongol',function() {
						alert('nongol');
				})
			});
			function getdata(divnya,urlnya,isinya){
					//alert(divnya + urlnya + isinya);
					$.ajax({
						type: 'GET',
						url: urlnya,
						data: 's='+isinya,
						success: function(data) {
						//$('#result').html(data);
						$(divnya).html(data);
						}
						})
						return false;
}	
function getview(divnya,urlnya,isinya){
					//alert(divnya + urlnya + isinya);
					document.getElementById("getdat").style.visibility="visible";
					$.ajax({
						type: 'GET',
						url: urlnya,
						data: 's='+isinya,
						success: function(data) {
						//$('#result').html(data);
						$(divnya).html(data);
						}
						})
						return false;
}