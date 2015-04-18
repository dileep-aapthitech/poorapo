<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Cms\Controller\Cms' => 'Cms\Controller\CmsController',
        ),
    ),
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'cms' => array(
                'type' => 'Literal',
                'priority' => 1000,
                'options' => array(
                    'route' => '/cms',
                    'defaults' => array(
                        'controller' => 'Cms\Controller\Cms',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'refunds-payments' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/refunds-payments[/:id]',
							'constraints' => array(
							   'id' => '[%&;a-zA-Z0-9][%&;a-zA-Z0-9_~-]*',
							),
                            'defaults' => array(
                                'controller' => 'Cms\Controller\Cms',
                                'action'     => 'paymentsRefunds',
                            ),
                        ),
                    ),
                ),
            ),
		),
	),     
    'view_manager' => array(
        'template_path_stack' => array(
            'cms' => __DIR__ . '/../view',
        ),
		'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
	
);
?>