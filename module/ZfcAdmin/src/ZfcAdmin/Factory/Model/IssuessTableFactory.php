<?php 
namespace ZfcAdmin\Factory\Model;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Stdlib\Hydrator\ObjectProperty;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\Feature;

use ZfcAdmin\Model\Issuess;
use ZfcAdmin\Model\IssuessTable;

class ForgotPasswordTableFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $db = $serviceLocator->get('Zend\Db\Adapter\Adapter');
        $resultSetPrototype = new HydratingResultSet();
        $resultSetPrototype->setHydrator(new ObjectProperty());
        $resultSetPrototype->setObjectPrototype(new Issuess());
        $tableGateway       = new TableGateway('tbl_issues', $db,array(),$resultSetPrototype);
        $table              = new IssuessTable($tableGateway);
        return $table;
    }
}