
			$(document).ready(function(){		
				
				$('.del').live('click',function(){
					$(this).parent().parent().remove();
				});
				$('#isi1').live('change',function(){
					var isinya = document.getElementById('isi1').value;
					isinya = isinya.split("|");
					document.getElementById('isi3').value=isinya[2];
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
				
			});