<?php 
$_setting = array(
	'access' => array(
		'1' => 'Administrator',
		),
	'meta_icon'         => 'logo.jpg',
	'app_home'          => 'movie.main',
	'template_default'  => 'template_name',
	'admin_access_id'   => '1',
	'blocks_profill_id' => 'default',
	'blocks'            => array(
		'intro' => array(
			array(
				'name' => 'image',
				'show' => array(
					// 'access' => array(),
					// 'mod'    => array('user'),
					),
				'title'  => 'Logo',
				'tpl'    => 'header_logo',
				'config' => array(
					'image' => '',
					'url'   => ''
					),
				),
			),
		'header' => array(
			array(
				'name' => 'movie_search',
				'show' => array(
					// 'access' => array(),
					// 'mod'    => array('user'),
					),
				'title'  => 'Search Movie',
				'tpl'    => 'default',
				'config' => array(),
				),
			array(
				'name' => 'menu',
				'show' => array(
					// 'access' => array(),
					// 'mod'    => array('user'),
					),
				'title'  => 'User Menu',
				'tpl'    => 'user_menu',
				'config' => array(
					array(
						'name' => 'Profill',
						'icon' => 'fa-user',
						'link' => 'user.profill',
						),
					array(
						'name' => 'Change Password',
						'icon' => 'fa-key',
						'link' => 'user.change_password',
						),
					array(
						'name' => 'Logout',
						'icon' => 'fa-power-off',
						'link' => 'user.logout',
						),
					),
				),
			array(
				'name' => 'menu',
				'show' => array(
					'access' => array('1'),
					'mod'    => array('admin'),
					),
				'title'  => 'Administrator',
				'tpl'    => 'header_menu',
				'config' => array(
					array(
						'name' => 'Movie',
						'icon' => 'fa-film',
						'link' => 'admin.movie',
						),
					array(
						'name' => 'Series',
						'icon' => 'fa-clone',
						'link' => 'admin.movie_series',
						),
					array(
						'name' => 'Movie Tag',
						'icon' => 'fa-tags',
						'link' => 'admin.movie_tag',
						),
					array(
						'name' => 'Website',
						'icon' => 'fa-chrome',
						'link' => 'admin.website',
						),
					array(
						'name' => 'Setting',
						'icon' => 'fa-cogs',
						'link' => 'admin.setting',
						),
					array(
						'name' => 'Setting Block',
						'icon' => 'fa-cog',
						'link' => 'admin.setting_block',
						),
					),
				),
			array(
				'name' => 'menu',
				'show' => array(
					// 'access' => array('1'),
					'mod'    => array('movie','tag','user'),
					),
				'title'  => 'Main Menu',
				'tpl'    => 'header_menu',
				'config' => array(
					array(
						'name' => 'Movies',
						'icon' => 'fa-film',
						'link' => 'movie.main',
						),
					array(
						'name' => 'Movie Tags',
						'icon' => 'fa-tags',
						'link' => 'tag.main',
						),
					),
				),

			),
		),
	);
?>