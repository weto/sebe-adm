<?php
App::uses('AppController', 'Controller');
/**
 * Instituitions Controller
 *
 * @property Instituitiom $Instituitiom
 */
class InstituitionsController extends AppController {


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Instituitiom->recursive = 0;
		$this->set('instituitions', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Instituitiom->id = $id;
		if (!$this->Instituitiom->exists()) {
			throw new NotFoundException(__('instituitiom inválido'));
		}
		$this->set('instituitiom', $this->Instituitiom->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Instituitiom->create();
			if ($this->Instituitiom->save($this->request->data)) {
				$this->Session->setFlash(__('O instituitiom foi salvo com sucesso.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O instituitiom não pôde ser salvo. Por favor, tente novamente.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Instituitiom->id = $id;
		if (!$this->Instituitiom->exists()) {
			throw new NotFoundException(__('instituitiom inválido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Instituitiom->save($this->request->data)) {
				$this->Session->setFlash(__('O instituitiom foi salvo com sucesso.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O instituitiom não pôde ser salvo. Por favor, tente novamente.'));
			}
		} else {
			$this->request->data = $this->Instituitiom->read(null, $id);
		}
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Instituitiom->id = $id;
		if (!$this->Instituitiom->exists()) {
			throw new NotFoundException(__('Invalid instituitiom'));
		}
		if ($this->Instituitiom->delete()) {
			$this->Session->setFlash(__('Instituitiom excluído com sucesso.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Instituitiom não foi excluído.'));
		$this->redirect(array('action' => 'index'));
	}
}
