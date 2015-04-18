<?php
namespace Application\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;
use Zend\View\Model\JsonModel;
class IndexController extends AbstractActionController
{
	protected  $categoriesTable;
	protected  $categoryTypesTable;
	protected  $issuesTable;
	protected  $likeTable;
	protected  $shareTable;
	
    public function indexAction()
    {
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];

		$categoryId = 0;
		if($this->params()->fromRoute('id', 0)!="")
		{
			$params=$this->params()->fromRoute('id', 0);
			$paramss=explode("-",$params);
			$paramssCount = count($paramss);
			$catIdPortion = $paramssCount-1;
			if( isset($paramss[$catIdPortion]) && $paramss[$catIdPortion] != "" )
			{
				$categoryId=$paramss[$catIdPortion];
			}
		}
		
		$menuIssuesArr = $this->getIssuesTable()->getAllMenuIssues( $categoryId )->toArray();
		//echo "<pre>";print_r($menuIssuesArr);exit;
		$viewModel = new ViewModel(
			array(
				'baseUrl'				 	=> $baseUrl,
				'basePath' 					=> $basePath,
				'menuIssuesArr' 			=> $menuIssuesArr
		));
		return $viewModel;
    }	
	public function headerAction($params)
    {
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];
		
		$footer = "";
		$footerArr = $this->getIssuesTable()->getFooterHtml()->toArray();
		if( isset($footerArr) && count($footerArr) > 0  && isset($footerArr[0])  && isset($footerArr[0]['issue_decription']) )
		{
			$footer = $footerArr[0]['issue_decription'];
		}
		
		
		return $this->layout()->setVariable(
			"headerarray",array(
				'baseUrl' 		=> 	$baseUrl,
				'basePath'		=>	$basePath,
				'footer'		=>	$footer,
			)
		);
	}
	public function supplyHeaderCategoriesAction($params)
    {
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];	

		$categoriesArr = $this->getCategoryTable()->getAllMenuCategories()->toArray();
		
		return $this->layout()->setVariable(
			"catsInfoarray",array(
				'categoriesArr' => 	$categoriesArr
			)
		);
	}
	public function likeUnlikeAction()
    {
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];	

		$getIssuesTable = $this->getIssuesTable()->updateTotalLikes($_POST);
		$getlikeTable = $this->getLikeTable()->checkUserLikesExits($_POST)->toArray();
		if(count($getlikeTable)!=0){
			$addLikeTable = $this->getLikeTable()->updateLikedDetails($_POST,$getlikeTable[0]['liked_id']);
		}else{
			$addLikeTable = $this->getLikeTable()->addlikesDetails($_POST);
		}
		$viewModel = new JsonModel(
		array(
			'output'  => 1	
		));
		return $viewModel;
	}
	
	public function shareAction()
    {
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];
		$getIssuesTable = $this->getIssuesTable()->updateTotalShares($_POST);
		$getShareTable = $this->getShareTable()->addShareMsg($_POST);
		include('public/PHPMailer_5.2.4/sendmail.php');	
		global $sentShareMsgSubject;				
		global $sentShareMessage;
		$message=$_POST['message'];
		$to=$_POST['sendMail'];
		$getIssuesDetails = $this->getIssuesTable()->editIssue($_POST['issue_id'])->current();
		$title=$getIssuesDetails->issue_title;
		$description=$getIssuesDetails->issue_decription;
		$categoryName=$getIssuesDetails->category_name;
		$sentShareMessage = str_replace("<MESSAGE>","$message", $sentShareMessage);
		$sentShareMessage = str_replace("<TITLE>","$title", $sentShareMessage);
		$sentShareMessage = str_replace("<CATEGORYNAME>","$categoryName", $sentShareMessage);
		$sentShareMessage = str_replace("<DESCRIPTION>","$description", $sentShareMessage);
		if(sendMail($to,$sentShareMsgSubject,$sentShareMessage)){
				$result = new JsonModel(
				array(
				'output'  => 1	
				));	
		}else{
			$result = new JsonModel(
				array(
				'output'  => 0	
				));	
		}
		return $result;
	}
	
	public function cmsAction()
	{
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];
		
		$issueId = 0;
		if($this->params()->fromRoute('id', 0)!="")
		{
			$params=$this->params()->fromRoute('id', 0);
			$paramss=explode("-",$params);
			$paramssCount = count($paramss);
			$issueIdPortion = $paramssCount-1;
			if( isset($paramss[$issueIdPortion]) && $paramss[$issueIdPortion] != "" )
			{
				$issueId=$paramss[$issueIdPortion];
			}
		}
		
		$cmsPageHtml = "";
		$cmsPageArr = $this->getIssuesTable()->getCmsPageHtml( $issueId )->toArray();
		if( isset($cmsPageArr) && count($cmsPageArr) > 0  && isset($cmsPageArr[0])  && isset($cmsPageArr[0]['issue_decription']) )
		{
			$cmsPageHtml = $cmsPageArr[0]['issue_decription'];
			// echo "<pre>";print_r($cmsPageHtml);exit;
		}

		$viewModel = new ViewModel(
			array(
				'baseUrl'				=> $baseUrl,
				'basePath' 				=> $basePath,
				'cmsPageHtml'		 	=> $cmsPageHtml
		));
		return $viewModel;
	}

	public function getCategoryTypesTable()
    {
        if (!$this->categoryTypesTable) {				
            $sm = $this->getServiceLocator();
            $this->categoryTypesTable = $sm->get('Application\Model\CategoryTypesFactory');			
        }
        return $this->categoryTypesTable;
    }
	
	public function getCategoryTable()
    {
        if (!$this->categoriesTable) {				
            $sm = $this->getServiceLocator();
            $this->categoriesTable = $sm->get('Application\Model\CategoryFactory');			
        }
        return $this->categoriesTable;
    }
	
	public function getIssuesTable()
    {
        if (!$this->issuesTable) {				
            $sm = $this->getServiceLocator();
            $this->issuesTable = $sm->get('ZfcAdmin\Model\IssuesFactory');			
        }
        return $this->issuesTable;
    }
	public function getLikeTable()
    {
        if (!$this->likeTable) {				
            $sm = $this->getServiceLocator();
            $this->likeTable = $sm->get('Application\Model\LikeFactory');			
        }
        return $this->likeTable;
    }
	public function getShareTable()
    {
        if (!$this->shareTable) {				
            $sm = $this->getServiceLocator();
            $this->shareTable = $sm->get('Application\Model\ShareTableFactory');			
        }
        return $this->shareTable;
    }

}
