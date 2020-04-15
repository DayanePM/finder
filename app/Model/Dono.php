<?php
App::uses('AppModel', 'Model');

class Dono extends AppModel {

    public $hasMany = array(
        'Animal'
    );


    public function delete($id = null, $cascade = true) {
        $this->id = $id;
        $deleted = $this->saveField('deleted', date('Y-m-d h:i:s'));

        return $deleted;
    }

}

?>