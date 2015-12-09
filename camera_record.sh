#!/bin/bash

# CONFIGURE
HOST='ftp.example.net'	 			# set this
USER="username"					# set this
PASSWD="password"       			# set this
ROOT='/path/webserver/'				# set this

# SCRIPT EXEC
WEB='index.php'
DATE=`curl --silent www.ziggurats.net/orario.php`
data=`echo $DATE | cut -f 1 -d' '`
ora=`echo $DATE | cut -f 2 -d' '`

ROOT_PATH=$ROOT
REMOTEPATH=$ROOT$data

raspistill -o "$ora.jpg"

ftp -n $HOST <<END_SCRIPT
quote USER $USER
quote PASS $PASSWD
cd $ROOT_PATH
mkdir $REMOTEPATH
cd $REMOTEPATH
put "$ora.jpg"
put $WEB
quit
END_SCRIPT
rm $ora'.jpg'
exit 0
