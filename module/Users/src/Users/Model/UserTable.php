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
	public function toInsertPassword($user_id,$pwd){
		$password=md5($pwd);
		$data = array(
			'password' 		=> $password, 	
		);
		$updateresult=$this->tableGateway->update($data, array('user_id' => $user_id));		
		return $updateresult;
	}
	public function sentMailToProvUsers($user_id){
		$data = array(
			'sent_mail' 		=> 1, 	
		);
		$resultSet=$this->tableGateway->update($data, array('user_id' => $user_id));		
		return $resultSet;
	}
	public function getProviderUsers(){
		$select = $this->tableGateway->getSql()->select();
		$select->where('tbl_users.direct_user="0"');
		$select->where('tbl_users.sent_mail="0"');
		$select->where('tbl_users.status="0"');
		$resultSet = $this->tableGateway->selectWith($select);
		return $resultSet;
	}
	public function updateUserRegAuth($userid){
		$data = array(
				'user_id' 	=>$userid,
				'status'  	=>'1',
				);
		$updateuserid=$this->tableGateway->update($data, array('user_id' => $data['user_id']));
		return 	$updateuserid;			
	}
	public function getUserDetails($user_id){
		$select = $this->tableGateway->getSql()->select();		
		$select	->join('tbl_user_personal_info', 'tbl_users.user_id=tbl_user_personal_info.user_id',array('*'),'left');
		$select	->join('tbl_user_education_info', 'tbl_users.user_id=tbl_user_education_info.user_id',array('*'),'left');
		$select	->join('tbl_countries', 'tbl_countries.id_countries=tbl_user_personal_info.id_countries_birth',array('user_birth_country' =>new Expression('tbl_countries.name')),'left');
		$select	->join(array('cunt1' => 'tbl_countries'),'cunt1.id_countries=tbl_user_personal_info.id_countries_job',array('user_country_job' =>new Expression('cunt1.name')),'left');
		$select	->join('tbl_states', 'tbl_states.state_id=tbl_user_personal_info.state_id',array('user_state_name' =>new Expression('tbl_states.state_name')),'left');
		$select	->join('tbl_districts', 'tbl_districts.district_id=tbl_user_personal_info.district_id',array('user_district_name' =>new Expression('tbl_districts.district_name')),'left');
		$select	->join(array('cunt2' => 'tbl_countries'),'cunt2.id_countries=tbl_user_education_info.id_countries_school',array('user_school_country' =>new Expression('cunt2.name')),'left');
		$select	->join('tbl_colleges_junior', 'tbl_colleges_junior.college_id=tbl_user_education_info.college_name',array('user_school' =>new Expression('tbl_colleges_junior.college_name')),'left');
		$select	->join('tbl_entrance_exam', 'tbl_entrance_exam.entrance_exam_id=tbl_user_education_info.entrance_exam',array('user_entrance_1' =>new Expression('tbl_entrance_exam.entrance_exam_name')),'left');
		$select	->join(array('exam' => 'tbl_entrance_exam'), 'exam.entrance_exam_id=tbl_user_education_info.entrance_exam_1',array('user_entrance_2' =>new Expression('exam.entrance_exam_name')),'left');
		$select	->join(array('exam1' => 'tbl_entrance_exam'), 'exam1.entrance_exam_id=tbl_user_education_info.entrance_exam_2',array('user_entrance_3' =>new Expression('exam1.entrance_exam_name')),'left');
		$select	->join(array('cunt3' => 'tbl_countries'),'cunt3.id_countries=tbl_user_education_info.id_countries_bachelors',array('user_bac_country' =>new Expression('cunt3.name')),'left');
		$select	->join(array('cunt4' => 'tbl_countries'),'cunt4.id_countries=tbl_user_education_info.id_countries_masters',array('user_mast_country' =>new Expression('cunt4.name')),'left');
		$select	->join(array('cunt5' => 'tbl_countries'),'cunt5.id_countries=tbl_user_education_info.id_countries_phd',array('user_phd_country' =>new Expression('cunt5.name')),'left');
		$select	->join('tbl_universities', 'tbl_universities.unversity_id=tbl_user_education_info.bachelors_university_name',array('user_bac_univ' =>new Expression('tbl_universities.unversity_name')),'left');
		$select	->join(array('bac_univ' => 'tbl_universities'),'bac_univ.unversity_id=tbl_user_education_info.masters_university',array('user_mast_univ' =>new Expression('bac_univ.unversity_name')),'left');
		$select	->join(array('bac_univ1' => 'tbl_universities'),'bac_univ1.unversity_id=tbl_user_education_info.doctorate_university',array('user_phd_univ' =>new Expression('bac_univ1.unversity_name')),'left');
		$select	->join('tbl_colleges_univ', 'tbl_colleges_univ.univ_college_id=tbl_user_education_info.bachelors_college',array('user_bac_college' =>new Expression('tbl_colleges_univ.univ_college_name')),'left');
		$select	->join(array('bac_coll' => 'tbl_colleges_univ'),'bac_coll.univ_college_id=tbl_user_education_info.masters_college',array('user_mast_college' =>new Expression('bac_coll.univ_college_name')),'left');
		$select	->join(array('bac_colle' => 'tbl_colleges_univ'),'bac_colle.univ_college_id=tbl_user_education_info.doctorate_college',array('user_phd_college' =>new Expression('bac_colle.univ_college_name')),'left');
		$select->where('tbl_users.user_id="'.$user_id.'"');	
		$resultSet = $this->tableGateway->selectWith($select);	
		return $resultSet;		
	}
	public function addUser($users,$user_id)
    {
		if($user_id!=""){
			$data = array(
				'user_type_id'  	=> $users['user_type'],
				'user_name'         => $users['user_first_name'],	
			);
			$updateresult=$this->tableGateway->update($data, array('user_id' => $user_id));
			return $updateresult;
		}else{
			if($users['user_first_name']!=''){
				$fisrt_name = $users['user_first_name'];
			}else{
				$fisrt_name = '';			
			}
			$password=md5($users['user_password']);
			$data = array(
				'user_name' 	=> $fisrt_name, 	
				'email_id' 		=> $users['user_email'],  		
				'password' 		=> $password, 	
				'user_type_id'  	=> $users['user_type'],  	
				'created_at' 	=> date('Y-m-d H:i:s'),   
				'status' 		=> 0,  		
			);
			$insertresult=$this->tableGateway->insert($data);
			return $this->tableGateway->lastInsertValue;
		}					
    }	
	public function checkUserStatus($userid){
		$select = $this->tableGateway->getSql()->select();
		$select->join('tbl_user_education_info', 'tbl_user_education_info.user_id=tbl_users.user_id',array('*'),'left');	
		$select->join('tbl_user_personal_info', 'tbl_user_personal_info.user_id=tbl_users.user_id',array('*'),'left');	
		$select->where('tbl_users.user_id="'.$userid.'"');
		$select->where('tbl_users.status="1"');
		$resultSet = $this->tableGateway->selectWith($select);
		return $resultSet->current();
	}
	public function checkEmailExists( $userInfo )
    {
		$select = $this->tableGateway->getSql()->select();
		$select->join('tbl_user_education_info', 'tbl_user_education_info.user_id=tbl_users.user_id',array('*'),'left');	
		$select->join('tbl_user_personal_info', 'tbl_user_personal_info.user_id=tbl_users.user_id',array('*'),'left');	
		$select->where('tbl_users.email_id="'.$userInfo['inputEmail'].'"');
		$select->where('tbl_users.password="'.md5($userInfo['password']).'"');
		$select->where('tbl_users.status=1');
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