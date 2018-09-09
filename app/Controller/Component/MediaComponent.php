<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RetirarCaracterEspecialComponent
 *
 * @author weto
 */
class MediaComponent {
    public function calculaMediaEstudante($todasAvaliacoes = array()) {
        $todasNotas = 0;
        foreach ($todasAvaliacoes as $avaliacao){
            $todasNotas += $avaliacao['Assessment']['note'];
        }
        $mediaFinal = sizeof($todasAvaliacoes)>0? $todasNotas/sizeof($todasAvaliacoes): 0;
        return $mediaFinal>0?$mediaFinal:0;
    }
    public function calculaMediaCurso($todosEstudantes = array(), $todasAvaliacoes = array()) {
        $todasNotas = 0;
        foreach ($todasAvaliacoes as $avaliacao){
            $todasNotas += $avaliacao['Assessment']['note'];
        }
        $mediaFinal = sizeof($todosEstudantes)>0? $todasNotas/sizeof($todosEstudantes): 0;
        return $mediaFinal>0?$mediaFinal:0;
    }
    public function calculaMediainstituicao($todosCursos = array(), $media = 0) {
        $mediaFinal = sizeof($todosCursos)>0? $media/sizeof($todosCursos): 0;
        return $mediaFinal>0?$mediaFinal:0;
    }
    public function beforeRender(Controller $controller){}
    public function beforeRedirect(){}
    public function afterFind(){}
    public function initialize(){}
    public function startup(){}
    public function shutdown(){}
}
?>
