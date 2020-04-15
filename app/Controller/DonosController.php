<?php
App::uses('AppController', 'Controller');

class DonosController extends AppController {

    public function beforeFilter() {
        $this->Auth->allow(array('login', 'logout', 'add'));        
        parent::beforeFilter();
    } 

    public function add(){
        if(!empty($this->request->data)){
            $this->request->data['Dono']['aro_parent_id'] = 2;
            $this->Dono->create();
            if($this->Dono->save($this->request->data)){
                $this->Flash->bootstrap('Cadastro realizado com sucesso', array('key' => 'success'));
                $this->redirect('/');
            }
        }

        $fields = array('Aro.id', 'Aro.alias');
        $conditions = array('Aro.parent_id' => null);
        $aros = $this->Acl->Aro->find('list', compact('fields', 'conditions'));
        $this->set('aros', $aros);
    }

    public function edit($id = null){
        if (!empty($this->request->data)) {
            if ($this->Dono->save($this->request->data)) {
                $this->Flash->bootstrap('Dados alterado com sucesso!', array('key' => 'success'));
                $this->redirect('/');
            }
        } else {
            $fields = array('Dono.id', 'Dono.nome', 'Dono.telefone', 'Dono.email',);
            $conditions = array('Dono.id' => $id, 'Dono.deleted' => null);
            $this->request->data = $this->Dono->find('first', compact('fields', 'conditions'));
        }
    }

    public function login() {
        $this->layout = 'login';
         if ($this->request->is('post')) {
             if ($this->Auth->login()) {
                 return $this->redirect($this->Auth->redirectUrl());
             }
             $this->Flash->bootstrap('Usuário ou senha incorretos', array('key' => 'danger'));
         }
     }
 
    public function logout() {
        $this->Auth->logout();
        $this->redirect('/');        
    }

    

}