<?php
App::uses('AppController', 'Controller');

class AnimalsController extends AppController {

    public function index() {
        $fields = array('Animal.id', 'Animal.nome', 'Animal.foto', 'Animal.idade', 'Animal.estado', 'Animal.cidade', 'Animal.informacoes', 'Animal.status');
        $conditions = array('Animal.deleted' => null, 'Animal.status' => 'Perdido');
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
            //descomentar
            //$this->request->data['Animal']['dono_id'] .= $this->Auth->user('id');
            $this->Animal->create();
            if($this->Animal->save($this->request->data)){
                $this->Flash->bootstrap('Animal cadastrado com sucesso', array('key' => 'success'));
                $this->redirect('/'); 
            }
        }
    } 
    
    public function edit($id = null) {
        if(!empty($this->request->data)){
            if($this->Animal->save($this->request->data)){                
                $this->Flash->bootstrap('Alteração realizada com sucesso', array('key' => 'success'));
                $this->redirect('/');
            }
        } else {
            $fields = array('Animal.id', 'Animal.nome', 'Animal.foto', 'Animal.idade', 'Animal.estado', 'Animal.cidade', 'Animal.informacoes', 'Animal.status');
            $conditions = array('Animal.id' => $id);
            $this->request->data = $this->Animal->find('first', compact('fields', 'conditions'));
        }        
    }

    public function view($id = null) {
    $fields = array('Animal.id', 'Animal.nome', 'Animal.foto', 'Animal.idade', 'Animal.estado', 'Animal.cidade', 'Animal.informacoes', 'Animal.status');
    $conditions = array('Animal.id' => $id);
    $animal = $this->Animal->find('first', compact('fields', 'conditions'));
    $this->set('animal', $animal);
}

}