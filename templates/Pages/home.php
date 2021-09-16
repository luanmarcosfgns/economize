<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'Economize$$';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['home','normalize.min', 'component']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    
</head>
<body>

   
        <div class="container">
            <ul id="gn-menu" class="gn-menu-main">
                <li class="gn-trigger">
                    <a class="gn-icon gn-icon-menu"><span>Menu</span></a>
                    <nav class="gn-menu-wrapper">
                        <div class="gn-scroller">
                            <ul class="gn-menu">
                                <li><a href="listas"><?= $this->Html->image('lista.png',['class'=>'icone'])?> Lista de Compras</a></li>
                                <li> <a  href="mercados" class=""> <?= $this->Html->image('mercado.png',['class'=>'icone'])?> Mercados</a></li>
                                <li><a href="precos/search" class=""> <?= $this->Html->image('valor.png',['class'=>'icone'])?> Preços</a></li>
				<li><?= $_SESSION['Auth']['role']=='ADM'?'<a href="users/"  class="">'.$this->Html->image('seguranca.png',['class'=>'icone']).' Users</a></li>':'<a href="users/edit/0"  class="">'.$this->Html->image('seguranca.png',['class'=>'icone']).' Editar senha</a></li>'?>
                                
                               
                                </li>
                            </ul>
                        </div><!-- /gn-scroller -->
                    </nav>
                </li>
                
                <li><a class="codrops-icon codrops-icon-drop" href="/economize/users/logout"><span></span></a></li>
            </ul>
            <header>
               <center></center> <h1 class="welcome">Bem Vindo ao Economize</h1>  </center>
            </header> 
        </div><!-- /container -->
        <?= $this->Html->script(['gnmenu', 'classie']) ?>
         <?= $this->fetch('script') ?>
  
        <script>
            new gnMenu( document.getElementById( 'gn-menu' ) );
           
        </script>
   
   </body>
</html>
