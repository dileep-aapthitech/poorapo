<?php
namespace Databoxuser\Model;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql;
use Zend\Db\Sql\Where;
use Zend\Db\Sql\Select;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;
use Zend\Db\Sql\Predicate;
use Zend\Db\Sql\Expression;

class LoginLinkExpiredTable
{
    protected $tableGateway;
	protected $select;
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
		$this->select = new Select();
    }
	public function addLoginLinkExpired($email)
    {	
		$data = array(
			'user_id' 	         => $email,
			'status' 	         => "0"	,
		);	
		
		$this->tableGateway->insert($data);		
		return $this->tableGateway->lastInsertValue;
    }
	
	public function updateLoginLinkExpired($id)
    {	
		$data = array(
			'status' 	         => "1"
		);	
		$row=$this->tableGateway->update($data, array('user_id' => $id));
		return $row;
	}

	public function checkLinkExists($id)
    {
		$select = $this->tableGateway->getSql()->select();
		$select->where('user_id="'.$id.'"');
		$resultSet = $this->tableGateway->selectWith($select);
		$row = $resultSet;
		return $row;
	}
}