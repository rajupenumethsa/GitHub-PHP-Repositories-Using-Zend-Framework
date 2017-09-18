# GitHub-Repositories-Using-Zend-Framework
PHP Zend framework application to interact with GitHub API (3rd party API) and display the most starred PHP projects in GitHub.

# Architecture
Zend Framework provides an advanced Model-View-Controller (MVC) implementation.
Most web application code falls under one of the following three categories: data access (Model), presentation (View) and business logic (Control).

Model - This is the part of your application that defines its basic functionality behind a set of abstractions. Data access routines and some business logic can be defined in the model.

View - Views define exactly what is presented to the user. Usually controllers pass data to each view to render in some format. Views will often collect data from the user, as well. This is where you're likely to find HTML markup in your MVC applications.

Controller - Controllers bind the whole pattern together. They manipulate models, decide which view to display based on the user's request and other factors, pass along the data that each view will need, or hand off control to another controller entirely.

# Technologies Used
WAMP SERVER 3.0.6
-> PHP 5.6
-> Apache 2.4
-> MySQL 5.7,
Zend Framework 1.12,
HTML5, CSS and DataTable JQuery Plugin.

# Installation Steps
1. If your system has Wampserver installed before, move to step 3.
2. Download and Install WampServer 3.0.6
3. Start Wampserver.
4. Clone this repository to your computer and move the Project folder to C:\wamp\www\
5. Add 127.0.0.1 github.localhost to your hosts file (located in windows generally at "C:\Windows\System32\drivers\etc").
6. Enable mod_rewrite in Apache.
7. Go to Project\docs\Readme.txt and follow the steps to add a virtualhost.
8. Log into PhpMyAdmin using your username and password. (username"root" and password "" if wampserver is newly installed).
9. Find the SQL file (Query.sql) in the project folder. Import the sql file and run the queries.
10. Find "application.ini" file under application\configs folder and update your database settings.
11. Restart All Services in Wampserver.
12. Enter http://github.localhost/ in your browser window.

# References
https://developer.github.com/v3/

https://developer.github.com/v3/search/

http://www.orchidbox.com/post.php?title=How_to_enable_mod_rewrite_module_in_apache_in_xampp_wamp
