<?php
class ComunicadoFixture extends CakeTestFixture {
    
    public $name = 'Aminal';
    public $import = array('model' => 'Comunicado', 'records' => false);

    public function init() {
        $this->records = array(
            array(
                'id' => 1,
                'email' => 'dayane.mastelari@hotmail.com',
                'telefone' => '14996779562',
            )
        );
        parent::init();
    }

}
?>