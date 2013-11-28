<?php defined('SYSPATH') or die('No direct script access.');

// Static file serving (CSS, JS, images)
Route::set('admin/media', 'admin-media(/<file>)', array('file' => '.+'))
	->defaults(array(
		'controller' => 'Admin',
		'action'     => 'media',
		'file'       => NULL,
	));

Route::set('admin/orm/edit', 'admin/orm/edit/<model>(/<id>)', array(
        'id' => '[0-9]+',
    ))
    ->defaults(array(
            'controller' => 'ORM',
            'action'     => 'edit',
            'id'         => NULL,
        ));

Route::set('admin/orm/list_model', 'admin/orm/list/<model>', array(
		'id' => '[0-9]+',
	))
	->defaults(array(
		'controller' => 'ORM',
		'action'     => 'list_model',
        'id'         => NULL,
	));
