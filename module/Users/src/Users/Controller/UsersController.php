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
	protected  $specializationsTable;
	protected  $unversitiesTable;
	protected  $forgotPasswordTable;
	protected  $univcollegesTable;
	protected  $branchesTable;
	protected  $paymentsTable;
	protected  $productsTable;
	protected  $campusesTable;
	protected  $plannedcampusesTable;
	public function indexAction()
	{
	}
	public function aboutThePageAction(){
	
	}
	public function admissionAction(){
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];
		$getUserTypes=$this->getUserTypeTable()->getUserTypes();
		$allProducts=$this->getProductsTable()->getAllProducts();
		$allPlannedCampuses=$this->getPlannedCampusesTable()->getAllPlannedCampuses();
		$allCampuses=$this->getCampusesTable()->getAllCampuses();
		if(isset($_POST['ra2']) && $_POST['ra2']=="2"){
			//Email information
			$subject = 'Meeting requsted';
			$admin_email = "poraapo@poraapo.com";  
			$email       = "poraapo@poraapo.com"; 
			$phone       = $_POST['user_phone_3'];	
  			//send email
			mail($admin_email, "$subject", $phone, "From:" . $email);
			$suc = "success";
			return $this->redirect()->toUrl($baseUrl.'/users/admission?suc='.$suc);
		}else if(isset($_POST['ra2']) && $_POST['ra2']=="0" ){
			$subject = 'Direct Bank Deposit';
			$admin_email = "poraapo@poraapo.com";  
			$email       = "poraapo@poraapo.com"; 
			$message     = $_POST['user_phone_2'].'<br/><br/>';	
			$message     .= $_POST['user_trans'];	
  			//send email
			mail($admin_email, "$subject", $message, "From:" . $email);
			$suc = "success";
			return $this->redirect()->toUrl($baseUrl.'/users/admission?suc='.$suc);
		}else if(isset($_POST['ra2']) && $_POST['ra2']=="1" ){
			if(isset($_POST['user_first_name']) && $_POST['user_first_name']!=''){
				$user_type=$_POST["user_type"];
				$firstname=$_POST["user_first_name"];
				$email=$_POST["user_email"];
				$password=$_POST["user_password"];
				$phone=$_POST["user_phone"];
				$amount=$_POST["amount"];
				$txnid=$_POST["txnid"];
				$prod_id=$_POST["prod_id"];
				$productinfo="Product Information";
				$key="JBZaLc";
				$salt="GQs7yium";
				$hashSeq=$key.'|'.$txnid.'|'.$amount.'|'.$productinfo.'|'.$firstname.'|'.$email.'|||||||||||'.$salt;
				$hash=hash("sha512",$hashSeq);			
				$view=new ViewModel(array(
					'user_type' 		=> 	$user_type,
					'firstname' 		=> 	$firstname,
					'email' 		    => 	$email,
					'password' 		    => 	$password,
					'phone' 		    => 	$phone,
					'amount' 		    => 	$amount,
					'txnid' 		    => 	$txnid,
					'product_id' 		=> 	$prod_id,
					'productinfo' 		=> 	$productinfo,
					'key' 		        => 	$key,
					'salt' 		        => 	$salt,
					'hash' 		        => 	$hash,
					'baseUrl' 			=> $baseUrl,
					'basePath' 			=> $basePath,
				));
				$view->setTerminal(false)
					 ->setTemplate('users/users/payment-summary.phtml');
				return $view;
			}
		}
		return new ViewModel(array(				
			'usertypes' 		=> $getUserTypes,
			'products'          => $allProducts->buffer(),			
			'campuses'          => $allCampuses->buffer(),			
			'plannedCampuses'   => $allPlannedCampuses->buffer(),			
			'baseUrl' 			=> $baseUrl,
			'basePath' 			=> $basePath,
		));
	}
	public function plannedFeeAction(){
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];
		$html = '';
		if(isset($_POST['campuses']) && $_POST['campuses']!=""){
			$prod_id       = $_POST['prog_class'];
			$select_plan = $_POST['radioVal'];
			$campuses    = $_POST['campuses'];
			$class = $_POST['campuses'];
			$getProductInfo = $this->getProductsTable()->getProductD($prod_id);
			if($select_plan == '1'){
				$campusInfo = $this->getCampusesTable()->getCampusInfo($campuses);
				$campus_name = $campusInfo->camp_name;
				$capicity = $campusInfo->camp_capicity;
			}else if($select_plan == '0'){
				$getPlannedCampus=$this->getPlannedCampusesTable()->getPlannedCampusinfo($campuses);
				$campus_name = $getPlannedCampus->loc_city_zone;
				$capicity    = $getPlannedCampus->loc_capicity;
			}else if($select_plan == '2'){
				$campus_name = 'your home';
				$capicity = 1;
			}
			$prodName = explode('-',$getProductInfo->prod_name);
			$className = $prodName['0'];
			$dur_year = $getProductInfo->prod_dur;
			$max_fee = $getProductInfo->prod_max_fee;
			$mini_fee = $getProductInfo->prod_min_fee;
			$timeT0join = $getProductInfo->prod_time_join;
			$currentYear = date("Y");
			$fromTojoin  = ($getProductInfo->prod_time_join)+($currentYear)+1;
			$totalMonthToJoin = ($timeT0join*12)+7;	
			$firstInstallment = round($max_fee/$totalMonthToJoin);	
			$minFee = round(($getProductInfo->prod_cost)/($capicity));			
			$noofInstallment = round($fromTojoin-$currentYear);
			$html = "You are studying in Class $className and you want to join our $dur_year years program in $campus_name.&nbsp;";
			$html .= "Starting from july 01,$fromTojoin.&nbsp;";
			$html .= "Your fee will be as follows:";
			$html .= "<br/><br/><table class='table table-bordered'><thead><th>Max Fees</th><th>Mini Fees</th><th>No.of installment</th><th>Ist installment</th></thead>
					   <tbody><tr><td>Rs. $max_fee.</td><td>Rs. $minFee.</td><td>$totalMonthToJoin</td><td>Rs. $firstInstallment.</td></tr></tbody></table>";
			return $view=new JsonModel(array(
				'pfee' 			       => $html,
				'firstInstallmentfee'  => $firstInstallment,
				'product_id'  => $prod_id,
			));
		}
	}
	public function onlinePaymentsAction(){
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];
		if(isset($_POST['firstname']) && $_POST['firstname']!=''){
			$firstname=$_POST["firstname"];
			$amount=$_POST["amount"];
			$txnid=$_POST["txnid"];
			$email=$_POST["email"];
			$phone=$_POST["phone"];
			$productinfo="Product Information";
			$key="JBZaLc";
			$salt="GQs7yium";
			$hashSeq=$key.'|'.$txnid.'|'.$amount.'|'.$productinfo.'|'.$firstname.'|'.$email.'|||||||||||'.$salt;
			$hash=hash("sha512",$hashSeq);			
			$view=new ViewModel(array(
				'firstname' 		=> 	$firstname,
				'amount' 		    => 	$amount,
				'txnid' 		    => 	$txnid,
				'email' 		    => 	$email,
				'phone' 		    => 	$phone,
				'productinfo' 		=> 	$productinfo,
				'key' 		        => 	$key,
				'salt' 		        => 	$salt,
				'hash' 		        => 	$hash,
				'baseUrl' 			=> $baseUrl,
				'basePath' 			=> $basePath,
			));
			$view->setTerminal(false)
				 ->setTemplate('users/users/payment-summery.phtml');
			return $view;
		}		
	}
	public function addUserPaymentAction(){
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];
		if(isset($_POST['user_first_name']) && $_POST['user_first_name']!=''){
			$status='Pending';
			$user_type=$_POST["user_type"];
			$firstname=$_POST["user_first_name"];
			$email=$_POST["user_email"];
			$password=$_POST["user_password"];
			$phone=$_POST["phone"];
			$amount=$_POST["amount"];
			$product_id=$_POST["product_id"];
			$txnid=$_POST["txnid"];
			$user_id=$this->getUserTable()->addUser($_POST,$_POST['hid_user_id']='');
			if($user_id!=0){			
				$addPayment=$this->getPaymentsTable()->addPayment($user_id,$product_id,$txnid,$amount,$status);
				if($addPayment>=0){
					return $view=new JsonModel(array(
						'output' 		        => 	'success',
						'baseUrl' 			=> $baseUrl,
						'basePath' 			=> $basePath,
						'user_id' 			=> $user_id
					));
				}
			}
		}		
	}
	public function successPaymentAction(){ 
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];
		if(isset($_POST['status']) && $_POST['status']!=''){
			$status=$_POST["status"];
			$firstname=$_POST["firstname"];
			$amount=$_POST["amount"];
			$txnid=$_POST["txnid"];
			$posted_hash=$_POST["hash"];
			$key=$_POST["key"];
			$productinfo=$_POST["productinfo"];
			$email=$_POST["email"];
			$salt="GQs7yium";
			$user_id=$_POST["user_id"];
			$userDetails = $usersTable->getUser($user_id);
			if($userDetails!=''){						
				$base_user_id =  base64_encode($userDetails->user_id);
				include('public/PHPMailer_5.2.4/sendmail.php');	
				$suc = 'reg';
				global $regSubject;				
				global $regMessage;
				$username = $userDetails->user_name;
				$to=$userDetails->email_id;
				$regMessage = str_replace("<FULLNAME>","$username", $regMessage);
				if(isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST']=='poraapo.com'){
					$regMessage = str_replace("<ACTIVATIONLINK>","http://" . $_SERVER['HTTP_HOST']."/users/reg-authentication?uid=".$base_user_id, $regMessage);
				}else{
					$regMessage = str_replace("<ACTIVATIONLINK>",$baseUrl."/users/reg-authentication?uid=".$base_user_id, $regMessage);
				}
				sendMail($to,$regSubject,$regMessage);					
			}
			$updateStatusPayment=$this->getPaymentsTable()->statusUpdate($status,$txnid);
			if(isset($_POST["additionalCharges"])){
				$additionalCharges=$_POST["additionalCharges"];
				$retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;		
			}else{	  
				$retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
			}
			$hash = hash("sha512", $retHashSeq);
				
			if ($hash != $posted_hash) {
			   $errorInvalid = "Invalid Transaction. Please try again";
			   return $result = new ViewModel(array(					
					'output' 		=> 'not-success',
					'errorInvalid'	=>	$errorInvalid,
					'success'		=>	false,
					'baseUrl' 			=> $baseUrl,
					'basePath' 			=> $basePath
				));	
			}else {	
				return $result = new ViewModel(array(					
					'output' 		=> 'success',
					'firstname'		=>	$firstname,
					'status'	    =>	$status,
					'txnid'	        =>	$txnid,
					'amount'	    =>	$amount,
					'success'		=>	true,
					'baseUrl' 	    =>  $baseUrl,
					'basePath' 		=>  $basePath
				));	
			}			
		}		
	}
	public function failurePaymentAction(){ 
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];
		if(isset($_POST['status']) && $_POST['status']!=''){
			$status=$_POST["status"];
			$firstname=$_POST["firstname"];
			$amount=$_POST["amount"];
			$txnid=$_POST["txnid"];
			$posted_hash=$_POST["hash"];
			$key=$_POST["key"];
			$productinfo=$_POST["productinfo"];
			$email=$_POST["email"];
			$salt="GQs7yium";
			$user_id=$_POST["user_id"];
			$usersTable=$this->getUserTable();
			$userDetails = $usersTable->getUser($user_id);
			if($userDetails!=''){						
				$base_user_id =  base64_encode($userDetails->user_id);
				include('public/PHPMailer_5.2.4/sendmail.php');	
				$suc = 'reg';
				global $regSubject;				
				global $regMessage;
				$username = $userDetails->user_name;
				$to=$userDetails->email_id;
				$regMessage = str_replace("<FULLNAME>","$username", $regMessage);
				if(isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST']=='poraapo.com'){
					$regMessage = str_replace("<ACTIVATIONLINK>","http://" . $_SERVER['HTTP_HOST']."/users/reg-authentication?uid=".$base_user_id, $regMessage);
				}else{
					$regMessage = str_replace("<ACTIVATIONLINK>",$baseUrl."/users/reg-authentication?uid=".$base_user_id, $regMessage);
				}
				sendMail($to,$regSubject,$regMessage);					
			}
			$updateStatusPayment=$this->getPaymentsTable()->statusUpdate($status,$txnid);
			if(isset($_POST["additionalCharges"])){
				$additionalCharges=$_POST["additionalCharges"];
				$retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;		
			}else{	  
				$retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
			}
			$hash = hash("sha512", $retHashSeq);
				
			if ($hash != $posted_hash) {
			   $errorInvalid = "Invalid Transaction. Please try again";
			   return $result = new ViewModel(array(					
					'output' 		=> 'not-success',
					'errorInvalid'	=>	$errorInvalid,
					'success'		=>	false,
					'baseUrl' 			=> $baseUrl,
					'basePath' 			=> $basePath
				));	
			}else {	
				return $result = new ViewModel(array(					
					'output' 		=> 'success',
					'firstname'		=>	$firstname,
					'status'	    =>	$status,
					'txnid'	        =>	$txnid,
					'amount'	    =>	$amount,
					'success'		=>	true,
					'baseUrl' 			=> $baseUrl,
					'basePath' 			=> $basePath
				));	
			}			
		}		
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
			$getSpecializations=$this->getSpecializationsTable()->getSpecializations();
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
					'specializations'   => $getSpecializations->buffer(),			
					'unversities'       => $getUnversities->buffer(),			
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
		$id_countries_birth = '';
		$id_countries_job = '';
		$id_countries_school = '';
		$id_countries_bachelors = '';
		$id_countries_masters = '';
		$id_countries_phd = '';
		$stateId = '';
		$districtId = '';
		$jCollId = '';
		$entranceExam1 = '';
		$entranceExam2 = '';
		$entranceExam3 = '';
		$b_u = '';
		$b_c = '';
		$b_b = '';
		$m_u = '';
		$m_c = '';
		$d_u = '';
		$d_c = '';
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
				if($states->state_id!=''){
					$stateId =$states->state_id;
				}else{
					$stateId ='';
				}
			}
			if( isset($_POST['user_district']) && trim($_POST['user_district'])!='' )
			{
				$districtId=$this->getDistrictsTable()->getDistrictIdByName(trim($_POST['user_district']));				
				if($districtId!=''){
					$districtId = $districtId;
				}else{
					$districtId ='';
				}
			}
			
			if( isset($_POST['user_colleges']) && trim($_POST['user_colleges'])!='' )
			{
				$jCollId=$this->getCollegeTable()->getJCollIdByName(trim($_POST['user_colleges']));
				if($jCollId!=''){
					$jCollId = $jCollId;
				}else{
					$jCollId ='';
				}
			}
			if(isset($_POST['user_entrance_exam_1']) && $_POST['user_entrance_exam_1']!=''){
				$entranceExam1 = $this->getEntranceExamsTable()->getEntranceExamIdByName(trim($_POST['user_entrance_exam_1']));	
					if($entranceExam1!=''){
						$entranceExam1 =$entranceExam1;
					}else{
						$entranceExam1 ='';
					}			
			}
			if(isset($_POST['user_entrance_exam_2']) && $_POST['user_entrance_exam_2']!=''){
				$entranceExam2 = $this->getEntranceExamsTable()->getEntranceExamIdByName(trim($_POST['user_entrance_exam_2']));	
				if($entranceExam2!=''){
					$entranceExam2 = $entranceExam2;
				}else{
					$entranceExam2 ='';
				}			
			}
			if(isset($_POST['user_entrance_exam_3']) && $_POST['user_entrance_exam_3']!=''){
				$entranceExam3 = $this->getEntranceExamsTable()->getEntranceExamIdByName(trim($_POST['user_entrance_exam_3']));
				if($entranceExam3!=''){
					$entranceExam3 = $entranceExam3;
				}else{
					$entranceExam3 ='';
				}
			}
			if(isset($_POST['user_bac_unversity']) && $_POST['user_bac_unversity']!=''){
				$b_u = $this->getUnversitiesTable()->getUniversityIdByName(trim($_POST['user_bac_unversity']));	
				if($b_u!=''){
					$b_u = $b_u;
				}else{
					$b_u ='';
				}
			}
			if(isset($_POST['user_bac_college']) && $_POST['user_bac_college']!=''){
				$b_c = $this->getUnivCollegesTable()->getUnivCollegeIdByName(trim($_POST['user_bac_college']));
				if($b_c!=''){
					$b_c = $b_c;
				}else{
					$b_c ='';
				}
			}
			if(isset($_POST['user_bac_branch']) && $_POST['user_bac_branch']!=''){
				$b_b = $this->getBranchesTable()->getBranchIdByName(trim($_POST['user_bac_branch']));
				if($b_b!=''){
					$b_b = $b_b;
				}else{
					$b_b ='';
				}
			}
			if(isset($_POST['user_mast_university']) && $_POST['user_mast_university']!=''){
				$m_u = $this->getUnversitiesTable()->getUniversityIdByName(trim($_POST['user_mast_university']));	
				if($m_u!=''){
					$m_u = $m_u;
				}else{
					$m_u ='';
				}
			}
			if(isset($_POST['user_mast_college']) && $_POST['user_mast_college']!=''){
				$m_c = $this->getUnivCollegesTable()->getUnivCollegeIdByName(trim($_POST['user_mast_college']));
				if($m_c!=''){
					$m_c = $m_c;
				}else{
					$m_c ='';
				}
			}
			if(isset($_POST['user_doctor_university']) && $_POST['user_doctor_university']!=''){
				$d_u = $this->getUnversitiesTable()->getUniversityIdByName(trim($_POST['user_mast_university']));	
				if($d_u!=''){
					$d_u = $d_u;
				}else{
					$d_u ='';
				}
			}
			if(isset($_POST['user_doctor_college']) && $_POST['user_doctor_college']!=''){
				$d_c = $this->getUnivCollegesTable()->getUnivCollegeIdByName(trim($_POST['user_doctor_college']));
				if($d_c!=''){
					$d_c = $d_c;
				}else{
					$d_c ='';
				}
			}
			$base_user_id =  base64_encode($_POST['hid_user_id']);
			$user_id=$this->getUserTable()->addUser($_POST,$_POST['hid_user_id']);
			$_SESSION['user']['username']=$_POST['user_first_name'];
			$suc = 'udt';
			if($user_id>=0){
				$userpersonalInfo = $this->getUserPersonalInfoTable()->addPersonalInfo($_POST,$_POST['hid_user_id'],$id_countries_birth,$id_countries_job,$stateId,$districtId);
				if($userpersonalInfo>=0){
					$userDetailsInfo  = $this->getUserDetailsTable()->addDetails($_POST,$_POST['hid_user_id'],$id_countries_school,$jCollId,$id_countries_bachelors,$id_countries_masters,$id_countries_phd,$entranceExam1,$entranceExam2,$entranceExam3,$b_u,$b_c,$m_u,$m_c,$d_u,$d_c,$b_b);					
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
				if($states->state_id!=''){
					$stateId =$states->state_id;
				}else{
					$stateId ='';
				}
			}
			if( isset($_POST['user_district']) && trim($_POST['user_district'])!='' )
			{
				$districtId=$this->getDistrictsTable()->getDistrictIdByName(trim($_POST['user_district']));				
				if($districtId!=''){
					$districtId = $districtId;
				}else{
					$districtId ='';
				}
			}
			
			if( isset($_POST['user_colleges']) && trim($_POST['user_colleges'])!='' )
			{
				$jCollId=$this->getCollegeTable()->getJCollIdByName(trim($_POST['user_colleges']));
				if($jCollId!=''){
					$jCollId = $jCollId;
				}else{
					$jCollId ='';
				}
			}
			if(isset($_POST['user_entrance_exam_1']) && $_POST['user_entrance_exam_1']!=''){
				$entranceExam1 = $this->getEntranceExamsTable()->getEntranceExamIdByName(trim($_POST['user_entrance_exam_1']));	
					if($entranceExam1!=''){
						$entranceExam1 =$entranceExam1;
					}else{
						$entranceExam1 ='';
					}			
			}
			if(isset($_POST['user_entrance_exam_2']) && $_POST['user_entrance_exam_2']!=''){
				$entranceExam2 = $this->getEntranceExamsTable()->getEntranceExamIdByName(trim($_POST['user_entrance_exam_2']));	
				if($entranceExam2!=''){
					$entranceExam2 = $entranceExam2;
				}else{
					$entranceExam2 ='';
				}			
			}
			if(isset($_POST['user_entrance_exam_3']) && $_POST['user_entrance_exam_3']!=''){
				$entranceExam3 = $this->getEntranceExamsTable()->getEntranceExamIdByName(trim($_POST['user_entrance_exam_3']));
				if($entranceExam3!=''){
					$entranceExam3 = $entranceExam3;
				}else{
					$entranceExam3 ='';
				}
			}
			if(isset($_POST['user_bac_unversity']) && $_POST['user_bac_unversity']!=''){
				$b_u = $this->getUnversitiesTable()->getUniversityIdByName(trim($_POST['user_bac_unversity']));	
				if($b_u!=''){
					$b_u = $b_u;
				}else{
					$b_u ='';
				}
			}
			if(isset($_POST['user_bac_college']) && $_POST['user_bac_college']!=''){
				$b_c = $this->getUnivCollegesTable()->getUnivCollegeIdByName(trim($_POST['user_bac_college']));
				if($b_c!=''){
					$b_c = $b_c;
				}else{
					$b_c ='';
				}
			}
			if(isset($_POST['user_bac_branch']) && $_POST['user_bac_branch']!=''){
				$b_b = $this->getBranchesTable()->getBranchIdByName(trim($_POST['user_bac_branch']));
				if($b_b!=''){
					$b_b = $b_b;
				}else{
					$b_b ='';
				}
			}
			if(isset($_POST['user_mast_university']) && $_POST['user_mast_university']!=''){
				$m_u = $this->getUnversitiesTable()->getUniversityIdByName(trim($_POST['user_mast_university']));	
				if($m_u!=''){
					$m_u = $m_u;
				}else{
					$m_u ='';
				}
			}
			if(isset($_POST['user_mast_college']) && $_POST['user_mast_college']!=''){
				$m_c = $this->getUnivCollegesTable()->getUnivCollegeIdByName(trim($_POST['user_mast_college']));
				if($m_c!=''){
					$m_c = $m_c;
				}else{
					$m_c ='';
				}
			}
			if(isset($_POST['user_doctor_university']) && $_POST['user_doctor_university']!=''){
				$d_u = $this->getUnversitiesTable()->getUniversityIdByName(trim($_POST['user_mast_university']));	
				if($d_u!=''){
					$d_u = $d_u;
				}else{
					$d_u ='';
				}
			}
			if(isset($_POST['user_doctor_college']) && $_POST['user_doctor_college']!=''){
				$d_c = $this->getUnivCollegesTable()->getUnivCollegeIdByName(trim($_POST['user_doctor_college']));
				if($d_c!=''){
					$d_c = $d_c;
				}else{
					$d_c ='';
				}
			}
			$user_id=$this->getUserTable()->addUser($_POST,$_POST['hid_user_id']='');
			if($user_id!=0){
				$userpersonalInfo = $this->getUserPersonalInfoTable()->addPersonalInfo($_POST,$user_id,$id_countries_birth,$id_countries_job,$stateId,$districtId);
				if($userpersonalInfo!=0){
					$userDetailsInfo  = $this->getUserDetailsTable()->addDetails($_POST,$user_id,$id_countries_school,$jCollId,$id_countries_bachelors,$id_countries_masters,$id_countries_phd,$entranceExam1,$entranceExam2,$entranceExam3,$b_u,$b_c,$m_u,$m_c,$d_u,$d_c,$b_b);					
					if($userDetailsInfo!=0){
						$usersTable=$this->getUserTable();
						$userDetails = $usersTable->getUser($user_id);
						if($userDetails!=''){						
							$base_user_id =  base64_encode($userDetails->user_id);
							include('public/PHPMailer_5.2.4/sendmail.php');	
							$suc = 'reg';
							global $regSubject;				
							global $regMessage;
							$username = $userDetails->user_name;
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
			$getSpecializations=$this->getSpecializationsTable()->getSpecializations();
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
					'specializations'   => $getSpecializations->buffer(),			
					'unversities'       => $getUnversities->buffer(),			
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
			$getSpecializations=$this->getSpecializationsTable()->getSpecializations();
			$getUnversities=$this->getUnversitiesTable()->getUnversities();
			$allProducts=$this->getProductsTable()->getAllProducts();
			$allPlannedCampuses=$this->getPlannedCampusesTable()->getAllPlannedCampuses();
			$allCampuses=$this->getCampusesTable()->getAllCampuses();
			return new ViewModel(array(				
				'usertypes' 		=> $getUserTypes,
				'countries' 		=> $getCountries,
				'states' 		    => $getStates,
				'districts' 		=> $getDistricts,
				'colleges' 		    => $getColleges->buffer(),
				'entranceexams'     => $getEntranceExams->buffer(),			
				'specializations'   => $getSpecializations->buffer(),			
				'unversities'       => $getUnversities->buffer(),			
				'products'          => $allProducts->buffer(),			
				'campuses'          => $allCampuses->buffer(),			
				'plannedCampuses'   => $allPlannedCampuses->buffer(),			
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
			$userName=ucfirst($userDetails->user_name);
			$user_session = new Container('user');
			$user_session->username=$userDetails->user_name;
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
			$userDetailss = $usersTable->checkEmailExists($_POST);
			$user_id=$userDetailss->user_id;
			$userDetails = $usersTable->checkUserStatus($user_id);
			if($userDetails!=''){
				$user_session = new Container('user');
				$user_session->username=$userDetails->user_name;
				$user_session->email=$userDetails->email_id;
				$user_session->user_id=$user_id;
				$user_session->user_type=$userDetails->user_type_id;
				$result = new JsonModel(array(					
					'output' => 'success',
					'user_id' => json_decode($user_id),
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
			}$result = new JsonModel(array(					
				'searchHashNames' => $combined,
				'success'=>true,
			));			
		}else{
			$result = new JsonModel(array(					
				'searchHashNames' => [],
				'success'=>true,
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
			$result = new JsonModel(array(					
				'searchHashNames' => $combined,
				'success'=>true,
			));			
		}else{
			$result = new JsonModel(array(					
				'searchHashNames' => [],
				'success'=>true,
			));			
		}
		return $result;
	}
	public function getStatesAction(){
		$list_countries='';
		$hashNames="";
		$hashNameIds="";
		$count="";
		if(isset($_POST['value']) && $_POST['value']!=''){
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
		}else{
			$result = new JsonModel(array(					
				'searchHashNames' => [],
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
			if(isset($_POST['value']) && $_POST['value']!=''){
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
			}else{
				$result = new JsonModel(array(					
					'searchHashNames' => [],
					'success'=>true,
				));			
				return $result;
			}
		}else{
			$result = new JsonModel(array(					
				'searchHashNames' => [],
				'success'=>true,
			));			
			return $result;
		}
	}
	public function getSchoolsAction(){
		$list_countries='';
		$hashNames="";
		$hashNameIds="";
		$count="";
		$combined = array();
		if(isset($_POST['dist_name']) && $_POST['dist_name']!=""){ 
			if(isset($_POST['value']) && $_POST['value']!=""){ 
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
			}else{
				$result = new JsonModel(array(					
					'searchHashNames' => [],
					'success'=>true,
				));			
				return $result;
			}
		}else{
			$result = new JsonModel(array(					
				'searchHashNames' => [],
				'success'=>true,
			));			
			return $result;
		}
	}
	public function getBachelorsUniversityAction(){
		$list_countries='';
		$hashNames="";
		$hashNameIds="";
		$count="";
		if(isset($_POST['spec_id']) && $_POST['spec_id']!=''){
			if(isset($_POST['value']) && $_POST['value']!=''){
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
			}else{
				$result = new JsonModel(array(					
					'searchHashNames' => [],
					'success'=>true,
				));			
				return $result;
			}	
		}else{
			$result = new JsonModel(array(					
				'searchHashNames' => [],
				'success'=>true,
			));			
			return $result;
		}
	}
	public function getBachelorsCollegesAction(){
		$list_countries='';
		$hashNames="";
		$hashNameIds="";
		$count="";
		if(isset($_POST['univ_name']) && $_POST['univ_name']!=''){
			if(isset($_POST['value']) && $_POST['value']!=''){
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
			}else{
				$result = new JsonModel(array(					
					'searchHashNames' => [],
					'success'=>true,
				));			
				return $result;
			}
		}else{
			$result = new JsonModel(array(					
				'searchHashNames' => [],
				'success'=>true,
			));			
			return $result;
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
		}else{
			$result = new JsonModel(array(					
				'searchHashNames' => [],
				'success'=>true,
			));			
			return $result;
		}
	}
	public function getBranchesAction(){
		$list_branch='';
		$hashNames="";
		$hashNameIds="";
		$count="";
		if(isset($_POST['value']) && $_POST['value']!=''){					
			$getBranches = $this->getBranchesTable()->getBranches($_POST['value']);
			foreach($getBranches as $key=>$search){
				$list_branch[$key]=$search->branch_name;
				$hashNameIds[$key]=$key;
				$count=$key;				
			}
			$combined = array();
			if($list_branch!=''){				
				foreach($list_branch as $index => $refNumber) {			
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
		}else{
			$result = new JsonModel(array(					
				'searchHashNames' => [],
				'success'=>true,
			));			
			return $result;
		}
	
	}
	public function crontosendmailsAction(){
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];
		$providerUsers = $this->getUserTable()->getProviderUsers();	
		$listOfUsers = '';	
		$id = array();
		include('public/PHPMailer_5.2.4/sendmail.php');	
		global $activeUserSubject;				
		global $activeUsersMessage;
		if(count($providerUsers)!=""){
			foreach($providerUsers as $users){
				$listOfUsers = $users;
			}
			$user_id = $listOfUsers->user_id;
			$pwd = getUniqueCode('7');
			$updateresult = $this->getUserTable()->toInsertPassword($user_id,$pwd);	
			$base_user_id = base64_encode($user_id);
			if($listOfUsers->user_name!=""){
				$username = $listOfUsers->user_name;
			}else{
				$username = 'New User';
			}
			$emailId = $listOfUsers->email_id;
			$to = $listOfUsers->email_id;
			$password = $pwd;
			$activeUsersMessage = str_replace("<FULLNAME>","$username", $activeUsersMessage);
			if(isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST']=='poraapo.com'){
				$activeUsersMessage = str_replace("<ACTIVATIONLINK>","http://" . $_SERVER['HTTP_HOST']."/users/reg-authentication?uid=".$base_user_id, $activeUsersMessage);
				$activeUsersMessage = str_replace("<EMAILID>","$emailId", $activeUsersMessage);
				$activeUsersMessage = str_replace("<PASSWORD>","$password", $activeUsersMessage);
			}else{
				$activeUsersMessage = str_replace("<ACTIVATIONLINK>",$baseUrl."/users/reg-authentication?uid=".$base_user_id, $activeUsersMessage);
				$activeUsersMessage = str_replace("<EMAILID>","$emailId", $activeUsersMessage);
				$activeUsersMessage = str_replace("<PASSWORD>","$password", $activeUsersMessage);
			}	
			if(sendMail($to,$activeUserSubject,$activeUsersMessage))
			{
				$id[] = $user_id;
			}	
			if(count($id)){
				$update_status = $this->getUserTable()->sentMailToProvUsers($id);	
			}
			echo "SuccessFull Sent....";exit;
		}else{
			echo "Thanks"; exit;
		}
	}
	public function providerUsersAction(){
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];
		$view= new ViewModel(array(
			'basePath'=>$basePath,
		));
		return $view;
	}
	public function getProviderUsersAction(){
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];
		if(isset($_GET['uid']) && $_GET['uid']!=''){
			$providerUsers = $this->getUserTable()->providerUsers($_GET['uid']);
			$data = array();
			$i=0;
			if(isset($providerUsers) && $providerUsers->count()!=0){
			 $catTypeName="";
				foreach($providerUsers as $key=>$users){
					$id=$users->user_id;
					if($users->last_name!=""){
						$last_name = $users->last_name;
					}else{
						$last_name ='';
					}
					$data[$i]['sno']= $i+1;
					$data[$i]['user_name']= $users->user_name;
					$data[$i]['last_name']= $last_name;
					$data[$i]['user_email']= $users->email_id;
					$data[$i]['action'] ='#';
					$i++;
				}
				$data['aaData'] = $data;
				echo json_encode($data['aaData']); exit;
			}else{
				echo '1'; exit;
			}	
		}else{
			echo '1'; exit;
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
	public function getSpecializationsTable()
    {
        if (!$this->specializationsTable) {		
            $sm = $this->getServiceLocator();
            $this->specializationsTable = $sm->get('Users\Model\SpecializationFactory');			
        }
        return $this->specializationsTable;
    }	
	public function getUnversitiesTable()
    {
        if (!$this->unversitiesTable) {		
            $sm = $this->getServiceLocator();
            $this->unversitiesTable = $sm->get('Users\Model\UniversitiesFactory');			
        }
        return $this->unversitiesTable;
    }
	public function getBranchesTable()
    {
        if (!$this->branchesTable) {		
            $sm = $this->getServiceLocator();
            $this->branchesTable = $sm->get('Users\Model\BranchesFactory');			
        }
        return $this->branchesTable;
    }
	public function getPaymentsTable()
    {
        if (!$this->paymentsTable) {		
            $sm = $this->getServiceLocator();
            $this->paymentsTable = $sm->get('Users\Model\PaymentFactory');			
        }
        return $this->paymentsTable;
    }
	public function getProductsTable()
    {
        if (!$this->productsTable) {		
            $sm = $this->getServiceLocator();
            $this->productsTable = $sm->get('Users\Model\ProductsFactory');			
        }
        return $this->productsTable;
    }
	public function getCampusesTable()
    {
        if (!$this->campusesTable) {		
            $sm = $this->getServiceLocator();
            $this->campusesTable = $sm->get('Users\Model\CampusesFactory');			
        }
        return $this->campusesTable;
    }
	public function getPlannedCampusesTable()
    {
        if (!$this->plannedcampusesTable) {		
            $sm = $this->getServiceLocator();
            $this->plannedcampusesTable = $sm->get('Users\Model\LocationsFactory');			
        }
        return $this->plannedcampusesTable;
    }
}