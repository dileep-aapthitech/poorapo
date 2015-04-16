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
	protected  $issuesTable;
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
	public function IssuesAction()
	{
		
		/*$getIssues = $this->getIssuesTable()->getIssues();
		$data = array();$i=0;
		if(isset($getallcategories) && $getallcategories!=''){
			foreach($getallcategories as $categories){
                $id=$categories->category_id;
				$data[$i]['sno']=$i+1;
				$data[$i]['category_name']= $categories->category_name;
				$data[$i]['action'] ='<a style="color: #000000;font-size: 15px;" href="'.$baseUrl.'/products/add-category?cat_id='.$id.'"><img src="'.$basepath.'/images/edit.png" title="Edit"></a>&nbsp;/&nbsp;<a style="color: #000000;font-size: 15px;" href="javascript:void(0);" onClick="deleteCategory('.$id.')"><img src="'.$basepath.'/images/delete.png" title="Delete"></a>';
				$i++;
			}
		}
		$data['aaData'] = $data;
		print_r(json_encode($data['aaData']));exit;*/
	}
	public function getUserTable()
    {
        if (!$this->userTable) {				
            $sm = $this->getServiceLocator();
            $this->userTable = $sm->get('Users\Model\UserTableFactory');			
        }
        return $this->userTable;
    }
	public function getIssuesTable()
    {
       if (!$this->issuesTable) {                                
           $sm = $this->getServiceLocator();
           $this->issuesTable = $sm->get('ZfcAdmin\Model\IssuesFactory');                        
       }
       return $this->issuesTable;
   }
}