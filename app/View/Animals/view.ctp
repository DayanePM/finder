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

$this->Js->buffer('$(".form-error").addClass("is-invalid")');
if($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}

?>





