<?php

class ReportsController extends AppController {

	var $name = 'Reports';
	var $uses = array('User', 'Transaction', 'Station', 'StationPrice');
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
		$transactions = $this->Transaction->fetchSalesTransactions($this->data['Report']['Station'], $this->data['Report']['User'], $this->data['Report']['StartDate'], $this->data['Report']['EndDate']);
		$this->set('transactions', $transactions);
	}
	
	function pricelist($stationId = null) {
		$this->StationPrice->recursive = 0;
		if($stationId == null) {
			$this->Session->setFlash(__('Invalid station', true));
			$this->redirect(array('controller'=>'stations','action' => 'index'));
		}
		else {
			$station = $this->Station->getStation($stationId);
			$stationPrices = $this->StationPrice->find('all', array(
				'conditions'=>array('StationPrice.station_id'=>$stationId)
			));
			$this->set('stationPrices', $stationPrices);
		}
	}
	
}
?>
