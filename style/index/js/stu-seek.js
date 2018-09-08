window.onload=function(){
			var oTab=document.getElementById('tab1');
			var oTxt=document.getElementById('name');
			var oBtn=document.getElementById('btn1');

			oBtn.onclick=function(){
				for (var i =0; i <oTab.tBodies[0].rows.length; i++) {
					var sTab=oTab.tBodies[0].rows[i].cells[1].innerHTML;
					var sTxt=oTxt.value.toLowerCase();

					var arr=sTxt.split(' ');
					oTab.tBodies[0].rows[i].style.display='none';

					for (var j = 0; j < arr.length; j++) {
						if (sTab.search(arr[j])!=-1) 
						{
							oTab.tBodies[0].rows[i].style.display='table-row';
				}
					}



					
				
				}
			};
		};