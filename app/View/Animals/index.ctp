<?php

$titulo = $this->Html->tag('section',
    $this->Html->div('container-fluid',
        $this->Html->tag('h1', 'Animais Perdidos', array('class' => 'jumbotron-heading'))
    ) .
    $this->Html->para('lead text-muted', 'Ajude um animal a se reencontrar com seu melhor amigo') .
    $this->Html->para('',
       $this->Html->link('Perdi meu animal', '/animals/add', array('class' => 'btn btn-primary my-2 mr-3', 'update' => '#content')) .
       $this->Js->link('Cadastre-se', '/donos/add', array('class' => 'btn btn-secondary my-2', 'update' => '#content'))
    ),
    array('class' => 'jumbotron text-center')
);

$fotos = '';
foreach ($animals as $animal) {
    $fotos .= $this->Html->div('col-md-4',
        $this->Html->div('card mb-4 box-shadow',
            $this->Html->image($animal['Animal']['foto'], array('class' => 'card-img-top', 'style' => 'height: 250px; width: 100%; display: block;')) .
            $this->Html->div('card-body',
                $this->Html->para('card-text', 'Nome: ' . $animal['Animal']['nome']) .
                $this->Html->para('card-text', 'Idade: ' . $animal['Animal']['idade']) .
                $this->Html->para('card-text', 'Situação: ' . $animal['Animal']['cidade']) .
                $this->Html->div('d-flex align-items-center',
                    $this->Js->link('Encontrei', '/comunicados/add/' . $animal['Animal']['id'], array('class' => 'btn btn-outline-secondary btn-block', 'update' => '#content'))
                )
            )
        )
    );
}

$view = $this->Html->div('container',
    $this->Html->div('container-fluid',
        $this->Html->div('row',
            $fotos
        )
    )
);

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

echo $titulo;
echo $this->Flash->render('warning'); 
echo $this->Flash->render('success');
echo $this->Html->div('row', $view);

echo $paginateBar;

$this->Js->buffer('$(".form-error").addClass("is-invalid")');
if($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}

?>

