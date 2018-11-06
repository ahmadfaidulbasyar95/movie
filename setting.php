<?php 
$_setting = array(
	'access' => array(
		'1' => 'Administrator',
		),
	'meta_icon'        => 'logo.jpg',
	'app_home'         => 'user.login',
	'template_default' => 'template_name',
	'admin_access_id'  => '1',
	'blocks'           => array(
		'intro' => array(
			array(
				'name' => 'logo',
				'show' => array(
					// 'access' => array(),
					// 'mod'    => array('user'),
					),
				'title'  => 'User Menu',
				'tpl'    => 'header_logo',
				'config' => array(
					'image' => '',
					'url'   => ''
					),
				),
			),
		'header' => array(
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
					'mod'    => array('admin','user'),
					),
				'title'  => 'Administrator',
				'tpl'    => 'header_menu',
				'config' => array(
					array(
						'name' => 'Setting',
						'icon' => 'fa-cogs',
						'link' => 'admin.setting',
						),
					),
				),

			),
		),
	);
?>