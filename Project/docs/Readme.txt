Setting Up Your VHOST
----------------------
Add the below part to httpd-vhosts.conf file under wamp\bin\apache\apache_version\conf\extra folder. make sure this line "Include conf/extra/httpd-vhosts.conf" is un-commented in httpd.conf file under wamp\bin\apache\apache_version\conf folder.

<VirtualHost *:80> 
	ServerName github.localhost 
	DocumentRoot "C:/wamp/www/Project/public"
	<Directory "C:/wamp/www/Project/public">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All 
		Require local 
	</Directory> 
</VirtualHost>
