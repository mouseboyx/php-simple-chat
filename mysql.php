<?php
if ( basename(__FILE__) != basename($_SERVER["SCRIPT_FILENAME"]) ) {
	$connection = mysqli_connect('localhost', 'root', 'put_your_mysql_password_here', $database);
	if ($connection) {
	//	echo "1";
	} else {
	//	echo '0';
	}
}
?>
