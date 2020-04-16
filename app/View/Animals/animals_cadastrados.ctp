<?php

$view = '';
foreach ($animals as $animal) {
    $view .= $this->Html->div('col-md-4',
        $this->Html->div('card mb-4 box-shadow',
            $this->Html->image($animal['Animal']['foto'], array('class' => 'card-img-top', 'style' => 'height: 250px; width: 100%; display: block;')) .
            $this->Html->div('card-body',
                $this->Html->para('card-text', 'Situação: ' . $animal['Animal']['status']) .
                $this->Html->div('d-flex justify-content-between align-items-center',
                    $this->Html->div('btn-group',
                        $this->Html->link('Alterar', '/animals/edit/' . $animal['Animal']['id'], array('class' => 'btn btn-md btn-outline-secondary', 'update' => '#content')) .
                        $this->Js->link('Comunicado', '/comunicados/view/' . $animal['Animal']['id'], array('class' => 'btn btn-md btn-outline-secondary', 'update' => '#content'))
                    )
                )
            )
        )
    );
}

echo $this->Html->tag('h1', 'Animais Perdidos', array('class' => 'mb-5 invisible'));
echo $this->Flash->render('warning'); 
echo $this->Flash->render('success');
echo $this->Html->tag('h1', 'Meus Animais', array('class' => 'my-5'));
echo $this->Html->div('row', $view);

$this->Js->buffer('$(".form-error").addClass("is-invalid")');
if($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}

?>