<html>
<head>
<style>
a{
        background:orange;
        color:black;
        padding:10px;
        text-decoration:none;
        border:1px solid black;
        position:relative;
        float:left;
        margin-left:20px;
        margin-top:20px;
}
body{
        background:black;
}
</style>
</head>
<body>
<?php
$s=scanDir('.');
for($i = 0; $i < count($s); $i++) {
        if($s[$i] == '.' || $s[$i] == '..' || $s[$i] == 'index.php' || $s[$i] == '.htaccess' || $s[$i] == '.htpasswd')
              continue;
        else{
              echo '<a href="javascript:window.open(\''.$s[$i].'/index.php\',\''.$s[$i].'\',\'width=345,height=265\')">'.str_replace('.jpg','',$s[$i]).'</a>'."\n";
        }
}
?>
</body>
</html>
