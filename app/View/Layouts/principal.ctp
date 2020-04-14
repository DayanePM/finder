<!doctype html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Finder</title>

        <?php 
            echo $this->Html->css('bootstrap.min.css');
            echo $this->Html->css('album.css');
            //echo $this->Html->css('all.css');
        ?>

    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <?php
                echo $this->Html->link('Finder', '/', array(
                    'class' => 'navbar-brand'
                ))
            ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <?php echo $this->Html->link('Doar', '/pets/add', array('class' => 'nav-link nav-color-text'));?>                          
                    </li> 
                    <li class="nav-item">
                        <?php echo $this->Html->link('Adotados', '/pets/adotados', array('class' => 'nav-link nav-color-text'));?>
                    </li> 
                    <li class="nav-item">
                        <?php echo $this->Html->link('Perdidos', '/pets/perdidos', array('class' => 'nav-link nav-color-text'));?>
                    </li>
                    <li class="nav-item">
                        <?php echo $this->Html->link('Ongs', '/usuarios', array('class' => 'nav-link nav-color-text'));?>
                    </li>                                                          
                </ul>
                <?php
                    if (AuthComponent::user('id')) {
                        echo $this->Html->div('dropdown',
                            $this->Form->button('Perfil', array('class' => 'btn btn-secondary dropdown-toggle', 'data-toggle' => 'dropdown')) .
                            $this->Html->div('dropdown-menu dropdown-menu-right',
                                $this->Js->link('Editar Perfil', '/usuarios/edit/' . AuthComponent::user('id'), array('class' => 'dropdown-item', 'update' => '#content')) .
                                $this->Js->link('Meus animais cadastrados', '/pets/meus_pets_cadastrados/' . AuthComponent::user('id'), array('class' => 'dropdown-item', 'update' => '#content')) .
                                $this->Js->link('Meus animais perdidos', '/pets/meus_pets_perdidos/' . AuthComponent::user('id'), array('class' => 'dropdown-item', 'update' => '#content')) .
                                $this->Html->link('Sair', '/usuarios/logout', array('class' => 'dropdown-item'))
                            )                            
                        );
                    } else {
                        echo $this->Html->link('Login', '/usuarios/login', array('class' => 'btn btn-secondary'));                        
                    }                    
                ?>               
            </div>
            
        </nav>

        <main role="main" class="container" background-color="#0d0d0d" id="content">
            <?php 
                echo $this->Flash->render();
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
