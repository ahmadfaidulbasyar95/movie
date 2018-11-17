<?php  if (!defined('_VALID_ACCESS')) exit('No direct script access allowed');

$movies = $sys->db("SELECT `mw`.*,`w`.`php_episodes` FROM `website` AS `w` LEFT JOIN `movie_website` AS `mw` ON `mw`.`website_id`=`w`.`id` LEFT JOIN `movie` AS `m` ON `m`.`id`=`mw`.`movie_id` WHERE `w`.`active`=1 AND `m`.`active`=1 ",'all');

foreach ($movies as $key => $value) 
{
	$output[$value['movie_id']][$value['list_id']] = count((array)php_run($value['php_episodes'],$value['url']));
}

foreach ($output as $key => $value) 
{
	foreach ($value as $key1 => $value1) 
	{
		$sys->db("UPDATE `movie_website` SET `ep_last`='{$value1}' WHERE `list_id`='{$key1}'");
	}
	$ep_last = max($value);
	$sys->db("UPDATE `movie` SET `ep_last`='{$ep_last}' WHERE `id`='{$key}'");
}

$sys->meta_title = 'Update Episode Movie';

echo msg('Updated','success');