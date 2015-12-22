<html>
<head>
<style>
.pgif {
	position:absolute;
}
</style>
</head>

<body>
<script>
<?php
	$PATH="";
	$SIZEx=320;
	$SIZEy=280;
	$TIMER=100;

	$image_path="";
	$id_div="";
	$scan = scandir("./".$PATH);
	for($i = 0; $i < count($scan); $i++){
			if($scan[$i] == '.' || $scan[$i] == '..' || $scan[$i] == 'index.php')
			continue;
		else{
			$image_path.='"'.$scan[$i].'",';
			$id_div.='"img'.$i.'",';
		}
	}
	echo 'var list = ['.$image_path.'];'."\n";
	echo 'var idlist = ['.$id_div.'];'."\n";
	echo "function populate(){\n";
		echo 'for(var i = 0; i < list.length; i++){
			document.body.innerHTML += "<div class=\"pgif\" id=\""+idlist[i]+"\"><img height=\"'.$SIZEy.'px\" width=\"'.$SIZEx.'px\" src=\"'.$PATH.'"+list[i]+"\"></div>";
	
	        }';
	echo "}\n";

	echo "populate();\n";

	echo "var counter=idlist.length-1;\n";
	echo 'console.log(counter);';
	echo 'setInterval(function(){ 
		console.log("Event");
		console.log(idlist[counter]);
		document.getElementById(idlist[counter]).style.display="none";
		counter--;
		if(counter<=0){
			counter=idlist.length-1;
			for(var i = 0; i < idlist.length; i++)
				document.getElementById(idlist[i]).style.display="block";
		}
	}, '.$TIMER.');';

	echo '</script>'."\n";
?>
<script>
</script>
</body>
</html>
