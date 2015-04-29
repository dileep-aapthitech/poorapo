<?php
namespace Users\Controller;
use Zend\Form\Form;
use Zend\Stdlib\ResponseInterface as Response;
use Zend\Stdlib\Parameters;
use Zend\Authentication\AuthenticationService;
use SanAuthWithDbSaveHandler\Storage\IdentityManagerInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;
use Zend\View\Model\JsonModel;
use Zend\Cache\StorageFactory;
use ScnSocialAuth\Mapper\UserProviderInterface;
class UsersController extends AbstractActionController
{
	protected  $userTable;
	protected  $userDetailsTable;
	protected  $userpersonalinfoTable;
	protected  $countriesinfoTable;
	protected  $userTypeTable;
	protected  $statesTable;
	protected  $districtsTable;
	protected  $collegeTable;
	protected  $entranceexamsTable;
	protected  $bacheloredegreeTable;
	protected  $specializationsTable;
	protected  $unversitiesTable;
	protected  $mastersdegreesTable;
	protected  $forgotPasswordTable;
	protected  $univcollegesTable;
	public function indexAction()
	{
	}
	public function viewProfileAction(){
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];
		if(isset($_GET['uid']) && $_GET['uid']!=""){
			$base_user_id = base64_decode($_GET['uid']);
			$getUserDetails = $this->getUserTable()->getUserDetails($base_user_id);			
			$getUserTypes=$this->getUserTypeTable()->getUserTypes();
			$getCountries=$this->getCountriesTable()->getCountries();
			$getStates=$this->getSatesTable()->getSates();
			$getDistricts=$this->getDistrictsTable()->getDistricts();
			$getColleges=$this->getCollegeTable()->getColleges();
			$getEntranceExams=$this->getEntranceExamsTable()->getEntranceExams();
			$getBacheloreDegree=$this->getBacheloreDegreeTable()->getBacheloreDegree();
			$getSpecializations=$this->getSpecializationsTable()->getSpecializations();
			$getMasterDegrees=$this->getMastersDegreeTable()->getMasterDegrees();
			$getUnversities=$this->getUnversitiesTable()->getUnversities();
			if($getUserDetails!=''){
				return new ViewModel(array(				
					'userDetails' 		=> $getUserDetails,						
					'usertypes' 		=> $getUserTypes,
					'countries' 		=> $getCountries,
					'states' 		    => $getStates,
					'districts' 		=> $getDistricts,
					'colleges' 		    => $getColleges->buffer(),
					'entranceexams'     => $getEntranceExams->buffer(),			
					'b_degrees'         => $getBacheloreDegree,			
					'specializations'   => $getSpecializations->buffer(),			
					'unversities'       => $getUnversities->buffer(),			
					'm_degrees'         => $getMasterDegrees,			
					'baseUrl' 			=> $baseUrl,
					'basePath' 			=> $basePath,
				));		
			}
		}
	}
	public function checkEmailExistsAction(){
		if(isset($_POST['user_email']) && $_POST['user_email']!=''){
			$existsEmail=$this->getUserTable()->fpcheckEmail($_POST['user_email']);
			if($existsEmail!=0){
				$result = new JsonModel(array(					
					'output' => 'exists',
					'success'=>true,
				));			
			}else{
				$result = new JsonModel(array(					
					'output' => 'notexists',
					'success'=>false,
				));	
			}
		}
		return $result;
	}
	public function statesAndEntranceexamAction(){
		$htmlStates = '';
		$htmlEntanceExames = '';
		$htmlDistricts = '';
		if(isset($_POST['stateid']) && $_POST['stateid']!=''){
			$districts=$this->getDistrictsTable()->getLocationBasedDistricts($_POST['countryid'],$_POST['stateid']);
			$htmlDistricts.='<option value="">Select District</option>';
			foreach($districts as $dists){
				$htmlDistricts.='<option value="'.$dists->district_id.'">'.$dists->district_name.'</option>';
			}	
			$result = new JsonModel(array(					
				'output' => 'success',
				'success'=>true,
				'dist_names'=>$htmlDistricts,
			));
		}else if(isset($_POST['countryid']) && $_POST['countryid']!=''){
			$entranceExams=$this->getEntranceExamsTable()->getBasedOnCountry($_POST['countryid']);
			$htmlEntanceExames.='<option value="">Exam Name</option>';
			foreach($entranceExams as $entranceExams){
				$htmlEntanceExames.='<option value="'.$entranceExams->entrance_exam_id.'">'.$entranceExams->entrance_exam_name.'</option>';
			}
			$states=$this->getSatesTable()->getBasedcountry($_POST['countryid']);
			$htmlStates.='<option value="">Select a State</option>';
			foreach($states as $statename){
				$htmlStates.='<option value="'.$statename->state_id.'">'.$statename->state_name.'</option>';
			}			
			$result = new JsonModel(array(					
				'output' => 'success',
				'statenames'=>$htmlStates,
				'entranceExams'=>$htmlEntanceExames,
			));			
		}
		return $result;
	}
	public function getAjaxInfoAction(){	
		$html="";
		$result='';		
		if(isset($_POST['countryid'])&& $_POST['countryid']!=""){
				$colleges=$this->getCollegeTable()->getLocationBasedColleges($_POST['countryid'],$_POST['stateid'],$_POST['distid']);
				$html.='<option value="">Select College</option>';
				foreach($colleges as $college){
					$html.='<option value="'.$college->college_id.'">'.$college->college_name.'</option>';
				}
			$result = new JsonModel(array(					
				'output' => 'success',
				'success'=>true,
				'ajaxinfo'=>$html,
			));
		}
		return $result;
	}	
	public function registerAction(){
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];
		$id_countries_birth = 0;
		$id_countries_job = 0;
		$id_countries_school = 0;
		$id_countries_bachelors = 0;
		$id_countries_masters = 0;
		$id_countries_phd = 0;
		$stateId = 0;
		$districtId = 0;
		$jCollId = 0;
		$entranceExam1 = 0;
		$entranceExam2 = 0;
		$entranceExam3 = 0;
		$b_u = 0;
		$b_c = 0;
		$m_u = 0;
		$m_c = 0;
		$d_u = 0;
		$d_c = 0;
		if(isset($_POST['hid_user_id']) && $_POST['hid_user_id']!=''){			
			if( isset($_POST['user_country']) && trim($_POST['user_country'])!='' )
			{
				$countryRs=$this->getCountriesTable()->getCountryIdByName(trim($_POST['user_country']));
				if( count($countryRs) != 0 )
				{
					$id_countries_birth = $countryRs->current()->id_countries;
				}
			}
			if( isset($_POST['user_country_job']) && trim($_POST['user_country_job'])!='' )
			{
				$countryRs1=$this->getCountriesTable()->getCountryIdByName(trim($_POST['user_country_job']));
				if( count($countryRs1) != 0 )
				{
					$id_countries_job = $countryRs1->current()->id_countries;
				}
			}
			
			if( isset($_POST['user_junior_country']) && trim($_POST['user_junior_country'])!='' )
			{
				$countryRs2=$this->getCountriesTable()->getCountryIdByName(trim($_POST['user_junior_country']));
				if( count($countryRs2) != 0 )
				{
					$id_countries_school = $countryRs2->current()->id_countries;
				}
			}
			if( isset($_POST['user_bachelors_country']) && trim($_POST['user_bachelors_country'])!='' )
			{
				$countryRs3=$this->getCountriesTable()->getCountryIdByName(trim($_POST['user_bachelors_country']));
				if( count($countryRs3) != 0 )
				{
					$id_countries_bachelors = $countryRs3->current()->id_countries;
				}
			}
			if( isset($_POST['user_masters_country']) && trim($_POST['user_masters_country'])!='' )
			{
				$countryRs4=$this->getCountriesTable()->getCountryIdByName(trim($_POST['user_masters_country']));
				if( count($countryRs4) != 0 )
				{
					$id_countries_masters = $countryRs4->current()->id_countries;
				}
			}
			if( isset($_POST['user_doctoral_country']) && trim($_POST['user_doctoral_country'])!='' )
			{
				$countryRs5=$this->getCountriesTable()->getCountryIdByName(trim($_POST['user_doctoral_country']));
				if( count($countryRs5) != 0 )
				{
					$id_countries_phd = $countryRs5->current()->id_countries;
				}
			}
			if( isset($_POST['user_state']) && trim($_POST['user_state'])!='' )
			{
				$states=$this->getSatesTable()->getStateIdByName(trim($_POST['user_state']));
				$stateId =$states->state_id;
			}
			if( isset($_POST['user_district']) && trim($_POST['user_district'])!='' )
			{
				$districtId=$this->getDistrictsTable()->getDistrictIdByName(trim($_POST['user_district']));
			}
			
			if( isset($_POST['user_colleges']) && trim($_POST['user_colleges'])!='' )
			{
				$jCollId=$this->getCollegeTable()->getJCollIdByName(trim($_POST['user_colleges']));
			}
			if(isset($_POST['user_entrance_exam_1']) && $_POST['user_entrance_exam_1']!=''){
				$entranceExam1 = $this->getEntranceExamsTable()->getEntranceExamIdByName(trim($_POST['user_entrance_exam_1']));				
			}
			if(isset($_POST['user_entrance_exam_2']) && $_POST['user_entrance_exam_2']!=''){
				$entranceExam2 = $this->getEntranceExamsTable()->getEntranceExamIdByName(trim($_POST['user_entrance_exam_2']));				
			}
			if(isset($_POST['user_entrance_exam_3']) && $_POST['user_entrance_exam_3']!=''){
				$entranceExam3 = $this->getEntranceExamsTable()->getEntranceExamIdByName(trim($_POST['user_entrance_exam_3']));				
			}
			if(isset($_POST['user_bac_unversity']) && $_POST['user_bac_unversity']!=''){
				$b_u = $this->getUnversitiesTable()->getUniversityIdByName(trim($_POST['user_bac_unversity']));				
			}
			if(isset($_POST['user_bac_college']) && $_POST['user_bac_college']!=''){
				$b_c = $this->getUnivCollegesTable()->getColleges(trim($_POST['user_bac_college']));
			}
			if(isset($_POST['user_mast_university']) && $_POST['user_mast_university']!=''){
				$m_u = $this->getUnversitiesTable()->getUniversityIdByName(trim($_POST['user_mast_university']));				
			}
			if(isset($_POST['user_mast_college']) && $_POST['user_mast_college']!=''){
				$m_c = $this->getUnivCollegesTable()->getColleges(trim($_POST['user_mast_college']));
			}
			if(isset($_POST['user_doctor_university']) && $_POST['user_doctor_university']!=''){
				$d_u = $this->getUnversitiesTable()->getUniversityIdByName(trim($_POST['user_mast_university']));				
			}
			if(isset($_POST['user_doctor_college']) && $_POST['user_doctor_college']!=''){
				$d_c = $this->getUnivCollegesTable()->getColleges(trim($_POST['user_doctor_college']));
			}
			$base_user_id =  base64_encode($_POST['hid_user_id']);
			$user_id=$this->getUserTable()->addUser($_POST,$_POST['hid_user_id']);
			$_SESSION['user']['username']=$_POST['user_first_name'];
			$suc = 'udt';
			if($user_id>=0){
				$userpersonalInfo = $this->getUserPersonalInfoTable()->addPersonalInfo($_POST,$_POST['hid_user_id'],$id_countries_birth,$id_countries_job,$stateId,$districtId);
				if($userpersonalInfo>=0){
					$userDetailsInfo  = $this->getUserDetailsTable()->addDetails($_POST,$_POST['hid_user_id'],$id_countries_school,$jCollId,$id_countries_bachelors,$id_countries_masters,$id_countries_phd,$entranceExam1,$entranceExam2,$entranceExam3,$b_u,$b_c,$m_u,$m_c,$d_u,$d_c);					
					if($userDetailsInfo>=0){
						return $this->redirect()->toUrl($baseUrl.'/users/view-profile?uid='.$base_user_id.'&suc='.$suc);
					}
				}
			}
		}else if(isset($_POST['user_type']) && $_POST['user_type']!='' && isset($_POST['hid_user_id']) && $_POST['hid_user_id']==''){			
			if( isset($_POST['user_country']) && trim($_POST['user_country'])!='' )
			{
				$countryRs=$this->getCountriesTable()->getCountryIdByName(trim($_POST['user_country']));
				if( count($countryRs) != 0 )
				{
					$id_countries_birth = $countryRs->current()->id_countries;
				}
			}
			if( isset($_POST['user_country_job']) && trim($_POST['user_country_job'])!='' )
			{
				$countryRs1=$this->getCountriesTable()->getCountryIdByName(trim($_POST['user_country_job']));
				if( count($countryRs1) != 0 )
				{
					$id_countries_job = $countryRs1->current()->id_countries;
				}
			}
			
			if( isset($_POST['user_junior_country']) && trim($_POST['user_junior_country'])!='' )
			{
				$countryRs2=$this->getCountriesTable()->getCountryIdByName(trim($_POST['user_junior_country']));
				if( count($countryRs2) != 0 )
				{
					$id_countries_school = $countryRs2->current()->id_countries;
				}
			}
			if( isset($_POST['user_bachelors_country']) && trim($_POST['user_bachelors_country'])!='' )
			{
				$countryRs3=$this->getCountriesTable()->getCountryIdByName(trim($_POST['user_bachelors_country']));
				if( count($countryRs3) != 0 )
				{
					$id_countries_bachelors = $countryRs3->current()->id_countries;
				}
			}
			if( isset($_POST['user_masters_country']) && trim($_POST['user_masters_country'])!='' )
			{
				$countryRs4=$this->getCountriesTable()->getCountryIdByName(trim($_POST['user_masters_country']));
				if( count($countryRs4) != 0 )
				{
					$id_countries_masters = $countryRs4->current()->id_countries;
				}
			}
			if( isset($_POST['user_doctoral_country']) && trim($_POST['user_doctoral_country'])!='' )
			{
				$countryRs5=$this->getCountriesTable()->getCountryIdByName(trim($_POST['user_doctoral_country']));
				if( count($countryRs5) != 0 )
				{
					$id_countries_phd = $countryRs5->current()->id_countries;
				}
			}
			
			if( isset($_POST['user_state']) && trim($_POST['user_state'])!='' )
			{
				$states=$this->getSatesTable()->getStateIdByName(trim($_POST['user_state']));
				$stateId =$states->state_id;
			}
			if( isset($_POST['user_district']) && trim($_POST['user_district'])!='' )
			{
				$districtId=$this->getDistrictsTable()->getDistrictIdByName(trim($_POST['user_district']));
			}
			
			if( isset($_POST['user_colleges']) && trim($_POST['user_colleges'])!='' )
			{
				$jCollId=$this->getCollegeTable()->getJCollIdByName(trim($_POST['user_colleges']));
			}
			if(isset($_POST['user_entrance_exam_1']) && $_POST['user_entrance_exam_1']!=''){
				$entranceExam1 = $this->getEntranceExamsTable()->getEntranceExamIdByName(trim($_POST['user_entrance_exam_1']));				
			}
			if(isset($_POST['user_entrance_exam_2']) && $_POST['user_entrance_exam_2']!=''){
				$entranceExam2 = $this->getEntranceExamsTable()->getEntranceExamIdByName(trim($_POST['user_entrance_exam_2']));				
			}
			if(isset($_POST['user_entrance_exam_3']) && $_POST['user_entrance_exam_3']!=''){
				$entranceExam3 = $this->getEntranceExamsTable()->getEntranceExamIdByName(trim($_POST['user_entrance_exam_3']));				
			}
			if(isset($_POST['user_bac_unversity']) && $_POST['user_bac_unversity']!=''){
				$b_u = $this->getUnversitiesTable()->getUniversityIdByName(trim($_POST['user_bac_unversity']));				
			}
			if(isset($_POST['user_bac_college']) && $_POST['user_bac_college']!=''){
				$b_c = $this->getUnivCollegesTable()->getUnivCollegeIdByName(trim($_POST['user_bac_college']));
			}
			if(isset($_POST['user_mast_university']) && $_POST['user_mast_university']!=''){
				$m_u = $this->getUnversitiesTable()->getUniversityIdByName(trim($_POST['user_mast_university']));				
			}
			if(isset($_POST['user_mast_college']) && $_POST['user_mast_college']!=''){
				$m_c = $this->getUnivCollegesTable()->getUnivCollegeIdByName(trim($_POST['user_mast_college']));
			}
			if(isset($_POST['user_doctor_university']) && $_POST['user_doctor_university']!=''){
				$d_u = $this->getUnversitiesTable()->getUniversityIdByName(trim($_POST['user_mast_university']));				
			}
			if(isset($_POST['user_doctor_college']) && $_POST['user_doctor_college']!=''){
				$d_c = $this->getUnivCollegesTable()->getUnivCollegeIdByName(trim($_POST['user_doctor_college']));
			}
			$user_id=$this->getUserTable()->addUser($_POST,$_POST['hid_user_id']='');
			if($user_id!=0){
				$userpersonalInfo = $this->getUserPersonalInfoTable()->addPersonalInfo($_POST,$user_id,$id_countries_birth,$id_countries_job,$stateId,$districtId);
				if($userpersonalInfo!=0){
					$userDetailsInfo  = $this->getUserDetailsTable()->addDetails($_POST,$user_id,$id_countries_school,$jCollId,$id_countries_bachelors,$id_countries_masters,$id_countries_phd,$entranceExam1,$entranceExam2,$entranceExam3,$b_u,$b_c,$m_u,$m_c,$d_u,$d_c);					
					if($userDetailsInfo!=0){
						$usersTable=$this->getUserTable();
						$userDetails = $usersTable->getUser($user_id);
						if($userDetails!=''){						
							$base_user_id =  base64_encode($userDetails->user_id);
							include('public/PHPMailer_5.2.4/sendmail.php');	
							$suc = 'reg';
							global $regSubject;				
							global $regMessage;
							$username = $userDetails->first_name;
							$username = $userDetails->first_name;
							$to=$userDetails->email_id;
							$regMessage = str_replace("<FULLNAME>","$username", $regMessage);
							if(isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST']=='poraapo.com'){
								$regMessage = str_replace("<ACTIVATIONLINK>","http://" . $_SERVER['HTTP_HOST']."/users/reg-authentication?uid=".$base_user_id, $regMessage);
							}else{
								$regMessage = str_replace("<ACTIVATIONLINK>",$baseUrl."/users/reg-authentication?uid=".$base_user_id, $regMessage);
							}
							if(sendMail($to,$regSubject,$regMessage)){
								if(isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST']=='poraapo.com'){
									return $this->redirect()->toUrl($baseUrl.'?suc='.$suc);
								}else{
									return $this->redirect()->toUrl($baseUrl.'?suc='.$suc);
								}
							}else{
								return $this->redirect()->toUrl($baseUrl.'?suc='.$suc);
							}							
						}						
					}
				}
			}
		}else if(isset($_GET['uid']) && $_GET['uid']!=""){
			$base_user_id = base64_decode($_GET['uid']);
			$getUserDetails = $this->getUserTable()->getUserDetails($base_user_id);
			$getUserTypes=$this->getUserTypeTable()->getUserTypes();
			$getCountries=$this->getCountriesTable()->getCountries();
			$getStates=$this->getSatesTable()->getSates();
			$getDistricts=$this->getDistrictsTable()->getDistricts();
			$getColleges=$this->getCollegeTable()->getColleges();
			$getEntranceExams=$this->getEntranceExamsTable()->getEntranceExams();
			$getBacheloreDegree=$this->getBacheloreDegreeTable()->getBacheloreDegree();
			$getSpecializations=$this->getSpecializationsTable()->getSpecializations();
			$getMasterDegrees=$this->getMastersDegreeTable()->getMasterDegrees();
			$getUnversities=$this->getUnversitiesTable()->getUnversities();
			if($getUserDetails!=''){
				return new ViewModel(array(				
					'userDetails' 		=> $getUserDetails,						
					'usertypes' 		=> $getUserTypes,
					'countries' 		=> $getCountries,
					'states' 		    => $getStates,
					'districts' 		=> $getDistricts,
					'colleges' 		    => $getColleges->buffer(),
					'entranceexams'     => $getEntranceExams->buffer(),			
					'b_degrees'         => $getBacheloreDegree,			
					'specializations'   => $getSpecializations->buffer(),			
					'unversities'       => $getUnversities->buffer(),			
					'm_degrees'         => $getMasterDegrees,			
					'baseUrl' 			=> $baseUrl,
					'basePath' 			=> $basePath,
				));		
			}
		}else{
			$getUserTypes=$this->getUserTypeTable()->getUserTypes();
			$getCountries=$this->getCountriesTable()->getCountries();
			$getStates=$this->getSatesTable()->getSates();
			$getDistricts=$this->getDistrictsTable()->getDistricts();
			$getColleges=$this->getCollegeTable()->getColleges();
			$getEntranceExams=$this->getEntranceExamsTable()->getEntranceExams();
			$getBacheloreDegree=$this->getBacheloreDegreeTable()->getBacheloreDegree();
			$getSpecializations=$this->getSpecializationsTable()->getSpecializations();
			$getMasterDegrees=$this->getMastersDegreeTable()->getMasterDegrees();
			$getUnversities=$this->getUnversitiesTable()->getUnversities();
			return new ViewModel(array(				
				'usertypes' 		=> $getUserTypes,
				'countries' 		=> $getCountries,
				'states' 		    => $getStates,
				'districts' 		=> $getDistricts,
				'colleges' 		    => $getColleges->buffer(),
				'entranceexams'     => $getEntranceExams->buffer(),			
				'b_degrees'         => $getBacheloreDegree,			
				'specializations'   => $getSpecializations->buffer(),			
				'unversities'       => $getUnversities->buffer(),			
				'm_degrees'         => $getMasterDegrees,			
				'baseUrl' 			=> $baseUrl,
				'basePath' 			=> $basePath,
			));	
		}
	}
	public function regAuthenticationAction(){
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];
		$userid=base64_decode($_GET['uid']);		
		$userAuth=$this->getUserTable()->updateUserRegAuth($userid);		
		$userDetails=$this->getUserTable()->checkUserStatus($userid);		
		if($userDetails!=''){
			$to=$userDetails->email_id;
			$userName=ucfirst($userDetails->first_name);
			$user_session = new Container('user');
			$user_session->username=$userDetails->first_name;
			$user_session->email=$userDetails->email_id;
			$user_session->user_id=$userDetails->user_id;
			$user_session->user_type=$userDetails->user_type_id;
			include('public/PHPMailer_5.2.4/sendmail.php');	
			global $completeRegisterSubject;				
			global $completeRegisterMessage;
			$base_user_id=base64_encode($userid);
			$completeRegisterMessage = str_replace("<FULLNAME>",$userName, $completeRegisterMessage);
			if(isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST']=='poraapo.com'){
				$completeRegisterMessage = str_replace("<ClickeHere>","http://" . $_SERVER['HTTP_HOST'], $completeRegisterMessage);	
			}else{
				$completeRegisterMessage = str_replace("<ClickeHere>",$baseUrl, $completeRegisterMessage);	
			}
			if(sendMail($to,$completeRegisterSubject,$completeRegisterMessage)){		
				return $this->redirect()->toUrl($baseUrl.'/users/view-profile?uid='.$base_user_id);
			}else{
				return $this->redirect()->toUrl($baseUrl.'/users/view-profile?uid='.$base_user_id);
			}
		}
	}
	public function loginAction()
	{
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];
		if(isset($_POST['inputEmail']) && $_POST['inputEmail']!=""){
			$usersTable=$this->getUserTable();
			$userDetails = $usersTable->checkEmailExists($_POST);
			if($userDetails!=''){
				$user_session = new Container('user');
				$user_session->username=$userDetails->first_name;
				$user_session->email=$userDetails->email_id;
				$user_session->user_id=$userDetails->user_id;
				$user_session->user_type=$userDetails->user_type_id;
				$result = new JsonModel(array(					
					'output' => 'success',
					'user_id' => json_decode($userDetails->user_id),
					'user_type_id' => json_decode($userDetails->user_type_id),
				));
			}else{
				 $result = new JsonModel(array(					
					'output' => 'not success',
				));
			}
			return $result;
		}	
	}
	public function logoutAction(){	
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		unset($_SESSION['user']);
		return $this->redirect()->toUrl($baseUrl);
	}
	public function changePasswordAction()
	{
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];
		if(isset($_POST['cnfpwrd'])){
			$usersTable=$this->getUserTable();
			$changepwd = $usersTable->changepwd($_POST['cnfpwrd'],$_POST['userId']);	
			if($changepwd>0){			
				$result = new JsonModel(array(					
					'output' => 'success',
				));			
			}else{
				$result = new JsonModel(array(					
					'output' => 'not success',
				));
			}
			return $result;	
		}		
	
	}
	public function checkPasswordAction(){ 
		$usersTable=$this->getUserTable();
		$pwdExit = $usersTable->getpassword($_POST['oldpasswrd'],$_POST['userId']);		
		if($pwdExit>0){			
			$result = new JsonModel(array(					
				'output' => 'success',
			));			
		}else{
			$result = new JsonModel(array(					
				'output' => 'not success',
			));
		}
		return $result;		
	}	
	public function forgotPasswordAction(){	
	
	}
	public function sendPasswordResetUrlAction(){
		$baseUrls = $this->getServiceLocator()->get('config');
        $baseUrlArr = $baseUrls['urls'];
        $baseUrl = $baseUrlArr['baseUrl'];
		$sentMail=0;
		if(isset($_POST['email']) && $_POST['email']!=""){
			$username=$_POST['email'];
			$usersTable=$this->getUserTable();
			$forgetTable=$this->getForgotPasswordTable();
			$emailCount = $usersTable->checkEmail($_POST['email'])->toArray();
			if(count($emailCount)!=0){
				$user_id=$emailCount[0]['user_id'];
				$token = getUniqueCode('10');
				$mailExit=$forgetTable->getmailfromfgtpwd($_POST['email'])->toArray();
				if(count($mailExit)!=0){
					$alreadyexitid=$mailExit[0]['forget_pwd_id'];
					$getuserId=$forgetTable->updateForgetPassword($alreadyexitid,$token,$user_id);
				}else{
					$alreadyexitid='';
					$getuserId=$forgetTable->addForgetpwd($alreadyexitid,$_POST['email'],$user_id,$token);
				}
				include('public/PHPMailer_5.2.4/sendmail.php');	
				global $forgotPasswordSubject;				
				global $frogotPasswordMessage;
				$frogotPasswordMessage = str_replace("<FULLNAME>",$username, $frogotPasswordMessage);
				$frogotPasswordMessage = str_replace("<PASSWORDLINK>",$baseUrl."/users/reset-password?token=".$token, $frogotPasswordMessage);	
				$to=$_POST['email'];
				if(sendMail($to,$forgotPasswordSubject,$frogotPasswordMessage)){
						$result = new JsonModel(array(					
							'output' => 'success',
							'success'=>true,
						));	
				}else{
					 $result = new JsonModel(array(					
					'output' 	=> 'notsuccess',
					));
				}
			}else{
				$result = new JsonModel(array(					
					'output' 	=> 'Not Found The Email',
				));
			}
			return $result;
		}		
	}
	public function resetPasswordAction(){
		$token=$_GET['token'];
		$tokeninfo=array();
		$exitToke=0;
		$forgetTable=$this->getForgotPasswordTable();
		$tokenExit=$forgetTable->gettoken($token)->toArray();	
		if(count($tokenExit)!=0){				
			$result = new ViewModel(array(					
				'output' => 'success',
				'existtoken' =>'1'
			));			
		}else{
			$result = new ViewModel(array(					
				'output' => 'not success',
				'existtoken' =>'0'
			));
		}
		return $result;		
	}
	public function setnepasswordAction(){
		if(isset($_POST['token']) && $_POST['token']!=""){
			$token=$_POST['token'];		
			$tokeninfo=array();
			$forgetTable=$this->getForgotPasswordTable();
			$usersTable=$this->getUserTable();
			$tokenExit=$forgetTable->gettoken($token);
			foreach($tokenExit as $tokeninfo){}
			if($tokeninfo->user_id>0){
				$changepwd = $usersTable->changepwd($_POST['cnfpwrd'],$tokeninfo->user_id);	
				if($changepwd>=0){
					$deletetokenid=$forgetTable->deletetoken($tokeninfo->forget_pwd_id);
					$result = new JsonModel(array(					
						'output' => 'success',
						'success'=>false,
					));			
				}else{
					$result = new JsonModel(array(					
						'output' => 'not success',
						'not success'=>false,
					));
				}				
			}else{
				$result = new JsonModel(array(					
					'output' => 'not success',
					'not success'=>false,
				));	
			}
			return $result;	
		}
	}	
	public function contactUsAction(){
		if(isset($_POST['contactEmail']) && $_POST['contactEmail']!=""){
			$baseUrls = $this->getServiceLocator()->get('config');
			$baseUrlArr = $baseUrls['urls'];
			$baseUrl = $baseUrlArr['baseUrl'];
			include('public/PHPMailer_5.2.4/sendmail.php');	
			global $contactSubject;				
			global $contactMessage;
			$contactMessage = str_replace("<FIRSTNAME>",$_POST['firstName'], $contactMessage);
			$contactMessage = str_replace("<CONTACTEMAIL>",$_POST['contactEmail'], $contactMessage);
			$contactMessage = str_replace("<LASTNAME>",$_POST['lastName'], $contactMessage);
			$contactMessage = str_replace("<PHONENUMBER>",$_POST['mobileNumber'], $contactMessage);
			$contactMessage = str_replace("<CONTACTMESSAGE>",$_POST['contactMessage'], $contactMessage);
			$to='krishna@poraapo.org';
			if(sendMail($to,$contactSubject,$contactMessage)){
					$result = new ViewModel(array(					
						'output' 	=> 'success',
					));	
			}else{
				   $result = new ViewModel(array(					
						'output' 	=> 'notsuccess',
				   ));
			}
			return $result;
		}
	}
	public function searchCountryNamesAction(){
		$list_countries='';
		$hashNames="";
		$hashNameIds="";
		$count="";
		if(isset($_POST['value']) && $_POST['value']!=""){
			$getCountries=$this->getCountriesTable()->searchCountry($_POST['value']);
			foreach($getCountries as $key=>$search){
				$list_countries[$key]=$search->name;
				$hashNameIds[$key]=$key;
				$count=$key;				
			}
			$combined = array();
			if($list_countries!=''){				
				foreach($list_countries as $index => $refNumber) {			
					$combined[] = array(
						'ref'  => $refNumber,
						'part' => $hashNameIds[$index]
					);
				}
			}
		}else{
			$getCountries=$this->getCountriesTable()->getCountries();
			if(count($this->countries)!='') {
				foreach($this->countries as $key=>$search){
					$list_countries[$key]=$search->name;
					$hashNameIds[$key]=$key;
					$count=$key;
				}
			}
			$combined = array();
			if($list_countries!=''){	
				foreach($list_countries as $index => $refNumber) {			
					$combined[] = array(
						'ref'  => $refNumber,
						'part' => $hashNameIds[$index]
					);
				}	
			}			
		}	
		if(count($getCountries)!=0){
			$result = new JsonModel(array(					
				'searchHashNames' => $combined,
				'success'=>true,
			));			
		}else{
			$result = new JsonModel(array(					
				'searchHashNames' => $combined,
				'success'=>false,
			));	
		}		
		return $result;
	}
	public function searchCountryNamesJobsAction(){
		$list_countries='';
		$hashNames="";
		$hashNameIds="";
		$count="";
		if(isset($_POST['value']) && $_POST['value']!=""){
			$getCountries=$this->getCountriesTable()->searchCountry($_POST['value']);
			foreach($getCountries as $key=>$search){
				$list_countries[$key]=$search->name;
				$hashNameIds[$key]=$key;
				$count=$key;				
			}
			$combined = array();
			if($list_countries!=''){				
				foreach($list_countries as $index => $refNumber) {			
					$combined[] = array(
						'ref'  => $refNumber,
						'part' => $hashNameIds[$index]
					);
				}
			}
		}else{
			$getCountries=$this->getCountriesTable()->getCountries();
			if(count($this->countries)!='') {
				foreach($this->countries as $key=>$search){
					$list_countries[$key]=$search->name;
					$hashNameIds[$key]=$key;
					$count=$key;
				}
			}
			$combined = array();
			if($list_countries!=''){	
				foreach($list_countries as $index => $refNumber) {			
					$combined[] = array(
						'ref'  => $refNumber,
						'part' => $hashNameIds[$index]
					);
				}	
			}			
		}	
		if(count($getCountries)!=0){
			$result = new JsonModel(array(					
				'searchHashNames' => $combined,
				'success'=>true,
			));			
		}else{
			$result = new JsonModel(array(					
				'searchHashNames' => $combined,
				'success'=>false,
			));	
		}		
		return $result;
	}
	public function getStatesAction(){
		$list_countries='';
		$hashNames="";
		$hashNameIds="";
		$count="";
		if(isset($_POST['country_name']) && $_POST['country_name']!=''){
			$countryDetails=$this->getCountriesTable()->getCountryIdByName($_POST['country_name']);
			if(count($countryDetails)!=''){
				$country_id = $countryDetails->current()->id_countries;
				$states=$this->getSatesTable()->getStates($country_id,$_POST['value']);
				foreach($states as $key=>$search){
					$list_countries[$key]=$search->state_name;
					$hashNameIds[$key]=$key;
					$count=$key;				
				}
				$combined = array();
				if($list_countries!=''){				
					foreach($list_countries as $index => $refNumber) {			
						$combined[] = array(
							'ref'  => $refNumber,
							'part' => $hashNameIds[$index]
						);
					}
				}
			}
			$result = new JsonModel(array(					
				'searchHashNames' => $combined,
				'success'=>true,
			));			
			return $result;
		}
	}
	public function getDistrictsAction(){
		$list_countries='';
		$hashNames="";
		$hashNameIds="";
		$count="";
		if(isset($_POST['state_name']) && $_POST['state_name']!=''){
			$states=$this->getSatesTable()->getStateIdByName($_POST['state_name']);
			if($states->state_id!=''){
				$getDistricts=$this->getDistrictsTable()->getDistrictsStates($states->state_id,$_POST['value']);
				foreach($getDistricts as $key=>$search){
					$list_countries[$key]=$search->district_name;
					$hashNameIds[$key]=$key;
					$count=$key;				
				}
				$combined = array();
				if($list_countries!=''){				
					foreach($list_countries as $index => $refNumber) {			
						$combined[] = array(
							'ref'  => $refNumber,
							'part' => $hashNameIds[$index]
						);
					}
				}
				$result = new JsonModel(array(					
					'searchHashNames' => $combined,
					'success'=>true,
				));			
				return $result;
			}
		}
	}
	public function getSchoolsAction(){
		$list_countries='';
		$hashNames="";
		$hashNameIds="";
		$count="";
		$combined = array();
		if(isset($_POST['dist_name']) && $_POST['dist_name']!=""){ 
			$countryDetails=$this->getCountriesTable()->getCountryIdByName($_POST['country_name']);
			if(count($countryDetails)!=''){ 
				$country_id = $countryDetails->current()->id_countries;
				$states=$this->getSatesTable()->getStateIdByName($_POST['state_name']);
				$stateId = $states->state_id;
				if($stateId!=''){
					$districtId=$this->getDistrictsTable()->getDistrictIdByName($_POST['dist_name']);
					if($districtId!=''){
						$getColleges=$this->getCollegeTable()->getSchools($country_id,$stateId,$districtId,$_POST['value']);
						if(count($getColleges)!=""){
							foreach($getColleges as $key=>$search){
								$list_countries[$key]=$search->college_name;
								$hashNameIds[$key]=$key;
								$count=$key;				
							}
							if($list_countries!=''){				
								foreach($list_countries as $index => $refNumber) {			
									$combined[] = array(
										'ref'  => $refNumber,
										'part' => $hashNameIds[$index]
									);
								}
							}
						}
						$result = new JsonModel(array(					
							'searchHashNames' => $combined,
							'success'=>true,
						));			
						return $result;
					}
				}
			}
		}
	}
	public function getBachelorsUniversityAction(){
		$list_countries='';
		$hashNames="";
		$hashNameIds="";
		$count="";
		if(isset($_POST['spec_id']) && $_POST['spec_id']!=''){
			$countryDetails=$this->getCountriesTable()->getCountryIdByName($_POST['country_name']);
			if(count($countryDetails)!=''){ 
				$country_id = $countryDetails->current()->id_countries;
				$getUnversities=$this->getUnversitiesTable()->getUniversities($_POST['spec_id'],$country_id,$_POST['value']);				
				foreach($getUnversities as $key=>$search){
					$list_countries[$key]=$search->unversity_name;
					$hashNameIds[$key]=$key;
					$count=$key;				
				}
				$combined = array();
				if($list_countries!=''){				
					foreach($list_countries as $index => $refNumber) {			
						$combined[] = array(
							'ref'  => $refNumber,
							'part' => $hashNameIds[$index]
						);
					}
				}
				$result = new JsonModel(array(					
					'searchHashNames' => $combined,
					'success'=>true,
				));			
				return $result;
			}
		}
	}
	public function getBachelorsCollegesAction(){
		$list_countries='';
		$hashNames="";
		$hashNameIds="";
		$count="";
		if(isset($_POST['univ_name']) && $_POST['univ_name']!=''){
			$countryDetails=$this->getCountriesTable()->getCountryIdByName($_POST['country_name']);
			if(count($countryDetails)!=''){ 
				$country_id = $countryDetails->current()->id_countries;
				$univId=$this->getUnversitiesTable()->getUniversityIdByName($_POST['univ_name']);	
				if($univId!=''){				
					$getColleges = $this->getUnivCollegesTable()->getColleges($_POST['spec_id'],$country_id,$univId,$_POST['value']);
					foreach($getColleges as $key=>$search){
						$list_countries[$key]=$search->univ_college_name;
						$hashNameIds[$key]=$key;
						$count=$key;				
					}
					$combined = array();
					if($list_countries!=''){				
						foreach($list_countries as $index => $refNumber) {			
							$combined[] = array(
								'ref'  => $refNumber,
								'part' => $hashNameIds[$index]
							);
						}
					}
					$result = new JsonModel(array(					
						'searchHashNames' => $combined,
						'success'=>true,
					));			
					return $result;
				}
			}
		}
	}
	public function getEntranceExamsAction(){
		$list_exams='';
		$hashNames="";
		$hashNameIds="";
		$count="";
		if(isset($_POST['value']) && $_POST['value']!=''){					
			$getEntranceExams = $this->getEntranceExamsTable()->getEntranceExamsB($_POST['value']);
			foreach($getEntranceExams as $key=>$search){
				$list_exams[$key]=$search->entrance_exam_name;
				$hashNameIds[$key]=$key;
				$count=$key;				
			}
			$combined = array();
			if($list_exams!=''){				
				foreach($list_exams as $index => $refNumber) {			
					$combined[] = array(
						'ref'  => $refNumber,
						'part' => $hashNameIds[$index]
					);
				}
			}
			$result = new JsonModel(array(					
				'searchHashNames' => $combined,
				'success'=>true,
			));			
			return $result;
		}
	}
	//public function headerAction view  header page returns view part
	public function getUnivCollegesTable()
    {
        if (!$this->univcollegesTable) {				
            $sm = $this->getServiceLocator();
            $this->univcollegesTable = $sm->get('Users\Model\UnivCollegesFactory');			
        }
        return $this->univcollegesTable;
    }
	public function getUserTable()
    {
        if (!$this->userTable) {				
            $sm = $this->getServiceLocator();
            $this->userTable = $sm->get('Users\Model\UserTableFactory');			
        }
        return $this->userTable;
    }
	public function getForgotPasswordTable()
    {
        if (!$this->forgotPasswordTable) {				
            $sm = $this->getServiceLocator();
            $this->forgotPasswordTable = $sm->get('Users\Model\ForgotPasswordFactory');			
        }
        return $this->forgotPasswordTable;
    }
	public function getUserPersonalInfoTable()
    {
        if (!$this->userpersonalinfoTable) {				
            $sm = $this->getServiceLocator();
            $this->userpersonalinfoTable = $sm->get('Users\Model\UserPersonalInfoFactory');			
        }
        return $this->userpersonalinfoTable;
    }
	public function getUserDetailsTable()
    {
        if (!$this->userDetailsTable) {				
            $sm = $this->getServiceLocator();
            $this->userDetailsTable = $sm->get('Users\Model\UserDetailsFactory');			
        }
        return $this->userDetailsTable;
    }
	public function getUserTypeTable()
    {
        if (!$this->userTypeTable) {		
            $sm = $this->getServiceLocator();
            $this->userTypeTable = $sm->get('Users\Model\UserTypeFactory');			
        }
        return $this->userTypeTable;
    }
	public function getCountriesTable()
    {
        if (!$this->countriesinfoTable) {		
            $sm = $this->getServiceLocator();
            $this->countriesinfoTable = $sm->get('Users\Model\CountriesFactory');			
        }
        return $this->countriesinfoTable;
    }
	public function getSatesTable()
    {
        if (!$this->statesTable) {		
            $sm = $this->getServiceLocator();
            $this->statesTable = $sm->get('Users\Model\StatesFactory');			
        }
        return $this->statesTable;
    }
	public function getDistrictsTable()
    {
        if (!$this->districtsTable) {		
            $sm = $this->getServiceLocator();
            $this->districtsTable = $sm->get('Users\Model\DistrictsFactory');			
        }
        return $this->districtsTable;
    }
	public function getCollegeTable()
    {
        if (!$this->collegeTable) {		
            $sm = $this->getServiceLocator();
            $this->collegeTable = $sm->get('Users\Model\CollegesFactory');			
        }
        return $this->collegeTable;
    }
	public function getEntranceExamsTable()
    {
        if (!$this->entranceexamsTable) {		
            $sm = $this->getServiceLocator();
            $this->entranceexamsTable = $sm->get('Users\Model\EntranceExamFactory');			
        }
        return $this->entranceexamsTable;
    }
	public function getBacheloreDegreeTable()
    {
        if (!$this->bacheloredegreeTable) {		
            $sm = $this->getServiceLocator();
            $this->bacheloredegreeTable = $sm->get('Users\Model\BacheloreDegreesFactory');			
        }
        return $this->bacheloredegreeTable;
    }
	public function getSpecializationsTable()
    {
        if (!$this->specializationsTable) {		
            $sm = $this->getServiceLocator();
            $this->specializationsTable = $sm->get('Users\Model\SpecializationFactory');			
        }
        return $this->specializationsTable;
    }
	public function getMastersDegreeTable()
    {
        if (!$this->mastersdegreesTable) {		
            $sm = $this->getServiceLocator();
            $this->mastersdegreesTable = $sm->get('Users\Model\MastersDegreeFactory');			
        }
        return $this->mastersdegreesTable;
    }
	public function getUnversitiesTable()
    {
        if (!$this->unversitiesTable) {		
            $sm = $this->getServiceLocator();
            $this->unversitiesTable = $sm->get('Users\Model\UniversitiesFactory');			
        }
        return $this->unversitiesTable;
    }
}