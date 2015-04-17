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
		// echo "<pre>";print_r($menuIssuesArr);exit;

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
			// echo "<pre>";print_r($cmsPageHtml);exit;
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

}
