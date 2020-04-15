<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $layout = 'principal';
    public $helpers = array('Js' => array('Jquery'));


    public function delete($id) {
        $this->{$this->getModelName()}->delete($id);
        $this->Flash->bootstrap('Excluído com sucesso!', array('key' => 'warning'));
        $this->redirect('/');
    }


    public function getControllerName() {
        return $this->request->params['controller'];
    }

    public function getModelName() {
        return $this->modelClass;
    }
}
