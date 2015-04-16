<?php
namespace Application\Model;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql;
use Zend\Db\Sql\Where;
use Zend\Db\Sql\Select;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;
use Zend\Db\Sql\Predicate;
use Zend\Db\Sql\Expression;

class CategoryTable
{
    protected $tableGateway;
	protected $select;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
		$this->select = new Select();
    }

	public function addUserDetails($user_id)
    {	
		$data = array(
			'user_id' 	     => $user_id, 
			'details_set' 	 => "1", 
			'status' 	     => "1",
			'montage_image'	 => $_SESSION['Zend_Auth']->photoURL
		);	
		
		$this->tableGateway->insert($data);		
		return $this->tableGateway->lastInsertValue;
    }

	public function getAllMenuCategories()
    {
		$select = $this->tableGateway->getSql()->select();
		$select->where('tbl_categories.category_type_id=2');
		$resultSet = $this->tableGateway->selectWith($select);
		return $resultSet;
	}
	
	public function getCategories()
    {
		$select = $this->tableGateway->getSql()->select();
		$select->where('status=1');
		$resultSet = $this->tableGateway->selectWith($select);
		return $resultSet;
	}
}