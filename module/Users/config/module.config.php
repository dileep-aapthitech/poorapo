<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Users\Controller\Users' => 'Users\Controller\UsersController',
        ),
    ),
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'users' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/users[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Users\Controller\Users',
                        'action'     => 'index',
                    ),
                ),
            ),  
			'edit-profile' => array(
					'type' => 'literal',
					'options' => array(
						'route'    => '/edit-profile',
						'defaults' => array(
							'controller' => 'Users\Controller\UsersController',
							'action'     => 'editProfile',
						),
					),
			),	
			'login' => array(
					'type' => 'literal',
					'options' => array(
						'route'    => '/login',
						'defaults' => array(
							'controller' => 'Users\Controller\UsersController',
							'action'     => 'login',
						),
					),
			),
			'change-password' => array(
					'type' => 'literal',
					'options' => array(
						'route'    => '/change-password',
						'defaults' => array(
							'controller' => 'Users\Controller\UsersController',
							'action'     => 'changePassword',
						),
					),
			),
			'check-password' => array(
					'type' => 'literal',
					'options' => array(
						'route'    => '/check-password',
						'defaults' => array(
							'controller' => 'Users\Controller\UsersController',
							'action'     => 'checkPassword',
						),
					),
			),
			'logout' => array(
					'type' => 'literal',
					'options' => array(
						'route'    => '/logout',
						'defaults' => array(
							'controller' => 'Users\Controller\UsersController',
							'action'     => 'logout',
						),
					),
			),
			'forgot-password' => array(
					'type' => 'literal',
					'options' => array(
						'route'    => '/forgot-password',
						'defaults' => array(
							'controller' => 'Users\Controller\UsersController',
							'action'     => 'forgotPassword',
						),
					),
			),
			'send-password-reset-url' => array(
					'type' => 'literal',
					'options' => array(
						'route'    => '/send-password-reset-url',
						'defaults' => array(
							'controller' => 'Users\Controller\UsersController',
							'action'     => 'sendPasswordResetUrl',
						),
					),
			),
			'profile' => array(
				'type'    => 'Segment',
				'options' => array(
					'route'       => '/profile[/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[a-zA-Z][a-zA-Z0-9_-]*',
					),
					'defaults'    => array(
						'controller'    => 'Users\Controller\Users',
						'action'        => 'profiles',
					),
				),
			),
		),
	),     
    'view_manager' => array(
        'template_path_stack' => array(
            'users' => __DIR__ . '/../view',
        ),
		'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
	
);
?>