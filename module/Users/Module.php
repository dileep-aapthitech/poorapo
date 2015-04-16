<?php
namespace Users;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature;
use Zend\Loader;
use Zend\EventManager\EventInterface;
use Zend\Mvc\Router\RouteMatch;
use Zend\ModuleManager\ModuleManager;
use Zend\Stdlib\Hydrator\ClassMethods;


use Users\Model\UserType;
use Users\Model\UserTypeTable;
use Users\Model\User;
use Users\Model\UserTable;
use Users\Model\UserDetails;
use Users\Model\UserDetailsTable;
use Users\Model\UserPersonalInfo;
use Users\Model\UserPersonalInfoTable;
use Users\Model\ForgotPassword;
use Users\Model\ForgotPasswordTable;
use Users\Model\Countries;
use Users\Model\CountriesTable;
use Users\Model\States;
use Users\Model\StatesTable;
use Users\Model\Districts;
use Users\Model\DistrictsTable;
use Users\Model\EntranceExam;
use Users\Model\EntranceExamTable;
use Users\Model\BacheloreDegrees;
use Users\Model\BacheloreDegreesTable;
use Users\Model\MastersDegree;
use Users\Model\MastersDegreeTable;
use Users\Model\Specialization;
use Users\Model\SpecializationTable;
use Users\Model\Universities;
use Users\Model\UniversitiesTable;
use Users\Model\Colleges;
use Users\Model\CollegesTable;

class Module implements 
	Feature\AutoloaderProviderInterface,
    Feature\ConfigProviderInterface,
    Feature\ServiceProviderInterface
{
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
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }    
    public function getServiceConfig()
    {
        return array(
            'factories' => array( 
            	'Users\Model\UserTypeFactory'=>'Users\Factory\Model\UserTypeTableFactory',			
            	'Users\Model\UserTableFactory'=>'Users\Factory\Model\UserTableFactory',			
            	'Users\Model\UserDetailsFactory'=>'Users\Factory\Model\UserDetailsTableFactory',		
            	'Users\Model\UserPersonalInfoFactory'=>'Users\Factory\Model\UserPersonalInfoTableFactory',		
            	'Users\Model\LoginLinkExpiredFactory'=>'Users\Factory\Model\LoginLinkExpiredTableFactory',			
            	'Users\Model\ForgotPasswordFactory'=>'Users\Factory\Model\ForgotPasswordTableFactory',
            	'Users\Model\CountriesFactory'=>'Users\Factory\Model\CountriesTableFactory',	
            	'Users\Model\StatesFactory'=>'Users\Factory\Model\StatesTableFactory',	
            	'Users\Model\DistrictsFactory'=>'Users\Factory\Model\DistrictsTableFactory',	
            	'Users\Model\CollegesFactory'=>'Users\Factory\Model\CollegesTableFactory',	
            	'Users\Model\EntranceExamFactory'=>'Users\Factory\Model\EntranceExamTableFactory',	
            	'Users\Model\BacheloreDegreesFactory'=>'Users\Factory\Model\BacheloreDegreesTableFactory',	
            	'Users\Model\MastersDegreeFactory'=>'Users\Factory\Model\MastersDegreeTableFactory',
            	'Users\Model\SpecializationFactory'=>'Users\Factory\Model\SpecializationTableFactory',
            	'Users\Model\UniversitiesFactory'=>'Users\Factory\Model\UniversitiesTableFactory'
			),			
        );
    }
}