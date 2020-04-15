<?php
class DonoFixture extends CakeTestFixture {
    
    public $name = 'Aminal';
    public $import = array('model' => 'Dono', 'records' => false);

    public function init() {
        $this->records = array(
            array(
                'id' => 1, 
                'nome' => 'Dayane',
                'email' => 'dayane.mastelari@hotmail.com',
                'telefone' => '14996779562',
                'senha' => 'Pdajdas'
            )
        );
        parent::init();
    }

}
?>