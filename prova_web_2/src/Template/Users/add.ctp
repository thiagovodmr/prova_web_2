<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Opções') ?></li>
        <li><?= $this->Html->link(__('Lista de Usuários'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Lista de Monitores'), ['controller' => 'Monitors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Cadastrar Monitor'), ['controller' => 'Monitors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista de Alunos'), ['controller' => 'Students', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Cadastrar Alunos'), ['controller' => 'Students', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Cadastrar usuário') ?></legend>
        
        <label><b>Selecione a opção</b></label>
        <select name="role" id="role">
            <option value="Student">Aluno</option>
            <option value="Monitor">Monitor</option>
        </select>
        
        <?php
            echo $this->Form->control('name',['label'=>"Nome"]);
            echo $this->Form->control('email',['label'=>"E-mail"]);
            echo $this->Form->control('username',['label'=>"Login"]);
            echo $this->Form->control('password',['label'=>"Senha"]);
        ?>
        <div id="divOculta" style="display: none">
            <label><b>Disciplina</b></label>
            <select name="disciplina" id="disciplina">
                <option value="Programação Orientada a Objetos">
                    Programação Orientada a Objetos
                </option>
                <option value="Lógica de programação">
                    Lógica de Programação
                </option>
                <option value="Web2">
                    Web2
                </option>
            </select>  
        </div>

    </fieldset>
    <?= $this->Form->button(__('Cadastrar')) ?>
    <?= $this->Form->end() ?>
</div>

<script>
    var selectRole = document.querySelector("#role");
    selectRole.addEventListener("change",function(event){
        divDisciplina = document.querySelector("#divOculta");
        display = event.target.value == "Student" ? "none":"block";
        divDisciplina.style.display = display; 
    });
</script>