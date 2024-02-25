<?php

//host
define("HOST", "localhost");

//DBname
define("DBNAME", "forum");

//DBUser
define("DBUSER", "root");

//DBPass
define("PASS", "");

$conn = new PDO("mysql:host".HOST.";dbname".DBNAME."", DBUSER, PASS);

