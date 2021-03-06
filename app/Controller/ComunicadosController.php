<?php
App::uses('AppController', 'Controller');

class ComunicadosController extends AppController {

    public function beforeFilter() {
        $this->Auth->allow(array('add'));        
        parent::beforeFilter();
    }

    public function add($animalId){
        if(!empty($this->request->data)){
            $this->request->data['Comunicado']['animal_id'] = $animalId;
            $this->Comunicado->create();
            if($this->Comunicado->save($this->request->data)){
                $this->Flash->bootstrap('Comunicado enviado com sucesso', array('key' => 'success'));
                $this->Comunicado->Animal->mudaStatus($animalId);
                $this->redirect('/'); 
            }
        }

        $fields = array('Animal.id', 'Animal.nome', 'Animal.foto', 'Animal.idade', 'Animal.estado', 'Animal.cidade', 'Animal.informacoes', 'Animal.status');
        $conditions = array('Animal.id' => $animalId);
        $animal = $this->Comunicado->Animal->find('first', compact('fields', 'conditions'));
        $this->set('animal', $animal);
    }

    public function view($animalId) {
        $fields = array('Comunicado.email', 'Comunicado.telefone');
        $conditions = array('Comunicado.animal_id' => $animalId);
        $comunicados = $this->Comunicado->find('all', compact('fields', 'conditions'));

        $this->set('animalId', $animalId);
        $this->set('comunicados', $comunicados);
    }

}