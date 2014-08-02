<?php
# db configuration 
define('DB_HOST',		'127.0.0.1');
define('DB_USER',		'root');
define('DB_PASS',		'Circox66');
define('DB_NAME',		'tcb01');

# db connect
function dbConnect($close=true){
	global $link;

	if (!$close) {
		mysql_close($link);
		return true;
	}

	$link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die('Could not connect to MySQL DB9 ') . mysql_error();
	if (!mysql_select_db(DB_NAME, $link))
		return false;
}

?>