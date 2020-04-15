<?php
App::uses('AppModel', 'Model');

class Dono extends AppModel {

    public $hasMany = array(
        'Animal'
    );

    public $validate = array(
        'nome' => array(
            'Informe o seu nome' => array('rule' => 'notBlank'),
            'Informe pelo menos 3 caracteres' => array('rule' => array('minLength', '3')),
        ),
        'email' => array(
            'Informe um e-mial válido' => array('rule' => 'email', true)
        ),
        'telefone' => array(
            'Informe o seu numero de telefone/celular' => array('rule' => 'notBlank'),
            'Informe o numero com o DDD' => array('lengthBetween', 10, 12)
        ),
        'senha' => array(
            'Informe uma senha' => array('rule' => 'notBlank'),
            'A senha deve ter pelo menos 6 caracteres' => array('minLength', '6')
        ),
    );

    public function delete($id = null, $cascade = true) {
        $this->id = $id;
        $deleted = $this->saveField('deleted', date('Y-m-d h:i:s'));

        return $deleted;
    }


}

?>