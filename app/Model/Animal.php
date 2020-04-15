<?php
App::uses('AppModel', 'Model');

class Animal extends AppModel {

    public $belongsTo = array(
        'Dono'
    );

    public $validate = array(
        'nome' => array(
            'Informe o nome do Animal' => array('rule' => 'notBlank', 'messagem' => 'Informe o nome do Animal'),
            'Informe pelo menos 2 caracteres' => array('rule' => array('minLength', '2'), 'message' => 'Informe pelo menos 2 caracteres'),
        ),
        'foto' => array(
            'Selecione uma foto' => array('rule' => 'notBlank', 'messagem' => 'Selecione uma foto')
        ),
        'idade' => array(
            'Informe a idade do Animal' => array('rule' => 'notBlank', 'messagem' => 'Informe a idade do Animal'),
            'A idade deve ser maior que zero' => array('rule' => array('comparison', '>', 0), 'message' => 'A idade deve ser maior que zero')
        ),
        'estado' => array(
            'Informe o estado onde o animal se perder' => array('rule' => 'notBlank', 'messagem' => 'Informe o estado onde o animal se perder'),        
        ),
        'cidade' => array(
           'Informe a cidade onde o animal se perder' => array('rule' => 'notBlank', 'messagem' => 'informe a cidade onde o animal se perdeu'),
        )
    );

    public function delete($id = null, $cascade = true) {
        $this->id = $id;
        $deleted = $this->saveField('deleted', date('Y-m-d h:i:s'));

        return $deleted;
    }

}

?>