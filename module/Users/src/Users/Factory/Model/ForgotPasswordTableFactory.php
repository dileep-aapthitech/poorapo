<?php 
namespace Users\Factory\Model;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Stdlib\Hydrator\ObjectProperty;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\Feature;

use Users\Model\ForgotPassword;
use Users\Model\ForgotPasswordTable;

class ForgotPasswordTableFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $db = $serviceLocator->get('Zend\Db\Adapter\Adapter');
        $resultSetPrototype = new HydratingResultSet();
        $resultSetPrototype->setHydrator(new ObjectProperty());
        $resultSetPrototype->setObjectPrototype(new ForgotPassword());
        $tableGateway       = new TableGateway('tbl_forget_tokens', $db,array(),$resultSetPrototype);
        $table              = new ForgotPasswordTable($tableGateway);
        return $table;
    }
}