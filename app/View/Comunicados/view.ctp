<?php

if(!empty($comunicados)) {
    $detalhe = array();
    foreach($comunicados as $comunicado){
        $detalhe[] = array(
            $comunicado['Comunicado']['email'],
            $comunicado['Comunicado']['telefone']
        );
    }
    
    $titulos = array('Email', 'Telefone');
    $header = $this->Html->tableHeaders($titulos);
    $body = $this->Html->tableCells($detalhe);
} else {
    $titulos = array('Não há comunicados para esse animal');
    $header = $this->Html->tableHeaders($titulos);
    $body = '';
}


echo $this->Html->tag('h1', 'Ongs Cadastradas', array('class' => 'jumbotron-heading invisible'));

echo $this->Flash->render('warning'); 
echo $this->Flash->render('success');

echo $this->Html->tag('h1', 'Comunicados', array('class' => 'jumbotron-heading my-5'));

echo $this->Js->link('Encontrei', '', array('class' => 'btn btn-md btn-primary invisible', 'update' => '#content'));
echo $this->Js->link('Continua Perdido', '/animals/perdido/' . $animalId, array('class' => 'btn btn-md btn-danger float-right ml-3', 'update' => '#content'));
echo $this->Js->link('Encontrei', '/animals/encontrado/' . $animalId, array('class' => 'btn btn-md btn-primary float-right', 'update' => '#content'));

echo $this->Html->div('my-3 p-3 bg-white rounded shadow-sm',
    $this->Html->tag('table', $header . $body, array('class' => 'table table-hover'))
);

echo $this->Js->link('Voltar', '/animals/animals_cadastrados/' . AuthComponent::user('id'), array('class' => 'btn btn-md btn-secondary', 'update' => '#content'));

$this->Js->buffer('$(".nav-item").removeClass("active");');
$this->Js->buffer('$(".nav-item a[href$=\'ongs\']").addClass("active");');
if($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
?>