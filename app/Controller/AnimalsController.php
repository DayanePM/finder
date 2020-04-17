<?php
App::uses('AppController', 'Controller');

class AnimalsController extends AppController {

    public function beforeFilter() {
        $this->Auth->allow(array('index', 'view', 'mudaStatus', 'lista'));
        $this->Auth->mapActions(['update' => ['animals_cadastrados', 'encontrado', 'perdido']]);
        $this->Auth->mapActions(['view' => ['lista']]);         
        parent::beforeFilter();
    } 

    public $paginate = array(
        'fields' => array('Animal.id', 'Animal.nome', 'Animal.foto', 'Animal.idade', 'Animal.estado', 'Animal.cidade', 'Animal.informacoes', 'Animal.status'),
        'conditions' => array('Animal.deleted' => null, 'Animal.status' => 'Perdido'),
        'order' => array('Usuario.nome' => 'asc'),
        'limit' => 12
    );

    public function index() {
        $animals = $this->paginate();
        $this->set('animals', $animals);
    }

    public function add(){
        if(!empty($this->request->data)){
            if(!empty($this->request->data['Animal']['foto'])){
                move_uploaded_file($this->request->data['Animal']['foto']['tmp_name'], PATHFOTO . DS . $this->request->data['Animal']['foto']['name']);
                $this->request->data['Animal']['foto'] = $this->request->data['Animal']['foto']['name'];         
            }
            $this->request->data['Animal']['status'] = 'Perdido';
            $this->request->data['Animal']['dono_id'] .= $this->Auth->user('id');
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
                $this->redirect('/animals/animals_cadastrados/' . $this->Auth->user('id'));
            }
        } else {
            $fields = array('Animal.id', 'Animal.nome', 'Animal.foto', 'Animal.idade', 'Animal.estado', 'Animal.cidade', 'Animal.informacoes', 'Animal.status');
            $conditions = array('Animal.id' => $id, 'Animal.deleted' => null);
            $this->request->data = $this->Animal->find('first', compact('fields', 'conditions'));
        }        
    }

    public function view($id = null) {
        $fields = array('Animal.id', 'Animal.nome', 'Animal.foto', 'Animal.idade', 'Animal.estado', 'Animal.cidade', 'Animal.informacoes', 'Animal.status');
        $conditions = array('Animal.id' => $id);
        $animal = $this->Animal->find('first', compact('fields', 'conditions'));
        $this->set('animal', $animal);
    }

    public function delete($id){
        $this->Animal->delete($id);
        $this->redirect('/');
        $this->Flash->bootstrap('Animal excluído com sucesso', array('key' => 'warning'));
    }

    public function animals_cadastrados($donoId) {
        $fields = array('Animal.id', 'Animal.dono_id', 'Animal.nome', 'Animal.foto', 'Animal.idade', 'Animal.estado', 'Animal.cidade', 'Animal.informacoes', 'Animal.status');
        $conditions = array('Animal.dono_id' => $donoId);
        $animals = $this->Animal->find('all', compact('fields', 'conditions'));
        $this->set('animals', $animals);

    }

    public function lista($id = null) {
        $conditions = array('Animal.status' => 'Perdido');
        $animal = $this->Animal->find('all', compact('conditions'));
        $this->set(array(
            'animal' => $animal,
            '_serialize' => array('animal')
        ));
    }

    public function encontrado($id){
        $this->Animal->encontrado($id);
        $this->Flash->bootstrap('Situação do Animal mudou para Encontrado', array('key' => 'success'));
        $this->redirect('/comunicados/view/' . $id);        
    }

    public function perdido($id){
        $this->Animal->perdido($id);
        $this->Flash->bootstrap('Situação do Animal mudou para Perdido', array('key' => 'warning'));
        $this->redirect('/comunicados/view/' . $id);
    }

}