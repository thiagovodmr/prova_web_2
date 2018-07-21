<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MonitorsStudent $monitorsStudent
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Opções') ?></li>
        <li><?= $this->Html->link(__('List Monitors Students'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Monitors'), ['controller' => 'Monitors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Monitor'), ['controller' => 'Monitors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="monitorsStudents form large-9 medium-8 columns content">
    <?= $this->Form->create($monitorsStudent) ?>
    <fieldset>
        <legend><?= __('Agendar Horários') ?></legend>
        
        <label>Monitor</label>
        <select name="monitor_id">
            <?php foreach ($monitors as $monitor): ?>
                <option value=<?= $monitor["id"] ?>>
                    <?= $monitor["name"] ?>
                </option>
            <?php endforeach ?>
        </select>
        
        <select name="students_id">
            <?php foreach ($students as $student): ?>
                <option value=<?= $student["id"] ?>>
                    <?= $student["name"] ?>
                </option>
            <?php endforeach ?>
        </select>
        

        <?=  $this->Form->control('dateTimeStart',["label"=>"Data e hora de Inicio"]); ?>
        <?=  $this->Form->control('dateTimeEnd',["label"=>"Data e hora de Término"]); ?>

    </fieldset>
    <?= $this->Form->button(__('Agendar')) ?>
    <?= $this->Form->end() ?>
</div>
