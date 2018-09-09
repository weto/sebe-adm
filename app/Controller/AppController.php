<?php

App::uses('Controller', 'Controller');
class AppController extends Controller {

    public $components = array('Session', 'RequestHandler','Auth','Media');
    public $helpers    = array('Html','Form','Session','Cache');
    public $cacheAction = "10000";
    
    public function isPrefix($prefix) {
        return isset($this->request->params['prefix']) && $this->request->params['prefix'] == $prefix;
    }

    public function beforeFilter() {
        header( 'Content-Type: application/json' );
        header( 'Access-Control-Allow-Origin: *' );
        $this->Auth->allow('*');
        $this->layout = 'admin';
        parent::beforeFilter();
    }
}