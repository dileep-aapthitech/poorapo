<?php 
namespace Application\Factory\Model;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Stdlib\Hydrator\ObjectProperty;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\Feature;

use Application\Model\CategoryTypes;
use Application\Model\CategoryTypesTable;

class CategoryTypesTableFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $db = $serviceLocator->get('Zend\Db\Adapter\Adapter');
        $resultSetPrototype = new HydratingResultSet();
        $resultSetPrototype->setHydrator(new ObjectProperty());
        $resultSetPrototype->setObjectPrototype(new CategoryTypes());
        $tableGateway       = new TableGateway('tbl_category_types', $db,array(),$resultSetPrototype);
        $table              = new CategoryTypesTable($tableGateway);
        return $table;
    }
}