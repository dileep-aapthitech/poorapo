<?php
return array(
    'db' 				=> 	array(
		'dsn' 			=>	'mysql:dbname=poraapo_db;host=localhost',
        'username' 		=> 	'root',
        'password' 		=> 	'admin',
    ),
	'slave1' => array(
		'dsn'      		=> 	'mysql:dbname=poraapo_db;host=localhost',
        'username' 		=> 	'root',
        'password' 		=> 	'admin',
    ),
	'slave2' 			=> 	array(
		'dsn'      		=> 	'mysql:dbname=poraapo_db;host=localhost',
        'username' 		=> 	'root',
        'password' 		=> 	'admin',
    ),
	'slave3' 			=> 	array(
		'dsn'      		=> 	'mysql:dbname=poraapo_db;host=localhost',
        'username' 		=> 	'root',
        'password' 		=> 	'admin',
    ),
	'urls' 				=> 	array(
		'baseUrl' 		=> 	'http://localhost/poorapo/trunk',
		'basePath' 		=> 	'http://localhost/poorapo/trunk/public',
		'imagesUrl'		=>	'#',
	),
	'service_manager' 	=> 	array(
        'factories' 	=> 	array(  
        ),
    ),
	'cache' => array(
		'adapter' => array(
			'name'    => 'Filesystem',
			'options' => array(
				'cache_dir' => __DIR__ . '/../../../data/cache',
				'ttl'       => '3600'
			)
		),
		'plugins' => array(
			array(
				'name'    => 'serializer',
				'options' => array()
			),
			'exception_handler' => array(
				'throw_exceptions' => true
			)
		)
	),
);
