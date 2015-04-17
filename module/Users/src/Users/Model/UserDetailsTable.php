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

class UserDetailsTable
{
    protected $tableGateway;
	protected $select;

	 public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
		$this->select = new Select();
    }
	public function addDetails($usersinfo,$user_id){
		if($usersinfo['user_colleges']!=''){
			$user_colleges = $usersinfo['user_colleges'];
		}else{
			$user_colleges = '';			
		}
		if($usersinfo['user_principal_name']!=''){
			$user_principal_name=$usersinfo['user_principal_name'];			
		}else{			
			$user_principal_name='';
		}
		if($usersinfo['user_princi_phone']!=''){
			$user_princi_phone=$usersinfo['user_princi_phone'];			
		}else{			
			$user_princi_phone='';
		}
		if($usersinfo['user_princi_email']!=''){
			$user_princi_email=$usersinfo['user_princi_email'];			
		}else{			
			$user_princi_email='';
		}
		if($usersinfo['user_entrance_year']!=''){
			$user_entrance_year=$usersinfo['user_entrance_year'];			
		}else{			
			$user_entrance_year='';
		}
		if($usersinfo['user_entrance_exam']!=''){
			$user_entrance_exam=$usersinfo['user_entrance_exam'];			
		}else{			
			$user_entrance_exam='';
		}
		if($usersinfo['user_entrance_rank']!=''){
			$user_entrance_rank=$usersinfo['user_entrance_rank'];			
		}else{			
			$user_entrance_rank='';
		}
		if($usersinfo['user_bac_degree']!=''){
			$user_bac_degree=$usersinfo['user_bac_degree'];			
		}else{			
			$user_bac_degree='';
		}
		if($usersinfo['user_bac_unversity']!=''){
			$user_bac_unversity=$usersinfo['user_bac_unversity'];			
		}else{			
			$user_bac_unversity='';
		}
		if($usersinfo['user_bac_college']!=''){
			$user_bac_college=$usersinfo['user_bac_college'];			
		}else{			
			$user_bac_college='';
		}
		if($usersinfo['user_bac_speclization']!=''){
			$user_bac_speclization=$usersinfo['user_bac_speclization'];			
		}else{			
			$user_bac_speclization='';
		}
		if($usersinfo['user_bac_year']!=''){
			$user_bac_year=$usersinfo['user_bac_year'];			
		}else{			
			$user_bac_year='';
		}
		if($usersinfo['user_master_degree']!=''){
			$user_master_degree=$usersinfo['user_master_degree'];			
		}else{			
			$user_master_degree='';
		}
		if($usersinfo['user_mast_university']!=''){
			$user_mast_university=$usersinfo['user_mast_university'];			
		}else{			
			$user_mast_university='';
		}
		if($usersinfo['user_mast_college']!=''){
			$user_mast_college=$usersinfo['user_mast_college'];			
		}else{			
			$user_mast_college='';
		}
		if($usersinfo['user_mast_spec']!=''){
			$user_mast_spec=$usersinfo['user_mast_spec'];			
		}else{			
			$user_mast_spec='';
		}
		if($usersinfo['user_mast_year']!=''){
			$user_mast_year=$usersinfo['user_mast_year'];			
		}else{			
			$user_mast_year='';
		}
		if($usersinfo['user_doctor_phd']!=''){
			$user_doctor_phd=$usersinfo['user_doctor_phd'];			
		}else{			
			$user_doctor_phd='';
		}
		if($usersinfo['user_doctor_university']!=''){
			$user_doctor_university=$usersinfo['user_doctor_university'];			
		}else{			
			$user_doctor_university='';
		}
		if($usersinfo['user_doctor_college']!=''){
			$user_doctor_college=$usersinfo['user_doctor_college'];			
		}else{			
			$user_doctor_college='';
		}
		if($usersinfo['user_doctor_spec']!=''){
			$user_doctor_spec=$usersinfo['user_doctor_spec'];			
		}else{			
			$user_doctor_spec='';
		}
		if($usersinfo['user_doctor_year']!=''){
			$user_doctor_year=$usersinfo['user_doctor_year'];			
		}else{			
			$user_doctor_year='';
		}
		$data = array(
			'user_id' 		            => $user_id,  		
			'college_name' 		        => $user_colleges, 	
			'principal_name'  	        => $user_principal_name,  	
			'principal_phone_num'       => $user_princi_phone,  	
			'principal_email_id'        => $user_princi_email,  	
			'entrance_exam'  	        => $user_entrance_exam,  	
			'which_year'  	            => $user_entrance_year,  	
			'entrance_rank'  	        => $user_entrance_rank,  	
			'bachelors_degree_name'     => $user_bac_degree,  	
			'bachelors_university_name' => $user_bac_unversity,  	
			'bachelors_college'         => $user_bac_college,  	
			'bachelors_specialization'  => $user_bac_speclization,  	
			'bachelors_year_admission'  => $user_bac_year,  	
			'masters_degree'  	        => $user_master_degree,  	
			'masters_university'  	    => $user_mast_university,  	
			'masters_college'           => $user_mast_college,  	
			'masters_specialization'  	=> $user_mast_spec,  	
			'masters_year_admission'  	=> $user_mast_year,
			'doctorate_name'  	        => $user_doctor_phd,
			'doctorate_college'  	    => $user_doctor_university,
			'doctorate_university'  	=> $user_doctor_college,
			'doctorate_specialization' 	=> $user_doctor_spec,
			'doctorate_year' 	        => $user_doctor_year,
			'modified_at' 	            => date('Y-m-d H:i:s'),   
		);
		if(isset($_SESSION['user']['user_id']) && $_SESSION['user']['user_id']!=""){
			$updateresult=$this->tableGateway->update($data, array('user_id' => $user_id));
			return $updateresult;
		}else{
			$insertresult=$this->tableGateway->insert($data);
			return $this->tableGateway->lastInsertValue;	
		}	
		
	}
	

}