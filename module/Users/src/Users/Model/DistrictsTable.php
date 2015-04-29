<?php
namespace Users\Model;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql;
use Zend\Db\Sql\Where;
use Zend\Db\Sql\Select;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;
use Zend\Db\Sql\Predicate;
use Zend\Db\Sql\Expression;

class DistrictsTable
{
    protected $tableGateway;
	protected $select;

	public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
		$this->select = new Select();
    }
	/************* List All Districts **********/
	public function getDistricts(){
		$select = $this->tableGateway->getSql()->select();
		$select->where('status=1');
		$resultSet = $this->tableGateway->selectWith($select);
		$row = $resultSet;
		return $row;
	}
	/************** Based on States and Country *********/
	public function getLocationBasedDistricts($countryid,$stateid){
		$select = $this->tableGateway->getSql()->select();
		$select->where('state_id="'.$stateid.'"');	
		$select->where('status=1');
		$resultSet = $this->tableGateway->selectWith($select);
		$row = $resultSet;
		return $row;
	}
	public function getDistrictIdByName( $districtName )
	{
		$select = $this->tableGateway->getSql()->select();
		$select->where->expression('trim(LOWER(tbl_districts.district_name)) LIKE ?', strtolower($districtName));
		$select->where('status=1');
		$resultSet = $this->tableGateway->selectWith($select);
		return $resultSet->current()->district_id;
	}
}