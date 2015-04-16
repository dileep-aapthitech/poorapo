<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'ZfcAdmin\Controller\AdminController' => 'ZfcAdmin\Controller\AdminController',
        ),
    ),

    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'admin' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/admin[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'ZfcAdmin\Controller\AdminController',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
	   'login' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/login[/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'ZfcAdmin\Controller\AdminController',
                        'action'     => 'login',
                    ),
                ),
            ),
			
			'addpage' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/addpage[/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'ZfcAdmin\Controller\AdminController',
                        'action'     => 'addpage',
                    ),
                ),
            ),
			
    'view_manager' => array(
        'template_path_stack' => array(
            'album' => __DIR__ . '/../view',
        ),
    ),
);