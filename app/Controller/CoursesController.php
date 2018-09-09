<?php
App::uses('AppController', 'Controller');
/**
 * Courses Controller
 *
 * @property Cours $Cours
 */
class CoursesController extends AppController {


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Cours->recursive = 0;
		$this->set('courses', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Cours->id = $id;
		if (!$this->Cours->exists()) {
			throw new NotFoundException(__('cours inválido'));
		}
		$this->set('cours', $this->Cours->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Cours->create();
			$this->request->data['Cours']['note'] = 0;
			if ($this->Cours->save($this->request->data)) {
				$this->Session->setFlash(__('O cours foi salvo com sucesso.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O cours não pôde ser salvo. Por favor, tente novamente.'));
			}
		}
		$instituitions = $this->Cours->Instituition->find('list');
		$this->set(compact('instituitions'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Cours->id = $id;
		if (!$this->Cours->exists()) {
			throw new NotFoundException(__('cours inválido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Cours->save($this->request->data)) {
				$this->Session->setFlash(__('O cours foi salvo com sucesso.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O cours não pôde ser salvo. Por favor, tente novamente.'));
			}
		} else {
			$this->request->data = $this->Cours->read(null, $id);
		}
		$instituitions = $this->Cours->Instituition->find('list');
		$this->set(compact('instituitions'));
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
		$this->Cours->id = $id;
		if (!$this->Cours->exists()) {
			throw new NotFoundException(__('Invalid cours'));
		}
		if ($this->Cours->delete()) {
			$this->Session->setFlash(__('Cours excluído com sucesso.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Cours não foi excluído.'));
		$this->redirect(array('action' => 'index'));
	}
}
