<?php
$out = file_get_contents('https://nanime.in/index/anime/');

$out = explode('<div class="content shadow">', $out)[1];
$out = explode('<div class="clearfix">', $out)[1];
preg_match_all('~href="(.*?)<\/a>~m', $out, $out,PREG_SET_ORDER, 0);

$out1 = array();

foreach ($out as $key => $value) {
	$a = explode('">', @$value[1]);
	if (count($a)==2) 
	{
		$out1[] = array(
			'link'  => $a['0'],
			'title' => $a['1']
		);
	}
}

return $out;