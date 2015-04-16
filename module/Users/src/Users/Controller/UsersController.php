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
	protected  $CountriesinfoTable;
	protected  $UserTypeTable;
	public function indexAction()
	{
	}
	public function registerAction(){
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];
		
		
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
				//$user_session = new Container('user');
				//$user_session->username=$userDetails->user_name;
				//$user_session->email=$userDetails->email_id;
				//$user_session->user_id=$userDetails->user_id;
				//$user_session->user_type=$userDetails->user_type_id;
				return $result = new JsonModel(array(					
					'output' => 'success',
					'user_id' => $userDetails->user_id,
				));
			}else{
				return $result = new JsonModel(array(					
					'output' => 'not success',
				));
			}
			return $result;
		}	
	}
	public function logoutAction(){	
       unset($_SESSION['user']);
	   unset($_SESSION['usersinfo']);
	   unset($_SESSION['products']);
	   $result = new JsonModel(array(					
			'output' => 'success',
			'success'=>false,
		));
		return $result;
	}
	public function forgetPasswordAction()
	{
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
	public function getUserPersonalInfoTable()
    {
        if (!$this->userpersonalinfoTable) {				
            $sm = $this->getServiceLocator();
            $this->userTable = $sm->get('Users\Model\UserPersonalInfoTableFactory');			
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
}