<?php 

$_config = array(
	'db'	=> array(
						'SERVER'   => 'localhost',
						'USERNAME' => 'root',
						'PASSWORD' => '1',
						'DATABASE' => 'db_my_movie'
						),
	'patch'  => '/mygit/movie/',
	'salt'   => 'jhbrf8734hfh',
	'db_log' => '1',
	);

ini_set('display_errors', 1);
error_reporting(E_ALL);

?>