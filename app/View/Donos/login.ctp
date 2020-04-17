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

$form .= $this->Html->div('form-group',
    $this->Form->input('Dono.email', array(
        'placeholder' => 'E-mail',
    ))
);
$form .= $this->Html->div('form-group',
    $this->Form->input('Dono.senha', array(
        'placeholder' => 'Senha',
        'type' => 'password'
    ))
); 

$form .= $this->Form->submit('Login', array('type' => 'submit', 'class' => 'btn btn-lg btn-primary btn-block mb-3', 'div' => false, 'update' => '#content'));
$form .= $this->Html->link('Cadastre-se', '/donos/add', array('update' => '#content'));
$form .= $this->Flash->render('danger'); 
$form .= $this->Flash->render('warning'); 
$form .= $this->Form->end();

echo $this->Html->div('text-center mb-4',
        $this->Html->tag('h1', 'Finder', array('class' => 'h3 mb-3 font-weight-normal'))
);
echo $form;

$this->Js->buffer('$(".form-error").addClass("is-invalid")');
if($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}

?>