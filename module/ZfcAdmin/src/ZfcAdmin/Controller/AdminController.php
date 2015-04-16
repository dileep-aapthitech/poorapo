<?php
namespace ZfcAdmin\Controller;
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
class AdminController extends AbstractActionController
{
	public function indexAction()
	{
		
	}
	//public function headerAction view  header page returns view part
	public function loginAction()
    {
		$userInfo["email"] = $_POST['inputEmail'];
		$userInfo["password"] = md5($_POST['password']);
		$userInfo["type_id"] = $_POST['type_id'];
		$userRow = $this->getUserTable()->checkAdminEmailExists( $userInfo )->current();
		$user_session = new Container('admininfo');
		if($userRow!=0){
			$user_session->userId=$userRow->user_id;
			$user_session->email=$userRow->email;
			
			$result = new ViewModel(array(
				'result'  	=> 'success',
			));
			//return $this->redirect()->toUrl('admin-dashboard.phtml');
		}else{
			$result = new ViewModel(array(
				'result'  	=> 'fail',
			));
		}
		return 	$result;
	}
	public function getAdminReportsTable()
    {
        if (!$this->adminReportsTable) {				
            $sm = $this->getServiceLocator();
            $this->adminReportsTable = $sm->get('ZfcAdmin\Model\AdminReportsFactory');			
        }
        return $this->adminReportsTable;
    }
	public function getUserTable()
    {
        if (!$this->userTable) {				
            $sm = $this->getServiceLocator();
            $this->userTable = $sm->get('Users\Model\UserTableFactory');			
        }
        return $this->userTable;
    }
}