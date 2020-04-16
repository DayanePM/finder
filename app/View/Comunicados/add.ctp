<?php
$view = $this->Html->div('col-md-4',
    $this->Html->div('card mb-4 box-shadow',
        $this->Html->image($animal['Animal']['foto'], array('class' => 'card-img-top', 'style' => 'height: 250px; width: 100%; display: block;'))
    )
);
$view .= $this->Html->div('col-md-4',
    $this->Html->div('media text-muted pt-3',
        $this->Html->para('media-body pb-3 mb-0 small lh-125 border-bottom border-gray',
            $this->Html->tag('strong', 'Nome', array('class' => 'd-block text-gray-dark')) .
            $animal['Animal']['nome']
        )
    ) .
    $this->Html->div('media text-muted pt-3',
        $this->Html->para('media-body pb-3 mb-0 small lh-125 border-bottom border-gray',
            $this->Html->tag('strong', 'Idade', array('class' => 'd-block text-gray-dark')) .
            $animal['Animal']['idade']
        ) 
    ) .
    $this->Html->div('media text-muted pt-3',
        $this->Html->para('media-body pb-3 mb-0 small lh-125 border-bottom border-gray',
            $this->Html->tag('strong', 'Estado', array('class' => 'd-block text-gray-dark')) .
            $animal['Animal']['estado']
        ) 
    ) .
    $this->Html->div('media text-muted pt-3',
        $this->Html->para('media-body pb-3 mb-0 small lh-125 border-bottom border-gray',
            $this->Html->tag('strong', 'Cidade', array('class' => 'd-block text-gray-dark')) .
            $animal['Animal']['cidade']
        ) 
    ) .
    $this->Html->div('media text-muted pt-3',
        $this->Html->para('media-body pb-3 mb-0 small lh-125 border-bottom border-gray',
            $this->Html->tag('strong', 'Situação', array('class' => 'd-block text-gray-dark')) .
            $animal['Animal']['status']
        )
    ) .
    $this->Html->div('media text-muted pt-3',
        $this->Html->para('media-body pb-3 mb-0 small lh-125',
            $this->Html->tag('strong', 'Informações Extra', array('class' => 'd-block text-gray-dark')) .
            $animal['Animal']['informacoes']
        )
    )
);

echo $this->Html->tag('h1', 'Dados do Animal', array('class' => 'mb-5 invisible'));
echo $this->Html->tag('h1', 'Dados do Animal', array('class' => 'my-5'));
echo $this->Html->div('row', $view);

$inputDefaults = array(
    'class' => 'form-control',
    'required' => false,
    'div' => array('class' => 'form-group'),
    'error' => array('attributes' => array('class' => 'invalid-feedback')),
    'type' => 'text'
);

echo $this->Html->tag('h5', 'Preencha o formulário abaixo para comunicar ao dono que você encontrou esse animal!', array('class' => 'my-5'));

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