<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Session\Container;


class Module implements AutoloaderProviderInterface
{
	protected $whitelist = array('/my-profile','/confirm','/response','/payment','/my-groups','/my-subscriptions','/my-mentor','/admin/packages-list','/admin/testimonial-list','/container-progress','/progress');
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
		$result=$eventManager->attach('route', array($this, 'loadConfiguration'), 2);
		$serviceManager      = $e->getApplication()->getServiceManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }/*
	public function onBootstrap(MvcEvent $e) {
        $translator = $e->getApplication()->getServiceManager()->get('translator');
            $lang = $e->getRequest()->getQuery('lang'); // new language
            $session = new Container('base');
            if($lang == null && $lang == ''){
                if ($session->offsetExists('lang')) {
                    $lang = $session->offsetGet('lang'); // current language
                }else{
                    $lang = Settings::DEFAULT_LANGUAGE; // default language
                }
            }
            $session->offsetSet('lang', $lang);
            $loc = Settings::$locations[$lang];
            $translator
            ->setLocale($loc)
            ->setFallbackLocale(Settings::DEFAULT_LANGUAGE .'_' . Settings::DEFAULT_LOCATION);
    }*/
	 public function loadConfiguration(MvcEvent $e)
    {
        $application   = $e->getApplication();
		$sm            = $application->getServiceManager();
		$sharedManager = $application->getEventManager()->getSharedManager();
        $router = $sm->get('router');
		$request = $sm->get('request');
		$list = $this->whitelist;
		
		$current_url= str_replace($request->getBaseUrl(),'',$request->getrequestUri());
		
		if($this->searchArray($current_url,$list))
		{
			$matchedRoute = $router->match($request);
			if (null !== $matchedRoute) {
				   $sharedManager->attach('Zend\Mvc\Controller\AbstractActionController','dispatch',
						function($e) use ($sm) {
				   $sm->get('ControllerPluginManager')->get('Myplugin')
							  ->doAuthorization($e);
				   },2
				   );
				}
		}
		
    }
	function searchArray($search, $array)
	{
		foreach($array as $key => $value)
		{
			if (stristr($search,$value))
			{
				return $key;
			}
		}
		return false;
	}
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
		 return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
       
    }
	 public function getServiceConfig() {
        return array(
            'factories' => array(
					'Zend\Session\SessionManager' => function ($sm) {
                    $config = $sm->get('config');
                    if (isset($config['session'])) {
                        $session = $config['session'];

                        $sessionConfig = null;
                        if (isset($session['config'])) {
                            $class = isset($session['config']['class'])  ? $session['config']['class'] : 'Zend\Session\Config\SessionConfig';
                            $options = isset($session['config']['options']) ? $session['config']['options'] : array();
                            $sessionConfig = new $class();
                            $sessionConfig->setOptions($options);
                        }

                        $sessionStorage = null;
                        if (isset($session['storage'])) {
                            $class = $session['storage'];
                            $sessionStorage = new $class();
                        }

                        $sessionSaveHandler = null;
                        if (isset($session['save_handler'])) {
                            // class should be fetched from service manager since it will require constructor arguments
                            $sessionSaveHandler = $sm->get($session['save_handler']);
                        }

                        $sessionManager = new SessionManager($sessionConfig, $sessionStorage, $sessionSaveHandler);

                        if (isset($session['validator'])) {
                            $chain = $sessionManager->getValidatorChain();
                            foreach ($session['validator'] as $validator) {
                                $validator = new $validator();
                                $chain->attach('session.validate', array($validator, 'isValid'));

                            }
                        }
                    } else {
                        $sessionManager = new SessionManager();
                    }
                    Container::setDefaultManager($sessionManager);
                    return $sessionManager;
                },	
            )
        );
    }	
}
