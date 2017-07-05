# MoviesDatabase

Matt Morgan & Erica Yee CS3200 Database Design

Our project is a searchable movie database. Movie data are conducive to use in a relational database because 
each movie is also connected to other entities with their own fields, such as people and studios. After 
exploring the available data, we decided to narrow our scope for this project to just movies made in the 1980s, 
which still gave us plenty of data to work with (around 800 unique movies, 3000 people).

The data was scraped from the Stanford InfoLab website, documentation  here(http://infolab.stanford.edu/pub/movies/doc.html). 
Some data is in XML format and some in HTML. We used online converters to get all the data in CSV files, then 
cleaned the data using Microsoft Excel. After standardizing the data, we used online converters again to format 
the data into SQL INSERT statements. Our database back-end is in SQL, built with MySQL workbench. The front end 
is web-based and uses html and javascript to provide a display to the user. We used the PHP language as the connector 
between the front and back end, since it allows us to connect to the sql server and perform queries directly from our
webpage. For the read functionality, we used Jquery/Ajax to provide the user with a fast and responsive search for all 
the tables in the database.

SETUP:
First, load up MySQL Workbench and and run the existing Initialize.sql script to create the database. 
Then, run the import scripts in the import folder in the following order: movies, people, studios, directs, 
actsin, produces, makes. This will ensure that foreign key constraints are not broke as the data in imported. 
Once the database is filled with the preliminary data from the Stanford InfoLab, you’re ready to connect the front end.

First you need to make sure you have php installed. Instructions on installation can be found here:  
http://php.net/manual/en/install.php . Next, you might need to go through the php files themselves and 
change some of the server information to match the criteria on your machine. 
Right now the username (DB_USER) and password (DB_PASSWORD) are set to “root”, and the host server (DB_HOST) is set to 
“127.0.0.1”, these are the default values for mysql, but they are different on your machine please change in the following 
files in the webdocs directory:

Mysql_connect.php Fetchmovie.php 
Fetchperson.php Fetchstudio.php
You’re now ready to get the php server running and start using the front end! From your console, cd into the webdocs directory. 
Then run the following command to start a local php server: php -S localhost:8080 . 
Then in your browser navigate to localhost:8080, and the front end should be up and running!

for more information, view the final project pdf!
