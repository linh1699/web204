<script type="text/javascript">
	
function check(){
	var kiem=/[a-z0-9]+\@+[a-z]+\.+[a-z]/
	var iput=document.getElementsByTagName("input")
	var spa=document.getElementsByTagName("span")
	for( var i=0; i<iput.length; i++){
		if(iput[i].value=="")
			spa[i].innerHTML="Nhập dữ liệu"
			else 
				spa[i].innerHTML=""
		
		if(iput[0].value.length<6)
			spa[0].innerHTML="Nhập lại"
	    if(iput[0].value.length>25)
		    spa[0].innerHTML="Nhập lại"		
	
	}
	}
</script>
	