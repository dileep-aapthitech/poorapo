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
	
    public function indexAction()
    {
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];
		$viewModel = new ViewModel(
			array(
				'baseUrl'				 	=> $baseUrl,
				'basePath' 					=> $basePath				
		));
		return $viewModel;
    }	
	public function headerAction($params)
    {
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];	
		return $this->layout()->setVariable(
			"headerarray",array(
				'baseUrl' 		=> 	$baseUrl,
				'basePath'		=>	$basePath,				
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

}
