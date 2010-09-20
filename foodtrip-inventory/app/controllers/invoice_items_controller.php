<?php
class InvoiceItemsController extends AppController {

	var $name = 'InvoiceItems';
	var $components = array('Auth');
	var $uses = array('InvoiceItem', 'Inventory', 'Invoice', 'Station');

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
				//TODO:
				//-update inventory
				//-insert transaction
				//-insert invoice item
				//-update invoice
				if($this->Inventory->hasEnoughInventory($stationId, $this->data['InvoiceItem']['product_id'], $this->data['InvoiceItem']['quantity'])) {
					if ($this->Inventory->sellProduct($this->data, $station, $user)) {
						if($this->InvoiceItem->saveInvoiceItem($this->data, $invoice)) {
							$this->Session->setFlash(__('Sale has been recorded', true));
							if($addMore) {
								$this->redirect(array('controller'=>'invoice_items','action' => 'add', $invoice['Invoice']['id']));
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