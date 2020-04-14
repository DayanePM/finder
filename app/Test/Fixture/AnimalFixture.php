<?php
class AnimalFixture extends CakeTestFixture {
    
    public $name = 'Aminal';
    public $import = array('model' => 'Animal', 'records' => false);

    public function init() {
        $this->records = array(
            array(
                'id' => 1, 
                'dono_id' => 1,
                'nome' => 'Chili',
                'foto' => 'chili.jpg',
                'idade' => '2',
                'estado' => 'SP',
                'cidade' => 'Marília',
                'informacoes' => 'Odeia crianças, é minada e brava'
            )
        );
        parent::init();
    }

}
?>