First, load up MySQL Workbench and and run the existing Initialize.sql script to create the database.  Then, run the import scripts in the import folder in the following order: movies, people, studios, directs, actsin, produces, makes. This will ensure that foreign key constraints are not broke as the data in imported. Once the database is filled with the preliminary data from the Stanford InfoLab, you’re ready to connect the front end.
 
First you need to make sure you have php installed. Instructions on installation can be found here: http://php.net/manual/en/install.php. Next, you might need to go through the php files themselves and change some of the server information to match the criteria on your machine. Right now the username (DB_USER) and password (DB_PASSWORD) are set to “root”, and the host server (DB_HOST) is set to “127.0.0.1”, these are the default values for mysql, but they are different on your machine please change in the following files in the webdocs directory:
Mysql_connect.php
Fetchmovie.php
Fetchperson.php
Fetchstudio.php

You’re now ready to get the php server running and start using the front end! From your console, cd into the webdocs directory. Then run the following command to start a local php server: php -S localhost:8080 . Then in your browser navigate to localhost:8080, and the front end should be up and running!
