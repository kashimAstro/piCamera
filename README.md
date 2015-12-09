# piCamera raspberry simple security system.

configure raspberry pi:
<pre>sudo apt-get install ftp curl raspistill unzip wget
raspi-config: [enable camera module]
cd /home/pi/
wget https://github.com/kashimAstro/piCamera/archive/master.zip 
unzip master.zip</pre>

![alt tag](https://github.com/kashimAstro/piCamera/blob/master/pi.jpg)
![alt tag](https://github.com/kashimAstro/piCamera/blob/master/modpi.jpg)
        
configure crontab raspberry pi:
<pre>*/2 * * * * /home/pi/piCamera/camera_record.sh</pre>

configure web server:
<pre>create folder piCamera
create file .htaccess in piCamera/.htaccess
create file .htpasswd in piCamera/.htpasswd
update file index.php in piCamera/webserver/mainpage.php</pre>
