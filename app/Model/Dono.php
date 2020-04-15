<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

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
            'Informe um e-mial válido' => array('rule' => 'email', true),
            'Email já cadastrado' => array('rule' => 'isUnique')
        ),
        'telefone' => array(
            'Informe o seu numero de telefone/celular' => array('rule' => 'notBlank'),
            'Informe o numero com o DDD' => array('rule' => array('lengthBetween', 10, 12))
        ),
        'senha' => array(
            'Informe uma senha' => array('rule' => 'notBlank'),
            'A senha deve ter pelo menos 6 caracteres' => array('rule' => array('minLength', 6))
        ),
    );

    public function beforeSave($options = array()) {
        if (!empty($this->data['Dono']['senha'])) {
            $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
            $this->data['Dono']['senha'] = $passwordHasher->hash($this->data['Dono']['senha']
        );
    }

        return true;
    } 

    public function delete($id = null, $cascade = true) {
        $this->id = $id;
        $deleted = $this->saveField('deleted', date('Y-m-d h:i:s'));

        return $deleted;
    }

    public function afterSave($created, $options = array()) {
        if (!empty($this->data['Dono']['aro_parent_id'])) {
            $this->aroSave();
        }
    }

    public function aroSave() {
        $Aro = ClassRegistry::init('Aro');
        $aro = $Aro->findByForeignKey($this->data['Dono']['id']);
        $saveAro = array(
            'model' => 'Dono',
            'foreign_key' => $this->data['Dono']['id'],
            'parent_id' => $this->data['Dono']['aro_parent_id']
        );
        if (empty($aro)) {
            $Aro->create();
        } else {
            $Aro->id = $aro['Aro']['id'];
        }
        $Aro->save($saveAro);        
    }


}

?>