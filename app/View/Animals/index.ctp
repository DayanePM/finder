<?php

$view = '';
foreach ($animals as $animal) {
    $view .= $this->Html->div('col-md-4',
        $this->Html->div('card mb-4 box-shadow',
            $this->Html->image($animal['Animal']['foto'], array('class' => 'card-img-top', 'style' => 'height: 225px; width: 100%; display: block;')) .
            $this->Html->div('card-body',
                $this->Html->para('card-text', 'Nome: ' . $animal['Animal']['nome']) .
                $this->Html->para('card-text', 'Idade: ' . $animal['Animal']['idade']) .
                $this->Html->para('card-text', 'Situação: ' . $animal['Animal']['cidade']) .
                $this->Html->div('d-flex justify-content-between align-items-center',
                    $this->Html->div('btn-group',
                        $this->Js->link('Mais info', '/animals/view/' . $animal['Animal']['id'], array('class' => 'btn btn-outline-secondary', 'update' => '#content')) .
                        $this->Js->link('Encontrei', '/animals/notificar/' . $animal['Animal']['id'], array('class' => 'btn btn-outline-primary', 'update' => '#content'))
                    )
                )
            )
        )
    );
}

$links = array(
    $this->Paginator->first('Primeira', array('class' => 'page-link')),
    $this->Paginator->prev('Anterior', array('class' => 'page-link')),
    $this->Paginator->next('Próxima', array('class' => 'page-link')),
    $this->Paginator->last('Última', array('class' => 'page-link'))
);
$paginate = $this->Html->nestedList($links, array('class' => 'pagination'), array('class' => 'page-item'));
$paginate = $this->Html->tag('nav', $paginate);

$paginateBar = $this->Html->div('row',
    $this->Html->div('col-md-6', $paginate)
);

echo $this->Html->tag('h1', 'Animais Perdidos', array('class' => 'mb-5 invisible'));
echo $this->Flash->render('warning'); 
echo $this->Flash->render('success');
echo $this->Html->tag('h1', 'Animais Perdidos', array('class' => 'my-5'));
echo $this->Html->div('row', $view);

echo $paginateBar;

$this->Js->buffer('$(".form-error").addClass("is-invalid")');
if($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}

?>

