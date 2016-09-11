# YoubiquiTour
This is a virtual museum developed in php, obtain all the moves from the visitors to the POI and then calculate the recommendation to the others POI.
Instructions:
1.- Create your data base with the name Ubiquitour.
2.- Run the FULLYoubiquiTour.sql dump file in your mysql server.
3.- Copy the YoubiquiTor folder in your http apache folder.
4.- Change the data base configuration in YoubiquiTour/system/application/config/database.php
You will find the following configuration lines:


$db['default']['hostname'] = "localhost";
$db['default']['username'] = "root";
$db['default']['password'] = "";
$db['default']['database'] = "Ubiquitour";
$db['default']['dbdriver'] = "mysql";
$db['default']['dbprefix'] = "";
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = "";
$db['default']['char_set'] = "utf8";
$db['default']['dbcollat'] = "utf8_general_ci";

 4.1.- Change Host name the local host for the the adress of your data base server. The username for your username and write the valid password in password.   
