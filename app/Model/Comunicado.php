<?php
App::uses('AppModel', 'Model');

class Comunicado extends AppModel {

    public $belongsTo = array(
        'Animal'
    );
}