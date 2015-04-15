<?php 
namespace Users\Factory\Model;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Stdlib\Hydrator\ObjectProperty;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\Feature;

use Users\Model\BacheloreDegrees;
use Users\Model\BacheloreDegreesTable;


class BacheloreDegreesTableFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $db = $serviceLocator->get('Zend\Db\Adapter\Adapter');
        $resultSetPrototype = new HydratingResultSet();
        $resultSetPrototype->setHydrator(new ObjectProperty());
        $resultSetPrototype->setObjectPrototype(new BacheloreDegrees());
        $tableGateway       = new TableGateway('tbl_bachelore_degrees', $db,array(),$resultSetPrototype);
        $table              = new BacheloreDegreesTable($tableGateway);
        return $table;
    }
}