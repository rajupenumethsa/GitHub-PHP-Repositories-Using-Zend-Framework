Setting Up Your VHOST
----------------------

<VirtualHost *:80> 
	ServerName github.localhost 
	DocumentRoot "C:/wamp/www/Project/public"
	<Directory "C:/wamp/www/Project/public">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All 
		Require local 
	</Directory> 
</VirtualHost>
