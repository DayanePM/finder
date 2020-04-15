<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $layout = 'principal';
    public $helpers = array('Js' => array('Jquery'));

    public $components = array(
        'Flash',
        'RequestHandler',
        'Session',
        'Auth' => array(
            'flash' => array('element' => 'bootstrap', 'params' => array('key' => 'warning'), 'key' => 'warning'),
            'authError' => 'Você não possui permissão para acessar essa operação.',
            'loginAction' => '/login',
            'loginRedirect' => '/',
            'logoutRedirect' => '/login',
            'authenticate' => array(
                'Form' => array(
                    'userModel' => 'Dono',
                    'fields' => array('username' => 'email', 'password' => 'senha'),
                    'passwordHasher' => array('className' => 'Simple', 'hashType' => 'sha256')
                )
            ),
            'authorize' => array('Crud' => array('userModel' => 'Dono'))
        ), 
        'Acl'
    );

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
