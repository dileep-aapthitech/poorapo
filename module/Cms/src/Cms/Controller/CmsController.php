<?php
namespace Cms\Controller;
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
class CmsController extends AbstractActionController
{
	public function indexAction()
	{
	}
	public function paymentsRefundsAction()
	{
		$baseUrls = $this->getServiceLocator()->get('config');
		$baseUrlArr = $baseUrls['urls'];
		$baseUrl = $baseUrlArr['baseUrl'];
		$basePath = $baseUrlArr['basePath'];

		$viewModel = new ViewModel(
			array(
				'baseUrl'				=> $baseUrl,
				'basePath' 				=> $basePath
		));
		return $viewModel;
	}
	public function ccavenuAction(){
		$Merchant_Id = "your_merchantid";//
		$Amount = "amount";
		$Order_Id ="orderid";//unique Id that should be passed to payment gateway
		$WorkingKey = "working_key";//Given to merchant by ccavenue
		$Redirect_Url ="sucessurl";
		$Checksum = getCheckSum($Merchant_Id,$Amount,$Order_Id ,$Redirect_Url,$WorkingKey); 	
	}
	//creating a signature using the given details for security reasons
	function getchecksum($MerchantId,$Amount,$OrderId ,$URL,$WorkingKey)
	{
		$str =”$MerchantId|$OrderId|$Amount|$URL|$WorkingKey”;
		$adler = 1;
		$adler = adler32($adler,$str);
		return $adler;
	}
	//Verify the the checksum
	function verifychecksum($MerchantId,$OrderId,$Amount,$AuthDesc,$CheckSum,$WorkingKey)
	{
		$str = "$MerchantId|$OrderId|$Amount|$AuthDesc|$WorkingKey";
		$adler = 1;
		$adler = adler32($adler,$str);
		if($adler == $CheckSum)
		return "true" ;
		else
		return "false" ;
	}
	//functions
	function adler32($adler , $str)
	{
		$BASE = 65521 ;
		$s1 = $adler & 0xffff ;
		$s2 = ($adler >> 16) & 0xffff;
		for($i = 0 ; $i < strlen($str) ; $i++)
		{
			$s1 = ($s1 + Ord($str[$i])) % $BASE ;
			$s2 = ($s2 + $s1) % $BASE ;
		}
		return leftshift($s2 , 16) + $s1;
	}
	//leftshift function
	function leftshift($str , $num)
	{
		$str = DecBin($str);
		for( $i = 0 ; $i < (64 – strlen($str)) ; $i++)
		$str = “0″.$str ;
		for($i = 0 ; $i < $num ; $i++)
		{
			$str = $str.”0″;
			$str = substr($str , 1 ) ;
		}
		return cdec($str) ;
	}
	//cdec function
	function cdec($num)
	{
		for ($n = 0 ; $n < strlen($num) ; $n++)
		{
			$temp = $num[$n] ;
			$dec = $dec + $temp*pow(2 , strlen($num) – $n – 1);
		}
		return $dec;
	}
}