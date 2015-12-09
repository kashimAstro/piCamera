<html>
<body>
<?php
	exec("convert -delay 2 -loop 0 *.jpg animation.gif");
	echo '<img src="animation.gif"/>';
?>
</body>
</html>
