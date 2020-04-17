<?php
class ComunicadoTest extends CakeTestCase {

    public $fixtures = array('app.Comunicado', 'app.Animal');
    public $Comunicado = null;

    public function setUp() {
        $this->Comunicado = ClassRegistry::init('Comunicado');
    }

    public function testExisteModel() {
        $this->assertTrue(is_a($this->Comunicado, 'Comunicado'));
    }

    public function testEmailEmpty(){
        $data = array('Comunicado' => array('email' => null));
        $saved = $this->Comunicado->save($data);
        $this->assertFalse($saved);

        $data = array('Comunicado' => array('email' => ''));
        $saved = $this->Comunicado->save($data);
        $this->assertFalse($saved);

        $data = array('Comunicado' => array('email' => ' '));
        $saved = $this->Comunicado->save($data);
        $this->assertFalse($saved);
    }

    public function testemailValido(){
        $data = array('Comunicado' => array('email' => 'dsadsadsa'));
        $saved = $this->Comunicado->save($data);
        $this->assertFalse($saved);

        $data = array('Comunicado' => array('email' => 'teste@teste'));
        $saved = $this->Comunicado->save($data);
        $this->assertFalse($saved);
    }

    public function testemailIsInique(){
        $data = array('Comunicado' => array('email' => 'dayane.mastelari@hotmail.com'));
        $saved = $this->Comunicado->save($data);
        $this->assertFalse($saved);
    }

    public function testTelefoneEmpty(){
        $data = array('Comunicado' => array('telefone' => null));
        $saved = $this->Comunicado->save($data);
        $this->assertFalse($saved);

        $data = array('Comunicado' => array('telefone' => ''));
        $saved = $this->Comunicado->save($data);
        $this->assertFalse($saved);

        $data = array('Comunicado' => array('telefone' => ' '));
        $saved = $this->Comunicado->save($data);
        $this->assertFalse($saved);
    }

}