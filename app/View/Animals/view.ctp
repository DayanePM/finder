<?php
$view = $this->Html->div('col-md-4',
    $this->Html->div('card mb-4 shadow-sm',
        $this->Html->image($animal['Animal']['foto'], array('class' => 'bd-placeholder-img card-img-top'))
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

echo $this->Flash->render('warning'); 
echo $this->Flash->render('success');

echo $this->Html->tag('h1', 'Dados do Animal', array('class' => 'mt-5 invisible'));
echo $this->Html->tag('h1', 'Dados do Animal', array('class' => 'my-5'));
echo $this->Html->div('row', $view);
echo $this->Js->link('Encontrei', '/animals/notificar', array('class' => 'btn btn-success mb-5 mr-3', 'update' => '#content'));
echo $this->Js->link('Voltar', '/', array('class' => 'btn btn-secondary mb-5', 'update' => '#content'));

$this->Js->buffer('$(".form-error").addClass("is-invalid")');
if($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}

?>





