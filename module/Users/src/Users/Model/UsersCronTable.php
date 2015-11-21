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

class UsersCronTable
{
    protected $tableGateway;
	protected $select;
	
	public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
		$this->select = new Select();
    }
	public function addUsersCron($uid){
		$data = array(
			'user_id' 	    => $uid, 	
			'cron_status' 	=> 0,  			
			'created_at' 	=> date('Y-m-d H:i:s')   					
		);
		$insertresult=$this->tableGateway->insert($data);
		return $this->tableGateway->lastInsertValue;
	}
	public function sentEmailsToCron()
    {
		$select = $this->tableGateway->getSql()->select();
		$select	->join('tbl_users', 'tbl_users.user_id=tbl_users_cron.user_id',array('*'),'left');	
		$select->where('tbl_users_cron.cron_status=0');
		$select->limit(2);
		$resultSet = $this->tableGateway->selectWith($select);
		return $resultSet;
	}
	public function successToEmails($cronid){
		$data = array(
			'cron_status' 		=> 1, 	
		);
		$resultSet=$this->tableGateway->update($data, array('cron_id' => $cronid));		
		return $resultSet;
	}
}