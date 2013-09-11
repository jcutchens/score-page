<?php
//sitewide configuration data here
//set local timezone
putenv('TZ=US/Eastern');

//create DB constants
define('HOST','localhost');
define('DBNAME','jamescut_olympics');
define('USER','jamescut_mano');
define('PASS','temp12345');

//connect to DB
$db = new mysqli(HOST, USER, PASS, DBNAME);

if(mysqli_connect_errno())
{
	echo 'Error:  Could not connect to database.  Please try again later';
	exit();
}

?>