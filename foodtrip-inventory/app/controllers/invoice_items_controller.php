<?php
class InvoiceItemsController extends AppController {

	var $name = 'InvoiceItems';
	var $components = array('Auth', 'RequestHandler');
	var $uses = array('InvoiceItem', 'StationPrice', 'Inventory', 'Invoice', 'Station', 'StationAssignment');

	function beforeFilter() {
		$this->Auth->allow('rest_add');
   	}

	function record() {
		$userAssignments = $this->StationAssignment->getAssignments($this->params['form']['user_id']);
		$message = array();
		$message['error'] = '';
		if(empty($userAssignments)) {
			$message['error'] .= 'User with id `'.$this->params['form']['user_id'].'` is not assigned to any station\n';
		}
		else {
			$userAssignment = $userAssignments[0];
			$invoice = $this->Invoice->getOrGenerateTodaysInvoiceFrom($userAssignment['Station']['id']);
			foreach($this->params['form']['items'] as $item) {
				//TODO: refactor
				$stationPrice = $this->StationPrice->getStationPrice($item['id'], $userAssignment['Station']['id']);
				$data = array();
				$data['InvoiceItem']['invoice_id'] = $invoice['Invoice']['id'];
				$data['InvoiceItem']['product_id'] = $item['id'];
				$data['InvoiceItem']['quantity'] = $item['quantity'];
				$data['InvoiceItem']['remarks'] = $this->params['form']['remarks'];
				$data['InvoiceItem']['price'] = $stationPrice['StationPrice']['price']; 
				if($this->Inventory->hasEnoughInventory($userAssignment['Station']['id'], $data['InvoiceItem']['product_id'], $data['InvoiceItem']['quantity'])) {
					if ($this->Inventory->sellProduct($data, $userAssignment, $userAssignment)) {
						if($this->InvoiceItem->saveInvoiceItem($data, $invoice)) {
							//TODO: refactor
						} else {
							$message['error'] .= 'The sale could not be saved. Please, try again.2';
						}
					} else {
						$message['error'] .= 'The sale could not be saved. Please, try again.';
					}
				}
				else {
					$message['error'] .= 'Station does not have enough inventory.';
				}	
			}
		}
		$message['result'] = ($message['error'] == '')?'success':'failure';
		
		$this->set(compact("message"));
	}
	
	function index() {
		$this->InvoiceItem->recursive = 0;
		$this->set('invoiceItems', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid invoice item', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('invoiceItem', $this->InvoiceItem->read(null, $id));
	}
	
	//TODO: is almost the same as supplier_products controller getDefaultProductCost method
	function getDefaultStationPricePrice($productId = null, $invoiceId = null) {
		$invoice = $this->Invoice->findById($invoiceId);
		$stationPrice = $this->StationPrice->getStationPrice($productId, $invoice['Invoice']['station_id']);
		if ($this->RequestHandler->isAjax()) {
		    $this->disableCache();
		    $this->RequestHandler->setContent('json');
		    $this->layout = 'ajax';
		    $this->viewPath = 'ajax';
		}
		$this->set('stationPrice', $stationPrice);
	}

	function add($stationId = null) {
		if(empty($this->data) && !$stationId) {
			$this->Session->setFlash(__('Invalid station', true));
			$this->redirect(array('controller'=>'stations','action' => 'index'));
		}
		else {
			if($stationId == null) {
				$stationId = $this->data['InvoiceItem']['invoice_id'];
			}
			$station = $this->Station->getStation($stationId);
			$invoice = $this->Invoice->getOrGenerateTodaysInvoiceFrom($stationId);
			$addMore = true;
			if (!empty($this->data)) {
				$user = $this->Auth->user();
				$addMore = $this->data['InvoiceItem']['add_more'];
				if($this->Inventory->hasEnoughInventory($this->data, $stationId)) {
					if ($this->Inventory->sellProduct($this->data, $stationId, $user)) {
						if($this->InvoiceItem->saveInvoiceItem($this->data, $invoice)) {
							$this->Session->setFlash(__('Sale has been recorded', true));
							if($addMore) {
								$this->redirect(array('controller'=>'invoice_items','action' => 'add', $invoice['Invoice']['id'], $station['Station']['id'], Inflector::slug($station['Station']['name'])));
							}
							else {
								$this->redirect(array('controller'=>'invoices','action' => 'station', $station['Station']['id'], Inflector::slug($station['Station']['name'])));	
							}	
						} else {
							$this->Session->setFlash(__('The sale could not be saved. Please, try again.', true));
						}
					} else {
						$this->Session->setFlash(__('The sale could not be saved. Please, try again.', true));
					}
				}
				else {
					$this->Session->setFlash(__('Station does not have enough inventory.', true));
				}
				$this->data = array();
			}
			$products = $this->InvoiceItem->Product->find('list');
			$this->set(compact('products'));
			$this->set('addMore', $addMore);
			$this->set('station', $station);
			$this->set('invoice', $invoice);
			if(empty($products)) {
				$this->Session->setFlash(__('Please add products first.', true));
				$this->redirect(array('controller'=>'invoices','action' => 'station', $station['Station']['id'], Inflector::slug($station['Station']['name'])));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid invoice item', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->InvoiceItem->save($this->data)) {
				$this->Session->setFlash(__('The invoice item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invoice item could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->InvoiceItem->read(null, $id);
		}
		$products = $this->InvoiceItem->Product->find('list');
		$invoices = $this->InvoiceItem->Invoice->find('list');
		$this->set(compact('products', 'invoices'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for invoice item', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->InvoiceItem->delete($id)) {
			$this->Session->setFlash(__('Invoice item deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Invoice item was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->InvoiceItem->recursive = 0;
		$this->set('invoiceItems', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid invoice item', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('invoiceItem', $this->InvoiceItem->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->InvoiceItem->create();
			if ($this->InvoiceItem->save($this->data)) {
				$this->Session->setFlash(__('The invoice item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invoice item could not be saved. Please, try again.', true));
			}
		}
		$products = $this->InvoiceItem->Product->find('list');
		$invoices = $this->InvoiceItem->Invoice->find('list');
		$this->set(compact('products', 'invoices'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid invoice item', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->InvoiceItem->save($this->data)) {
				$this->Session->setFlash(__('The invoice item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invoice item could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->InvoiceItem->read(null, $id);
		}
		$products = $this->InvoiceItem->Product->find('list');
		$invoices = $this->InvoiceItem->Invoice->find('list');
		$this->set(compact('products', 'invoices'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for invoice item', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->InvoiceItem->delete($id)) {
			$this->Session->setFlash(__('Invoice item deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Invoice item was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
}
?>