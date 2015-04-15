<?php
return array(
'controller_plugins' => array(
    'invokables' => array(
       'Adminplugin' => 'ZfcAdmin\Controller\Plugin\Adminplugin',
     )
 ),
    'controllers' => array(
        'invokables' => array(
            'ZfcAdmin\Controller\AdminController' => 'ZfcAdmin\Controller\AdminController',
        ),
    ),
    'zfcadmin' => array(
        'use_admin_layout'      => true,
        'admin_layout_template' => 'layout/admin',
    ),
	'myadmin' => array(
        'use_admin_layout'      => true,
        'admin_layout_template' => 'layout/admin',
    ),
    'navigation' => array(
        'admin' => array(),
    ),

    'router' => array(
        'routes' => array(
            'zfcadmin' => array(
                'type' => 'literal',
                'options' => array(
                    'route'    => '/admin',
                    'defaults' => array(
                        'controller' => 'ZfcAdmin\Controller\AdminController',
                        'action'     => 'index',
                    ),
                ),
				'may_terminate' => true,
				'child_routes' => array(
                    'admin-login' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route'    => '[/:action]',
                            'constraints' => array(
								'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
								'id'     => '[a-zA-Z0-9][a-zA-Z0-9_-]*',
							),
							'defaults' => array(
                                'controller' => 'ZfcAdmin\Controller\AdminController',
                                'action'     => 'adminLogin',
                            ),
                        ),
                    ),
					
					'admin-logout' => array(
						'type' => 'literal',
						'options' => array(
							'route'    => '/admin-logout',
							'defaults' => array(
								'controller' => 'ZfcAdmin\Controller\AdminController',
								'action'     => 'adminLogout',
							),
						),
					),
					
					'total_packages_list' => array(
						'type' => 'literal',
						'options' => array(
							'route'    => '/total_packages_list',
							'defaults' => array(
								'controller' => 'ZfcAdmin\Controller\AdminController',
								'action'     => 'totalPackagesList',
							),
						),
					),
					'testimonial-list' => array(
						'type' => 'literal',
						'options' => array(
							'route'    => '/testimonial-list',
							'defaults' => array(
								'controller' => 'ZfcAdmin\Controller\AdminController',
								'action'     => 'testimonialList',
							),
						),
					),
					'update-testimonial' => array(
						'type' => 'literal',
						'options' => array(
							'route'    => '/update-testimonial',
							'defaults' => array(
								'controller' => 'ZfcAdmin\Controller\AdminController',
								'action'     => 'updateTestimonial',
							),
						),
					),
							
                ),				
            ),	
		'myadmin' => array(
                'type' => 'literal',
                'options' => array(
                    'route'    => '/ADMIN',
                    'defaults' => array(
                        'controller' => 'ZfcAdmin\Controller\AdminController',
                        'action'     => 'index',
                    ),
                ),
				'may_terminate' => true,
				'child_routes' => array(
                    'admin-login' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route'    => '[/:action]',
                            'constraints' => array(
								'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
								'id'     => '[a-zA-Z0-9][a-zA-Z0-9_-]*',
							),
							'defaults' => array(
                                'controller' => 'ZfcAdmin\Controller\AdminController',
                                'action'     => 'adminLogin',
                            ),
                        ),
                    ),
					
					'admin-logout' => array(
						'type' => 'literal',
						'options' => array(
							'route'    => '/admin-logout',
							'defaults' => array(
								'controller' => 'ZfcAdmin\Controller\AdminController',
								'action'     => 'adminLogout',
							),
						),
					),
					
					'total_packages_list' => array(
						'type' => 'literal',
						'options' => array(
							'route'    => '/total_packages_list',
							'defaults' => array(
								'controller' => 'ZfcAdmin\Controller\AdminController',
								'action'     => 'totalPackagesList',
							),
						),
					),
					'testimonial-list' => array(
						'type' => 'literal',
						'options' => array(
							'route'    => '/testimonial-list',
							'defaults' => array(
								'controller' => 'ZfcAdmin\Controller\AdminController',
								'action'     => 'testimonialList',
							),
						),
					),
					'update-testimonial' => array(
						'type' => 'literal',
						'options' => array(
							'route'    => '/update-testimonial',
							'defaults' => array(
								'controller' => 'ZfcAdmin\Controller\AdminController',
								'action'     => 'updateTestimonial',
							),
						),
					),
							
                ),
			),
        ),
    ),    

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        ),
		'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);
