<?php

$titulo = $this->Html->tag('section',
    $this->Html->div('container-fluid',
        $this->Html->tag('h1', 'Dados do animal', array('class' => 'jumbotron-heading'))
    ) .
    $this->Html->para('lead text-muted', 'Preencha o formulário abaixo para comunicar o dono que você encontrou esse animal'),
    array('class' => 'jumbotron text-center')
);


$view = $this->Html->div('col-md-4',
    $this->Html->div('card mb-4 box-shadow',
        $this->Html->image($animal['Animal']['foto'], array('class' => 'card-img-top', 'style' => 'height: 250px; width: 100%; display: block;'))
    )
);
$view .= $this->Html->div('col-md-4',
    $this->Html->div('media text-muted pt-3',
        $this->Html->tag('', 'Nome: ' . $animal['Animal']['nome'], array('class' => 'd-block text-gray-dark'))
    ) .
    $this->Html->div('media text-muted pt-3',
        $this->Html->tag('', 'Idade:' . $animal['Animal']['idade'], array('class' => 'd-block text-gray-dark'))
    ) .
    $this->Html->div('media text-muted pt-3',
        $this->Html->tag('', 'Estado: ' . $animal['Animal']['estado'], array('class' => 'd-block text-gray-dark'))
    ) .
    $this->Html->div('media text-muted pt-3',
        $this->Html->tag('', 'Cidade: ' . $animal['Animal']['cidade'], array('class' => 'd-block text-gray-dark'))
    ) .
    $this->Html->div('media text-muted pt-3',
        $this->Html->tag('', 'Informações Extra: ' . $animal['Animal']['informacoes'], array('class' => 'd-block text-gray-dark'))
    )
);

echo $titulo;
echo $this->Html->div('row', $view);

$inputDefaults = array(
    'class' => 'form-control',
    'required' => false,
    'div' => array('class' => 'form-group'),
    'error' => array('attributes' => array('class' => 'invalid-feedback')),
    'type' => 'text'
);

echo $this->Html->tag('h5', 'Encontrei esse animal', array('class' => 'my-5'));

$form = $this->Form->create('Comunicado', array(
    'inputDefaults' => $inputDefaults
));
$form .= $this->Html->div('form-row', 
    $this->Form->input('Comunicado.email', array(
        'div' => array('class' => 'form-group col-md-6'),
        'label' => 'Email',
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )) .
    $this->Form->input('Comunicado.telefone', array(
        'label' => 'Telefone',
        'div' => array('class' => 'form-group col-md-6'),
        'error' => array('attributes' => array('class' => 'invalid-feedback'))  
    ))
);

$form .= $this->Form->submit('Enviar', array('type' => 'submit', 'class' => 'btn btn-primary mb-5 mr-3', 'div' => false, 'update' => '#content'));
$form.= $this->Js->link('Voltar', '/', array('class' => 'btn btn-secondary mb-5', 'update' => '#content'));

$form .= $this->Form->end();

echo $form;

$this->Js->buffer('$(".form-error").addClass("is-invalid")');
if($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}

?>