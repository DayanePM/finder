<!doctype html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Finder</title>

        <?php 
            echo $this->Html->css('bootstrap.min.css');
            echo $this->Html->css('album.css');
        ?>

    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <?php
                echo $this->Html->link('Animal Finder', '/', array(
                    'class' => 'navbar-brand'
                ))
            ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <?php echo $this->Html->link('Animais encontrados', '/animails/encontrados', array('class' => 'nav-link nav-color-text'));?>                          
                    </li>                                                         
                </ul>
                <?php
                    if (AuthComponent::user('id')) {
                        echo $this->Html->div('btn-group',
                            $this->Form->button('Perfil', array('class' => 'btn btn-secondary dropdown-toggle', 'data-toggle' => 'dropdown')) .
                            $this->Html->div('dropdown-menu dropdown-menu-right',
                                $this->Js->link('Editar Perfil', '/donos/edit/' . AuthComponent::user('id'), array('class' => 'dropdown-item', 'update' => '#content')) .
                                $this->Js->link('Alterar senha', '/donos/alterar_senha/' . AuthComponent::user('id'), array('class' => 'dropdown-item', 'update' => '#content')) .
                                $this->Js->link('Meus animais', '/animals/animals_cadastrados/' . AuthComponent::user('id'), array('class' => 'dropdown-item', 'update' => '#content')) .
                                $this->Html->link('Sair', '/donos/logout', array('class' => 'dropdown-item'))
                            )                            
                        );
                    } else {
                        echo $this->Html->link('Login', '/donos/login', array('class' => 'btn btn-secondary'));                        
                    }                 
                ?>               
            </div>
            
        </nav>

        <main role="main" class="container" background-color="#0d0d0d" id="content">
            <?php
                echo $this->fetch('content');                 
            ?>
        </main>
        <?php 
            echo $this->Html->script('jquery-3.4.1.min.js');
            echo $this->Html->script('bootstrap.bundle.min.js');
            echo $this->Js->writeBuffer();              
        ?>        
    </body>
</html>
