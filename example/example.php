<?php
// Example on how to use this api wrapper

/*
	serverStatus($ip, $info)

	$ip IP adress where API looks at

	$info In this field you put your command to look at.

	Commands bellow:

	name - Returns server name 
	country - Returns server host country
	users - Returns users online on ts server
	slots - Returns number of server slots
	online - Returns true or false on server online status
	password - Returns true or false on server password locked status
	createchannels - Returns true or false on server user able to create channels
	premium - Checks if this server is premium (true or false)
	hidden - Returns true or false on server visibility status
	serverquery - Returns true or false on server query connect
*/

// NOTE: IP:PORT must be numeric type
// and you have to include PTSapi.php

include_once('PTSapi.php');

$ = ''; //Your ip goes here

echo serverStatus($ip, 'name');

// It will echo server name

/*
	updateCheck($info)

	$info In this field you put your command to look at.

	Commands bellow:

	clientver - Returns client latest TS3 version
	clientrev - //
	serverver - Returns server latest TS3 version
	serverrev - //

*/

echo updateCheck('clientver');

// It will echo 3.1.7 

/*
	serverHistory($ip,$duration)

	$ip IP adress where API looks at

	Commands bellow:

	duration - The number of days you want to retrieve based on the current date. You can specify an integer between 1 (default) and 31.

	interpolation - Whether or not to interpolate missing values. You can specify an integer. Defaults to false.

	imputation - Whether or not to replace missing values with -1. Defaults to false.

	padding - Whether or not to pad the current day with future -1 values (requires imputation). Defaults to false.

	NOTE: This function returns array so you need to treat it like array.
*/

print_r(serverHistory($ip,'2'));

//It will return array of logs

?>
