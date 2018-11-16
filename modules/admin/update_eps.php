<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

$movies = $sys->db("SELECT * FROM `website` AS `w`",'all');