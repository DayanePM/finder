<?php

$view = '';
foreach ($animals as $animal) {
    $view .= $this->Html->div('col-md-4',
        $this->Html->div('card mb-4 shadow-sm',
            $this->Html->image($animal['Animal']['foto'], array('class' => 'bd-placeholder-img card-img-top')) .
            $this->Html->div('card-body',
                $this->Html->para('card-text', 'Nome: ' . $animal['Animal']['nome']) .
                $this->Html->para('card-text', 'Idade: ' . $animal['Animal']['idade']) .
                $this->Html->para('card-text', 'Situação: ' . $animal['Animal']['cidade']) .
                $this->Html->div('d-flex justify-content-between align-items-center',
                    $this->Js->link('Mais info', '/animals/view/' . $animal['Animal']['id'], array('class' => 'btn btn-primary', 'update' => '#content')) .
                    $this->Js->link('Encontrei', '/animals/encontrar/' . $animal['Animal']['id'], array('class' => 'btn btn-success', 'update' => '#content'))
                )
            )
        )
    );
}

echo $this->Html->tag('h1', 'Animais Perdidos', array('class' => 'mt-5 invisible'));
echo $this->Html->tag('h1', 'Animais Perdidos', array('class' => 'my-5'));
echo $this->Html->div('row', $view);

$this->Js->buffer('$(".form-error").addClass("is-invalid")');
if($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}

?>

