<?php
App::uses('AppModel', 'Model');

class Dono extends AppModel {

    public $hasMany = array(
        'Animal'
    );

}

?>