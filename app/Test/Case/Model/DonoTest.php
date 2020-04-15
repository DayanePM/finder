<?php
class DonoTest extends CakeTestCase {

    public $fixtures = array('app.Dono', 'app.Animal');
    public $Dono = null;

    public function setUp() {
        $this->Dono = ClassRegistry::init('Dono');
    }

    public function testExisteModel() {
        $this->assertTrue(is_a($this->Dono, 'Dono'));
    }

    public function testNomeEmpty(){
        $data = array('Dono' => array('nome' => null));
        $saved = $this->Dono->save($data);
        $this->assertFalse($saved);

        $data = array('Dono' => array('nome' => ''));
        $saved = $this->Dono->save($data);
        $this->assertFalse($saved);

        $data = array('Dono' => array('nome' => ' '));
        $saved = $this->Dono->save($data);
        $this->assertFalse($saved);
    }

    public function testNomeMinLength(){
        $data = array('Dono' => array('nome' => 'bd'));
        $saved = $this->Dono->save($data);
        $this->assertFalse($saved);
    }

    public function testEmailEmpty(){
        $data = array('Dono' => array('email' => null));
        $saved = $this->Dono->save($data);
        $this->assertFalse($saved);

        $data = array('Dono' => array('email' => ''));
        $saved = $this->Dono->save($data);
        $this->assertFalse($saved);

        $data = array('Dono' => array('email' => ' '));
        $saved = $this->Dono->save($data);
        $this->assertFalse($saved);
    }

    public function testemailValido(){
        $data = array('Dono' => array('email' => 'dsadsadsa'));
        $saved = $this->Dono->save($data);
        $this->assertFalse($saved);

        $data = array('Dono' => array('email' => 'teste@teste'));
        $saved = $this->Dono->save($data);
        $this->assertFalse($saved);
    }

    public function testTelefoneEmpty(){
        $data = array('Dono' => array('telefone' => null));
        $saved = $this->Dono->save($data);
        $this->assertFalse($saved);

        $data = array('Dono' => array('telefone' => ''));
        $saved = $this->Dono->save($data);
        $this->assertFalse($saved);

        $data = array('Dono' => array('telefone' => ' '));
        $saved = $this->Dono->save($data);
        $this->assertFalse($saved);
    }

    public function testQuantidadeNumero(){
        $data = array('Dono' => array('telefone' => 14946546));
        $saved = $this->Dono->save($data);
        $this->assertFalse($saved);

        $data = array('Dono' => array('telefone' => 1499677956544));
        $saved = $this->Dono->save($data);
        $this->assertFalse($saved);
    }

    public function testSenhaEmpty(){
        $data = array('Dono' => array('senha' => null));
        $saved = $this->Dono->save($data);
        $this->assertFalse($saved);

        $data = array('Dono' => array('senha' => ''));
        $saved = $this->Dono->save($data);
        $this->assertFalse($saved);

        $data = array('Dono' => array('senha' => ' '));
        $saved = $this->Dono->save($data);
        $this->assertFalse($saved);
    }

    public function testSenhaMinimo(){
        $data = array('Dono' => array('senha' => 1234));
        $saved = $this->Dono->save($data);
        $this->assertFalse($saved);
    }

    public function testDelete() {
        $DonoId = 1;
        $deleted = $this->Dono->delete($DonoId);
        $conditions = array('Dono.deleted IS NOT NULL', 'Dono.id' => $DonoId);
        $contain = false;
        $deletedDono = $this->Dono->find('first', compact('conditions', 'contain'));
        $this->assertNotEmpty($deletedDono);
    }

}