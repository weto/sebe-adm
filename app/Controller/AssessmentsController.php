<?php
App::uses('AppController', 'Controller');
/**
 * Assessments Controller
 *
 * @property Assessment $Assessment
 */
class AssessmentsController extends AppController {


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Assessment->recursive = 0;
		$this->set('assessments', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Assessment->id = $id;
		if (!$this->Assessment->exists()) {
			throw new NotFoundException(__('assessment inválido'));
		}
		$this->set('assessment', $this->Assessment->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		Controller::loadModel('Course');
		Controller::loadModel('Instituition');
		Controller::loadModel('Student');
		if ($this->request->is('post')) {
			$this->Assessment->create();
			if ($this->Assessment->save($this->request->data)) {

		        $options = array('conditions'=>array('Student.id' => $this->request->data['Assessment']['student_id']));
        		$estudante = $this->Assessment->Student->find('first', $options);

		        $options2 = array('conditions'=>array('Student.course_id' => $estudante['Course']['id']));
        		$todosEstudantes = $this->Assessment->Student->find('all', $options2);

		        $options3 = array('conditions'=>array('Assessment.student_id' => $this->request->data['Assessment']['student_id']));
        		$todasAvaliacoes = $this->Assessment->find('all',$options3);

        		$mediaEstudante = $this->Media->calculaMediaEstudante($todasAvaliacoes);
        		$student['Student']['id'] = $todosEstudantes[0]['Student']['id'];
        		$student['Student']['average'] = $mediaEstudante;
        		$this->Student->save($student);

        		$mediaCurso = $this->Media->calculaMediaCurso($todosEstudantes, $todasAvaliacoes);
        		$course['Course']['id'] = $todosEstudantes[0]['Course']['id'];
        		$course['Course']['note'] = $mediaCurso;
        		$this->Course->save($course);

		        $options4 = array('conditions'=>array('Course.instituition_id' => $estudante['Course']['instituition_id']));
        		$todasCursos = $this->Course->find('all', $options4);

        		$mediaInstituicao = $this->Media->calculaMediainstituicao($todasCursos, $mediaCurso);
        		$instituicao['Instituition']['id'] = $estudante['Course']['instituition_id'];
        		$instituicao['Instituition']['note'] = $mediaInstituicao;
        		$this->Instituition->save($instituicao);

				$this->Session->setFlash(__('O assessment foi salvo com sucesso.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O assessment não pôde ser salvo. Por favor, tente novamente.'));
			}
		}
		$students = $this->Assessment->Student->find('list');
		$this->set(compact('students'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Assessment->id = $id;
		if (!$this->Assessment->exists()) {
			throw new NotFoundException(__('assessment inválido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Assessment->save($this->request->data)) {
				$this->Session->setFlash(__('O assessment foi salvo com sucesso.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O assessment não pôde ser salvo. Por favor, tente novamente.'));
			}
		} else {
			$this->request->data = $this->Assessment->read(null, $id);
		}
		$students = $this->Assessment->Student->find('list');
		$this->set(compact('students'));
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
		$this->Assessment->id = $id;
		if (!$this->Assessment->exists()) {
			throw new NotFoundException(__('Invalid assessment'));
		}
		if ($this->Assessment->delete()) {
			$this->Session->setFlash(__('Assessment excluído com sucesso.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Assessment não foi excluído.'));
		$this->redirect(array('action' => 'index'));
	}
}
