#!/bin/bash

# CONFIGURE
HOST='ftp.example.net'	 		# set this
USER="user"				# set this
PASSWD="password"       		# set this
ROOT='/path/webserver/'			# set this

# SCRIPT EXEC
WEB='index.php'
DATE=`curl --silent www.ziggurats.net/orario.php` # this solution valid only italy
data=`echo $DATE | cut -f 1 -d' '`
ora=`echo $DATE | cut -f 2 -d' '`

ROOT_PATH=$ROOT
REMOTEPATH=$ROOT$data

#raspistill -o "$ora.jpg"                        #raspberry pi module camera
fswebcam -r 640x480 --jpeg 85 -D 1 "$ora.jpg"    #pc webcam access 

php ftp_sender.php $HOST $USER $PASSWD "$ora.jpg" $REMOTEPATH "$ora.jpg"
php ftp_sender.php $HOST $USER $PASSWD $WEB $REMOTEPATH $WEB

rm $ora'.jpg'
exit 0
