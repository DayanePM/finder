<?php
App::uses('AppModel', 'Model');

class Comunicado extends AppModel {

    public $belongsTo = array(
        'Animal'
    );

    public $validate = array(
        'email' => array(
            'Informe um e-mial válido' => array('rule' => 'email', true),
            'Email já cadastrado' => array('rule' => 'isUnique')
        ),
        'telefone' => array(
            'Informe o seu numero de telefone/celular' => array('rule' => 'notBlank'),
            'Informe o numero com o DDD' => array('rule' => array('lengthBetween', 10, 12))
        )
    );

}