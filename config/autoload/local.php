<?php
return array(
    'db' 				=> 	array(
		'dsn' 			=>	'mysql:dbname=taggerzz;host=localhost',
        'username' 		=> 	'root',
        'password' 		=> 	'',
    ),
	'slave1' => array(
		'dsn'      		=> 	'mysql:dbname=taggerzz1;host=localhost',
        'username' 		=> 	'root',
        'password' 		=> 	'',
    ),
	'slave2' 			=> 	array(
		'dsn'      		=> 	'mysql:dbname=taggerzz2;host=localhost',
        'username' 		=> 	'root',
        'password' 		=> 	'',
    ),
	'slave3' 			=> 	array(
		'dsn'      		=> 	'mysql:dbname=taggerzz3;host=localhost',
        'username' 		=> 	'root',
        'password' 		=> 	'',
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
