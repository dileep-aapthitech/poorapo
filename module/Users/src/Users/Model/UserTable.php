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

class UserTable
{
    protected $tableGateway;
	protected $select;
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
		$this->select = new Select();
    }
	public function getCurrentUserId()
    {
		$select = $this->tableGateway->getSql()->select();
		$select->columns(array( 'maxUserId' => new Expression('MAX(user_id)')));
		
		$rowset = $this->tableGateway->selectWith($select);
		$row = $rowset->current();
		if( !$row )
		{
			throw new \Exception("Could not retrieve max User Id.");
		}
		
		return $row;
	}
	public function getUserDetails($user_id){
		$select = $this->tableGateway->getSql()->select();		
		$select	->join('tbl_user_personal_info', 'tbl_users.user_id=tbl_user_personal_info.user_id',array('*'),'left');
		$select	->join('tbl_user_education_info', 'tbl_users.user_id=tbl_user_education_info.user_id',array('*'),'left');
		$select->where('tbl_users.user_id="'.$user_id.'"');	
		$resultSet = $this->tableGateway->selectWith($select);	
		return $resultSet;		
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
	public function checkEmailExists( $userInfo )
    {
		$select = $this->tableGateway->getSql()->select();
		$select->where('tbl_users.email_id="'.$userInfo['inputEmail'].'"');
		$select->where('tbl_users.password="'.md5($userInfo['password']).'"');
		$resultSet = $this->tableGateway->selectWith($select);
		$row = $resultSet->current();
		return $row;
	}
	public function checkAdminEmailExists( $userInfo )
    {
		$select = $this->tableGateway->getSql()->select();
		$select->where('email_id="'.$userInfo['inputEmail'].'"');
		$select->where('password="'.$userInfo['password'].'"');
		$select->where('user_type_id="'.$userInfo['type_id'].'"');
		$resultSet = $this->tableGateway->selectWith($select);
		return $resultSet;
	}	
	public function getpassword($pwd,$userid){ 
		$pwd=md5($pwd);
		$select = $this->tableGateway->getSql()->select();
		$select->where('password="'.$pwd.'"');
		$select->where('user_id="'.$userid.'"');
		$resultSet = $this->tableGateway->selectWith($select);
		$row = $resultSet->count();			
		return $row;
	}
	public function changepwd($pwd,$userid){
		$password=md5($pwd);
		$data = array(
				'user_id'       =>$userid,
				'password'      =>$password,
				);
		$changepassword=$this->tableGateway->update($data, array('user_id' => $data['user_id']));
		return 	$changepassword;	
	}
	public function checkEmail($email)
    {	
		$select = $this->tableGateway->getSql()->select();			
		$select->where('email_id = "'.$email.'"');
		$resultSet = $this->tableGateway->selectWith($select);				
        return $resultSet;
	}
	public function getUser( $userId )
    {
		$select = $this->tableGateway->getSql()->select();
		$select->join('tbl_user_education_info', 'tbl_user_education_info.user_id=tbl_users.user_id',array('*'),'left');	
		$select->join('tbl_user_personal_info', 'tbl_user_personal_info.user_id=tbl_users.user_id',array('*'),'left');	
		// $select->join('tbl_user_type', 'tbl_user_type.user_type_id=tbl_users.user_type_id',array('*'),'left');	
		// $select->join('tbl_countries', 'tbl_countries.id_countries=tbl_user_personal_info.id_countries',array('*'),'left');	
		// $select->join('tbl_states', 'tbl_states.state_id=tbl_user_personal_info.state_id',array('*'),'left');	
		// $select->join('tbl_colleges', 'tbl_colleges.college_id=tbl_user_education_info.college_name',array('*'),'left');	
		// $select->join('tbl_bachelore_degrees', 'tbl_bachelore_degrees.user_id=tbl_users.user_id',array('*'),'left');	
		// $select->join('tbl_masters_degree', 'tbl_user_personal_info.user_id=tbl_users.user_id',array('*'),'left');	
		// $select->join('tbl_universities', 'tbl_masters_degree.user_id=tbl_users.user_id',array('*'),'left');	
		// $select->join('tbl_specialization', 'tbl_specialization.user_id=tbl_users.user_id',array('*'),'left');	
		// $select->join('tbl_entrance_exam', 'tbl_entrance_exam.user_id=tbl_users.user_id',array('*'),'left');	
		$select->where('tbl_users.user_id="'.$userId.'"');
		$resultSet = $this->tableGateway->selectWith($select);
		$row = $resultSet->current();
		return $row;
	}
	public function fpcheckEmail($email)
    {	
		$select = $this->tableGateway->getSql()->select();			
		$select->where('email_id="'.$email.'"');
		$resultSet = $this->tableGateway->selectWith($select);
		$row = $resultSet->count();
		return $row;
	}
	
}