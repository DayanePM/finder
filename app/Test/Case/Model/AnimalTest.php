<?php
class AnimalTest extends CakeTestCase {

    public $fixtures = array('app.Animal');
    public $Animal = null;

    public function setUp() {
        $this->Animal = ClassRegistry::init('Animal');
    }

    public function testExisteModel() {
        $this->assertTrue(is_a($this->Animal, 'Animal'));
    }

    public function testNomeEmpty(){
        $data = array('Animal' => array('nome' => null));
        $saved = $this->Animal->save($data);
        $this->assertFalse($saved);

        $data = array('Animal' => array('nome' => ''));
        $saved = $this->Animal->save($data);
        $this->assertFalse($saved);

        $data = array('Animal' => array('nome' => ' '));
        $saved = $this->Animal->save($data);
        $this->assertFalse($saved);
    }

    public function testNomeMinLength(){
        $data = array('Animal' => array('nome' => 'b'));
        $saved = $this->Animal->save($data);
        $this->assertFalse($saved);
    }

    public function testFotoEmpty(){
        $data = array('Animal' => array('foto' => null));
        $saved = $this->Animal->save($data);
        $this->assertFalse($saved);

        $data = array('Animal' => array('foto' => ''));
        $saved = $this->Animal->save($data);
        $this->assertFalse($saved);

        $data = array('Animal' => array('foto' => ' '));
        $saved = $this->Animal->save($data);
        $this->assertFalse($saved);
    }

    public function testIdadeEmpty(){
        $data = array('Animal' => array('idade' => null));
        $saved = $this->Animal->save($data);
        $this->assertFalse($saved);

        $data = array('Animal' => array('idade' => ''));
        $saved = $this->Animal->save($data);
        $this->assertFalse($saved);

        $data = array('Animal' => array('idade' => ' '));
        $saved = $this->Animal->save($data);
        $this->assertFalse($saved);
    }

    public function testIdadeMaiorZero(){
        $data = array('Animal' => array('idade' => 0));
        $saved = $this->Animal->save($data);
        $this->assertFalse($saved);

        $data = array('Animal' => array('idade' => -1));
        $saved = $this->Animal->save($data);
        $this->assertFalse($saved);
    }

    public function testEstadoEmpty(){
        $data = array('Animal' => array('estado' => null));
        $saved = $this->Animal->save($data);
        $this->assertFalse($saved);

        $data = array('Animal' => array('estado' => ''));
        $saved = $this->Animal->save($data);
        $this->assertFalse($saved);

        $data = array('Animal' => array('estado' => ' '));
        $saved = $this->Animal->save($data);
        $this->assertFalse($saved);
    }

    public function testCidadeEmpty(){
        $data = array('Animal' => array('cidade' => null));
        $saved = $this->Animal->save($data);
        $this->assertFalse($saved);

        $data = array('Animal' => array('cidade' => ''));
        $saved = $this->Animal->save($data);
        $this->assertFalse($saved);

        $data = array('Animal' => array('cidade' => ' '));
        $saved = $this->Animal->save($data);
        $this->assertFalse($saved);
    }

}

?>