<?php
App::uses('AppController', 'Controller');

class DonosController extends AppController {

    public $layout = 'principal';
    public $helper = array('Js' => array('Jquerry'));

    public function index() {
        $fields = array('Animal.id', 'Animal.nome', 'Animal.idade', 'Animal.infromacoes', 'Animal.cidade', 'Animal.estado', 'Animal.status');
        $pets = $this->Pet->find('all', compact('fields', 'conditions'));

        $this->set('pets', $pets);
    }
    

}