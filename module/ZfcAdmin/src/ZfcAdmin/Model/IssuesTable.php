<?php
namespace ZfcAdmin\Model;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql;
use Zend\Db\Sql\Where;
use Zend\Db\Sql\Select;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;
use Zend\Db\Sql\Predicate;
use Zend\Db\Sql\Expression;

class IssuesTable
{
    protected $tableGateway;
	protected $select;
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
		$this->select = new Select();
    }
	public function getIssues()
    {
		$select = $this->tableGateway->getSql()->select();
		$select->where('status="1"');
		$resultSet = $this->tableGateway->selectWith($select);
		return $resultSet;
	}
	
	public function addFpNewRow( $userId,$email,$token )
    {	
		$data = array(
			'user_id' 	         => $userId,
			'email' 	         => $email,
			'token' 	         => $token,
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

	public function checkFpTokenExists( $token )
    {
		$select = $this->tableGateway->getSql()->select();
		$select->where('token="'.$token.'"');
		$resultSet = $this->tableGateway->selectWith($select);
		$row = $resultSet;
		return $row;
	}

	public function deleteToken( $userId )
	{		
		$res=$this->tableGateway->delete( array('user_id' => $userId) );
        return $res;	
	}

	public function getAllMenuIssues( $categoryId )
    {
		$select = $this->tableGateway->getSql()->select();
		$select->join('tbl_categories', 'tbl_issues.category_id=tbl_categories.category_id',array('category_name','category_type_id'),'left');
		$select->where('tbl_categories.category_type_id=2');
		if( $categoryId > 0 )
		{
			$select->where('tbl_issues.category_id="'.$categoryId.'"');
		}
		$select->order('tbl_issues.created_at DESC');
		$resultSet = $this->tableGateway->selectWith($select);
		return $resultSet;
	}
	
}