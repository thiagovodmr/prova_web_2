<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
$loguser = $this->request->getSession()->read("Auth.User");
$title = "Portal de Monitoria";
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $title ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
             <?php if ($loguser): ?>

                <li>
                    <?= $this->Html->Link('Bem vindo '.explode(" ",$loguser['name'])[0],['controller'=>'users','action'=>'view',$loguser["id"]]) ?>
                </li>

                <li>
                    <?= $this->Html->link('Sair',['controller' => 'Users', 'action' => 'logout']) ?>
                </li>
            <?php else: ?>
                <li>
                    <?= $this->Html->Link("Cadastre-se",['controller'=>'users','action'=>'add']) ?>
                </li>
                <li>
                    <?= $this->Html->Link('Login',['controller'=>'users','action'=>'login']) ?>
                </li>
            <?php endif ?> 
        </ul>
    </div>
</nav>
<?= $this->Flash->render() ?>
<div class="container clearfix">
    <?= $this->fetch('content') ?>
</div>
<footer>
</footer>
</body>
</html>