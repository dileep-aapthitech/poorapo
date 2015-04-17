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
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/cms[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Cms\Controller\Cms',
                        'action'     => 'index',
                    ),
                ),
            ), 
// Start			
			'privacy-policies' => array(
				'type' => 'literal',
				'options' => array(
					'route'    => '/privacy-policies',
					'defaults' => array(
						'controller' => 'Cms\Controller\CmsController',
						'action'     => 'privacyPolicies',
					),
				),
			),
// end			
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