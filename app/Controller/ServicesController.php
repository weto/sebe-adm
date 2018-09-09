<?php
App::uses('AppController', 'Controller');
/**
 * Service Controller
 *
 * @property Student $Student
 */
class ServicesController extends AppController {


/**
 * admin_index method
 *
 * @return void
 */
	public function notes($field = array()) {
		Controller::loadModel('Instituition');
        $this->autoRender = false;
        $this->layout = 'ajax';
        $this->response->type('json');

		$campo = explode("-", $field);
		switch ($campo[0]) {
			case 'instituicao':
				$key = 'instituition.fantasyname';
				$where = $key.' = '."`$campo[1]`";
				break;
			case 'curso':
				$key = 'course.name';
				$where = $key.' = '."`$campo[1]`";
				break;
			case 'notaGeral':
				$key = 'instituition.note';
				$valor = (float) $campo[1];
				$where = $key.' = '.$valor;
				break;
			case 'notaCurso':
				$key = 'course.note';
				$valor = (float) $campo[1];
				$where = $key.' = '.$valor;
				break;
			case 'mediaAluno':
				$key = 'student.average';
				$valor = (float) $campo[1];
				$where = $key.' = '.$valor;
				break;
			default:
				$where = '1=1';
				break;

		}

		$where = str_replace("`", "'", $where);
		$where = str_replace("%20", " ", $where);

        $query='select instituition.id, instituition.fantasyname, course.name, instituition.note, course.note, student.average from instituitions instituition
inner join courses course on course.instituition_id = instituition.id left join students student on student.course_id = course.id where '.$where.' order by instituition.note'; 

        $retorno['status'] = 200;
        $retorno["Model"] = $this->Instituition->query($query);

        return  $this->response->body(json_encode($retorno));
	}
}
