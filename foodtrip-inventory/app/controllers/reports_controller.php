<?php

class ReportsController extends AppController {

	var $name = 'Reports';
	var $uses = array('User', 'Transaction', 'Station', 'StationPrice', 'StationAssignment');
	var $helpers = array('Session', 'Html', 'Form', 'Js', 'Time', 'SalesReportGenerator', 'PricelistGenerator');

	function index() {
		$users = $this->User->getAssignableUsers('list');
		$users[""] = 'No specific user';
		ksort($users);
		$stations = $this->Station->getStations('list');
		$stations[""] = 'No specific station';
		ksort($stations);
		$this->set(compact('users'));
		$this->set(compact('stations'));
	}
	
	function seller_sales() {
		$stationId = $this->data['Report']['Station'];
		$userId = $this->data['Report']['User'];
		$transactions = $this->Transaction->fetchSalesTransactions($stationId, $userId, $this->data['Report']['StartDate'], $this->data['Report']['EndDate']);
		if($stationId == '') {
			$station = $this->StationAssignment->getAssignments($userId, 'first');
			$stationId = $station['Station']['id'];
		}
		$stationPrices = $this->StationPrice->getStationPrices($stationId);
		$this->set('transactions', $transactions);
		$this->set('stationPrices', $stationPrices);
		$this->set('headerData', $this->_getHeaderData($this->data));
	}
	
	function pricelist($stationId = null) {
		$this->StationPrice->recursive = 0;
		if($stationId == null) {
			$this->Session->setFlash(__('Invalid station', true));
			$this->redirect(array('controller'=>'stations','action' => 'index'));
		}
		else {
			$stationPrices = $this->StationPrice->getStationPrices($stationId);
			$this->set('stationPrices', $stationPrices);
			$this->set('headerData', $this->_getHeaderData($this->data));
		}
	}
	
	function _getHeaderData($data) {
		$headerData = array();
		$headerData['Report']['CompanyName'] = 'BusinessTeam'; 
		$headerData['Report']['StartDate'] = $data['Report']['StartDate'];
		$headerData['Report']['EndDate'] = $data['Report']['EndDate'];
		return $headerData;
	}
}
?>
