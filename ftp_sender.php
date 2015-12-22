#!/usr/bin/php5
<?php

function writeLog($CMD){
	@file_put_contents('/var/log/security_system_pi.log', $CMD, FILE_APPEND | LOCK_EX);
}

$host = $argv[1];
$usr  = $argv[2];
$pwd  = $argv[3];

$local_file = $argv[4]; // local file
$ftp_path   = $argv[5]; // remote path file
$name_ftp_file   = $argv[6]; // name remote file

writeLog("HOST::".$host."\n");
writeLog("USER::".$usr."\n");
writeLog("PASSWORD::".$pwd."\n");
writeLog("LOCAL_FILE_TRANSF::".$local_file."\n");
writeLog("REMOTE_FOLDER_TRANSF::".$ftp_path."\n");
 
$conn_id = ftp_connect($host, 21);
if(!$conn_id) {
	writeLog("Cannot connect to host:".$host."\n");
	exit(0);
}
$login = ftp_login($conn_id, $usr, $pwd) or die("Cannot login");
if(!$login) {
	writeLog("Cannot login:".$usr."\n");
	exit(0);
}
$dir = ftp_mkdir($conn_id,$ftp_path);
writeLog("Create Folder:".$dir."\n");

$cd = ftp_chdir($conn_id, $ftp_path);
if($cd) {
   $upload = ftp_put($conn_id, $name_ftp_file, $local_file, FTP_BINARY);
   echo (!$upload) ? writeLog('Cannot upload') : writeLog('Upload complete'); 
}
ftp_close($conn_id);
?>
