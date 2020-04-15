<?php
$inputDefaults = array(
    'class' => 'form-control',
    'required' => false,
    'label' => false,
    'div' => array('class' => 'form-group'),
    'error' => array('attributes' => array('class' => 'invalid-feedback')),
    'type' => 'text'
);

$form = $this->Form->create('Dono', array('class' => 'form-signin', 'inputDefaults' => $inputDefaults));
$form .= $this->Form->hidden('Dono.id');
$form .= $this->Html->div('form-group',
    $this->Form->input('Dono.nome', array(
        'label' => 'Nome',
    ))
); 

$form .= $this->Html->div('form-group',
    $this->Form->input('Dono.email', array(
        'label' => 'E-mail',
    ))
); 

$form .= $this->Html->div('form-group',
    $this->Form->input('Dono.telefone', array(
        'label' => 'Telefone',
    ))
);

$form .= $this->Form->submit('Salvar', array('type' => 'submit', 'class' => 'btn btn-primary mr-3', 'div' => false, 'update' => '#content'));
$form .= $this->Js->link('Voltar', '/', array('class' => 'btn btn-secondary', 'update' => '#content'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Cadastre-se', array('class' => 'my-5 invisible'));
echo $this->Html->tag('h1', 'Cadastre-se', array('class' => 'my-5'));

echo $form;

$this->Js->buffer('$(".form-error").addClass("is-invalid")');
if($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}

?>