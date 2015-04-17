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

class UserPersonalInfoTable
{
    protected $tableGateway;
	protected $select;
	 public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
		$this->select = new Select();
    }
	public function addPersonalInfo($usersinfo,$user_id){
		if($usersinfo['user_first_name']!=''){
			$fisrt_name = $usersinfo['user_first_name'];
		}else{
			$fisrt_name = '';			
		}
		if($usersinfo['user_last_name']!=''){
			$last_name=$usersinfo['user_last_name'];			
		}else{			
			$last_name='';
		}
		if($usersinfo['user_gendermf']!=''){
			$gender=$usersinfo['user_gendermf'];			
		}else{			
			$gender='';
		}
		if($usersinfo['user_date']!='' && $usersinfo['user_month']!='' && $usersinfo['user_year']!=''){
			$dob=$usersinfo['user_date'].'/'.$usersinfo['user_month'].'/'.$usersinfo['user_year'];			
		}else{			
			$dob='';
		}
		if($usersinfo['user_mobile']!=''){
			$mobilenumber=$usersinfo['user_mobile'];			
		}else{			
			$mobilenumber='';
		}if($usersinfo['user_country']!=''){
			$country=$usersinfo['user_country'];			
		}else{			
			$country='';
		}
		if($usersinfo['user_state']!=''){
			$state=$usersinfo['user_state'];			
		}else{			
			$state='';
		}
		if($usersinfo['user_district']!=''){
			$districtid=$usersinfo['user_district'];			
		}else{			
			$districtid='';
		}
		if($usersinfo['user_parent_name']!=''){
			$parent_name=$usersinfo['user_parent_name'];			
		}else{			
			$parent_name='';
		}
		if($usersinfo['user_parent_lastname']!=''){
			$user_parent_lastname=$usersinfo['user_parent_lastname'];			
		}else{			
			$user_parent_lastname='';
		}
		if($usersinfo['user_mobile_number']!=''){
			$user_mobile_number=$usersinfo['user_mobile_number'];			
		}else{			
			$user_mobile_number='';
		}
		if($usersinfo['user_parent_email']!=''){
			$user_parent_email=$usersinfo['user_parent_email'];			
		}else{			
			$user_parent_email='';
		}
		if($usersinfo['user_parent_pincode']!=''){
			$user_parent_pincode=$usersinfo['user_parent_pincode'];			
		}else{			
			$user_parent_pincode='';
		}
		if($usersinfo['user_perment_pincode']!=''){
			$user_perment_pincode=$usersinfo['user_perment_pincode'];			
		}else{			
			$user_perment_pincode='';
		}
		if($usersinfo['user_afi']!=''){
			$user_afi=$usersinfo['user_afi'];			
		}else{			
			$user_afi='';
		}
		if($usersinfo['user_fnw']!=''){
			$user_fnw=$usersinfo['user_fnw'];			
		}else{			
			$user_fnw='';
		}
		if($usersinfo['user_emp_ctc']!=''){
			$user_emp_ctc=$usersinfo['user_emp_ctc'];			
		}else{			
			$user_emp_ctc='';
		}
		$data = array(
			'user_id' 		        => $user_id,  		
			'first_name' 		    => $fisrt_name, 	
			'last_name'  	        => $last_name,  	
			'gender'  	            => $gender,  	
			'date_of_birth'  	    => $dob,  	
			'mobile_number'  	    => $mobilenumber,  	
			'id_countries'  	    => $country,  	
			'state_id'  	        => $state,  	
			'district_id'    	    => $districtid,  	
			'parents_name'  	    => $parent_name,  	
			'user_parent_lastname'  => $user_parent_lastname,  	
			'p_phone_number'  	    => $user_mobile_number,  	
			'p_email_id'  	        => $user_parent_email,  	
			'p_pincode'  	        => $user_parent_pincode,  	
			'permant_pincode'  	    => $user_perment_pincode,  	
			'annual_family_income'  => $user_afi,  	
			'family_net_worth'  	=> $user_fnw,  	
			'employee_ctc'  	    => $user_emp_ctc,
			'modified_at' 	        => date('Y-m-d H:i:s')
		);
		$insertresult=$this->tableGateway->insert($data);
		return $this->tableGateway->lastInsertValue;	
	}
}