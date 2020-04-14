<?php
App::uses('AppController', 'Controller');

class AnimalsController extends AppController {


    public function index() {
        $fields = array('Animal.id', 'Animal.nome', 'Animal.idade', 'Animal.informacoes', 'Animal.cidade', 'Animal.estado', 'Animal.status');
        $animals = $this->Animal->find('all', compact('fields', 'conditions'));

        $this->set('animals', $animals);
    }

    public function add(){
        if(!empty($this->request->data)){
            if(!empty($this->request->data['Animal']['foto'])){
                move_uploaded_file($this->request->data['Animal']['foto']['tmp_name'], PATHFOTO . DS . $this->request->data['Animal']['foto']['name']);
                $this->request->data['Animal']['foto'] = $this->request->data['Animal']['foto']['name'];         
            }
            $this->request->data['Animal']['status'] = 'Perdido';
            //$this->request->data['Animal']['dono_id'] .= $this->Auth->user('id');
            $this->Animal->create();
            if($this->Animal->save($this->request->data)){
                $this->Flash->bootstrap('Animal cadastrado com sucesso', array('key' => 'success'));
                $this->redirect('/'); 
            }
        }
    }
    

}