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
	protected  $userTable;
	public function indexAction()
	{
		
	}
	//public function headerAction view  header page returns view part
	public function loginAction()
    {
		$userInfo["email"] = $_POST['inputEmail'];
		$userInfo["password"] = md5($_POST['password']);
		$userInfo["type_id"] = $_POST['type_id'];
		$userRow = $this->getUserTable()->checkAdminEmailExists( $userInfo )->toArray();
		$user_session = new Container('admininfo');
		if(count($userRow)!=0){
			$user_session->userId=$userRow[0]['user_id'];
			$user_session->email=$userRow[0]['email_id'];
			$user_session->type_id=$userRow[0]['user_type_id'];
			
			return $result = new JsonModel(array(					
				'output' => 'success',
			));
			//return $this->redirect()->toUrl('admin-dashboard.phtml');
		}else{
			return $result = new JsonModel(array(					
				'output' => 'fail',
			));
		}
	}
	public function DashboardAction()
	{
		
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