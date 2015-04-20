<?php
namespace Users\Model;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql;
use Zend\Db\Sql\Where;
use Zend\Db\Sql\Select;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;
use Zend\Db\Sql\Predicate;
use Zend\Db\Sql\Expression;

class PaymentTable
{
    protected $tableGateway;
	protected $select;
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
		$this->select = new Select();
    }	
	public function addUser($users,$user_id)
    {
		if($user_id!=""){
			$data = array(
				'email_id' 		=> $users['user_email'],  		
				'user_type_id'  	=> $users['user_type'],  	
			);
			$updateresult=$this->tableGateway->update($data, array('user_id' => $user_id));
			return $updateresult;
		}else{
			$password=md5($users['user_password']);
			$data = array(
				'email_id' 		=> $users['user_email'],  		
				'password' 		=> $password, 	
				'user_type_id'  	=> $users['user_type'],  	
				'created_at' 	=> date('Y-m-d H:i:s'),   
				'status' 		=> 1,  		
			);
			$insertresult=$this->tableGateway->insert($data);
			return $this->tableGateway->lastInsertValue;
		}					
    }		
}