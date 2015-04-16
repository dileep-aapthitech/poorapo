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
	public function indexAction()
	{
	}
	public function checkEmailExistsAction(){
		if(isset($_POST['user_email']) && $_POST['user_email']!=''){
			$existsEmail=$this->getUserTable()->checkEmail($_POST['user_email']);
			if($existsEmail!=''){
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
	public function getAjaxInfoAction(){	
		$html="";
		$result='';		
		if(isset($_POST['type']) && $_POST['type']!=''){
			if($_POST['type']=='entrance_exam_info'){
				$entranceExams=$this->getEntranceExamsTable()->getBasedOnCountry($_POST['countryid']);
				$html.='<option value="">Select a Entrance Exams</option>';
				foreach($entranceExams as $entranceExams){
					$html.='<option value="'.$entranceExams->entrance_exam_id.'">'.$entranceExams->entrance_exam_name.'</option>';
				}			
			}else if($_POST['type']=='college_info'){
				$colleges=$this->getCollegeTable()->getLocationBasedColleges($_POST['countryid'],$_POST['stateid'],$_POST['distid']);
				$html.='<option value="">Select a Colleges</option>';
				foreach($colleges as $college){
					$html.='<option value="'.$college->college_id.'">'.$college->college_name.'</option>';
				}
			}
			$result = new JsonModel(array(					
				'output' => 'success',
				'success'=>true,
				'ajaxinfo'=>$html,
			));
		}else if(isset($_POST['stateid']) && $_POST['stateid']!=''){
			$districts=$this->getDistrictsTable()->getLocationBasedDistricts($_POST['countryid'],$_POST['stateid']);
			$html.='<option value="">Select a Districts</option>';
			foreach($districts as $dists){
				$html.='<option value="'.$dists->district_id.'">'.$dists->district_name.'</option>';
			}			
			$result = new JsonModel(array(					
				'output' => 'success',
				'success'=>true,
				'dist_names'=>$html,
				));
		}else if(isset($_POST['countryid']) && $_POST['countryid']!=''){
			$states=$this->getSatesTable()->getSates($_POST['countryid']);
			$html.='<option value="">Select a State</option>';
			foreach($states as $statename){
				$html.='<option value="'.$statename->state_id.'">'.$statename->state_name.'</option>';
			}			
			$result = new JsonModel(array(					
				'output' => 'success',
				'success'=>true,
				'statenames'=>$html,
			));
		}
		return $result;
	}	
	public function registerAction(){
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];
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
			'colleges' 		    => $getColleges,
			'entranceexams'     => $getEntranceExams,			
			'b_degrees'         => $getBacheloreDegree,			
			'specializations'   => $getSpecializations,			
			'unversities'       => $getUnversities,			
			'm_degrees'         => $getMasterDegrees,			
			'baseUrl' 			=> $baseUrl,
			'basePath' 			=> $basePath,
		));
		
		
	}
	public function loginAction()
	{
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];
		if(isset($_POST['email']) && $_POST['email']!=""){
			$usersTable=$this->getUserTable();
			$userDetails = $usersTable->checkEmailExists($_POST);
			if($userDetails!=''){
				$user_session = new Container('user');
				$user_session->username=$userDetails->user_name;
				$user_session->email=$userDetails->email_id;
				$user_session->user_id=$userDetails->user_id;
				$user_session->user_type=$userDetails->user_type_id;
				$result = new JsonModel(array(					
					'output' => 'success',
					'user_id' => json_decode($userDetails->user_id),
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
		//echo "<pre>";print_r($_POST);exit;
		$baseUrls = $this->getServiceLocator()->get('config');
        $baseUrlArr = $baseUrls['urls'];
        $baseUrl = $baseUrlArr['baseUrl'];
		$sentMail=0;
		if(isset($_POST['email']) && $_POST['email']!=""){
			$usersTable=$this->getUserTable();
			$usersTable=$this->getForgotPasswordTable();
			$emailCount = $usersTable->checkEmail($_POST['email']);
			if($emailCount!=''){				
				$user_id=$emailCount->user_id;
				$username=$emailCount->user_name;
				$token = getUniqueCode('10');
				$user_type_id=$emailCount->user_type_id;
				$mailExit=$forgetTable->getmailfromfgtpwd($_POST['email']);
				if($mailExit!=""){
					$alreadyexitid=$mailExit->forget_id;
					$getuserId=$forgetTable->addForgetpwd($alreadyexitid,$_POST['email'],$emailCount->user_id,$token);
				}else{
					$alreadyexitid='';
					$getuserId=$forgetTable->addForgetpwd($alreadyexitid,$_POST['email'],$emailCount->user_id,$token);
				}
				global $forgotPasswordSubject;				
				global $frogotPasswordMessage;
				$frogotPasswordMessage = str_replace("<FULLNAME>","$username", $frogotPasswordMessage);
				$frogotPasswordMessage = str_replace("<PASSWORDLINK>",$baseUrl.$type."newpassword?token=".$token, $frogotPasswordMessage);	
				$to=$emailCount->email;	
				$sentMail=sendMail($to,$forgotPasswordSubject,$frogotPasswordMessage);
				if($sentMail>0){
					return $result = new JsonModel(array(					
						'output' => 'success',
					));	
				}else{
					return $result = new JsonModel(array(	
						'output' => 'server-error',
					));	
				}				
			}else{
				return $result = new JsonModel(array(					
					'output' 	=> 'notsuccess',
				));
			}
		}		
	}
	//public function headerAction view  header page returns view part
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
            $this->userpersonalinfoTable = $sm->get('Users\Model\UserPersonalInfoTableFactory');			
        }
        return $this->userpersonalinfoTable;
    }
	public function getUserDetailsTable()
    {
        if (!$this->userDetailsTable) {				
            $sm = $this->getServiceLocator();
            $this->userDetailsTable = $sm->get('Users\Model\UserDetailsTableFactory');			
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