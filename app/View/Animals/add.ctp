<?php

$inputDefaults = array(
    'class' => 'form-control',
    'required' => false,
    'div' => array('class' => 'form-group'),
    'error' => array('attributes' => array('class' => 'invalid-feedback')),
    'type' => 'text'
);

$form = $this->Form->create('Animal', array(
    'enctype' => 'multipart/form-data',
    'inputDefaults' => $inputDefaults
));
$form .= $this->Form->hidden('Animal.dono_id');
$form .= $this->Html->div('form-row', 
    $this->Form->input('Animal.foto', array(
        'type' => 'file',
        'placeholder' => 'Escolha uma foto',
        'div' => array('class' => 'form-group col-md-6'),
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )) . '<input type="hidden" name="MAX_FILE_SIZE" value="15000">'
);

$form .= $this->Html->div('form-row', 
    $this->Form->input('Animal.nome', array(
        'div' => array('class' => 'form-group col-md-6'),
        'placeholder' => 'Nome',
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )) .
    $this->Form->input('Animal.idade', array(
        'empty' => 'Idade do Animal',
        'placeholder' => 'Idade do animal',
        'div' => array('class' => 'form-group col-md-6'),
        'error' => array('attributes' => array('class' => 'invalid-feedback'))  
    ))
);

$form .= $this->Html->div('form-row', 
    $this->Form->input('Animal.estado', array(
        'empty' => 'Estado que o animal se perdeu',
        'type' => 'select',
        'options' => array(
            'AC'=>'Acre',
            'AL'=>'Alagoas',
            'AP'=>'Amapá',
            'AM'=>'Amazonas',
            'BA'=>'Bahia',
            'CE'=>'Ceará',
            'DF'=>'Distrito Federal',
            'ES'=>'Espírito Santo',
            'GO'=>'Goiás',
            'MA'=>'Maranhão',
            'MT'=>'Mato Grosso',
            'MS'=>'Mato Grosso do Sul',
            'MG'=>'Minas Gerais',
            'PA'=>'Pará',
            'PB'=>'Paraíba',
            'PR'=>'Paraná',
            'PE'=>'Pernambuco',
            'PI'=>'Piauí',
            'RJ'=>'Rio de Janeiro',
            'RN'=>'Rio Grande do Norte',
            'RS'=>'Rio Grande do Sul',
            'RO'=>'Rondônia',
            'RR'=>'Roraima',
            'SC'=>'Santa Catarina',
            'SP'=>'São Paulo',
            'SE'=>'Sergipe',
            'TO'=>'Tocantins'
        ),
        'div' => array('class' => 'form-group col-md-6'),
        'error' => array('attributes' => array('class' => 'invalid-feedback'))  
    )) .
    $this->Form->input('Animal.cidade', array(
        'placeholder' => 'Cidade que o animal se perdeu',
        'div' => array('class' => 'form-group col-md-6'),
        'error' => array('attributes' => array('class' => 'invalid-feedback'))  
    ))
);

$form .= $this->Html->div('form-row',
    $this->Form->input('Animal.informacoes', array(
        'placeholder' => 'Informações extra',
        'type' => 'textarea',
        'div' => array('class' => 'form-group col-md-12'),
        'maxlength' => 300,
        'error' => array('attributes' => array('class' => 'invalid-feedback'))  
    ))

);

$form .= $this->Form->submit('Gravar', array('type' => 'submit', 'class' => 'btn btn-success mr-2', 'div' => false, 'update' => '#content'));
$form .= $this->Js->link('Cancelar', '/', array('class' => 'btn btn-secondary', 'update' => '#content'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Novo Animal', array('class' => 'mt-5 invisible'));
echo $this->Html->tag('h1', 'Novo Animal', array('class' => 'my-5'));
echo $form;

$this->Js->buffer('$(".form-error").addClass("is-invalid")');
if($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}


?>