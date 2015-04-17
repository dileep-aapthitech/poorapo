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
	protected  $categoriesTable;
	public function indexAction()
	{
		
	}
	//public function headerAction view  header page returns view part
	public function loginAction()
    {
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];
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
	public function dashBoardAction()
	{
		
	}
	public function addIssueAction()
	{
		$getCategories=$this->getCategoryTable()->getCategories();
		$baseUrls 	= $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl 	= $baseUrlArr['baseUrl'];
		$basePath 	= $baseUrlArr['basePath'];
		if($_POST){
			if($_POST['hidbutton_value']==0){
				$addIssue = $this->getIssuesTable()->addIssue($_POST);
				return $this->redirect()->toUrl($basePath .'/admin/issues');
			}else{
				$updateIssue = $this->getIssuesTable()->updateIssue($_POST);
				return $this->redirect()->toUrl($basePath .'/admin/issues');
			}
		}else if(isset($_GET['ediid'])!=""){
			$getCategories=$this->getCategoryTable()->getCategories();
			$editIssue = $this->getIssuesTable()->editIssue($_GET['ediid']);
			return  $result = new ViewModel(array(					
				'basepath' 		=> $basePath ,
				'edit_issue'	=> $editIssue->toArray(),
				'categories'	=> $getCategories->toArray(),
			));
		}else{
			return  $result = new ViewModel(array(					
				'basepath' 		=> $basePath ,
				'categories'	=> $getCategories->toArray(),
			));
		}
	}
	public function issuesAction()
	{
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];
		if(isset($_GET['delid'])){
			$deleteissue=$this->getIssuesTable()->deleteIssue($_GET['delid']);
			return $this->redirect()->toUrl($basePath .'/admin/issues');
		}
	}
	public function issuesAjaxAction()
	{
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];
		$getIssues = $this->getIssuesTable()->getIssues();
		$data = array();$i=0;
		if(isset($getIssues) && $getIssues->count()!=0){
			foreach($getIssues as $issues){
                $id=$issues->issue_id;
				$data[$i]['sno']=$i+1;
				$data[$i]['issue_title']= $issues->issue_title;
				$data[$i]['issue_decription']= $issues->issue_decription;
				$data[$i]['action'] ='<a href="javascript:void(0)" onclick="editIssue('.$id.')" >EDIT</a>&nbsp;/&nbsp;<a href="javascript:void(0);" onClick="deleteIssue('.$id.')">Delete</a>';
				$i++;
			}
			$data['aaData'] = $data;
			echo json_encode($data['aaData']); exit;
		}else{
			echo '1'; exit;
		}
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
   
   public function getCategoryTable()
    {
        if (!$this->categoriesTable) {				
            $sm = $this->getServiceLocator();
            $this->categoriesTable = $sm->get('Application\Model\CategoryFactory');			
        }
        return $this->categoriesTable;
    }
}