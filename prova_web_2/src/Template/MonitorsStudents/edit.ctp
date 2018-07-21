<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MonitorsStudent $monitorsStudent
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $monitorsStudent->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $monitorsStudent->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Monitors Students'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Monitors'), ['controller' => 'Monitors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Monitor'), ['controller' => 'Monitors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="monitorsStudents form large-9 medium-8 columns content">
    <?= $this->Form->create($monitorsStudent) ?>
    <fieldset>
        <legend><?= __('Edit Monitors Student') ?></legend>
        <?php
            echo $this->Form->control('monitor_id', ['options' => $monitors]);
            echo $this->Form->control('student_id', ['options' => $students]);
            echo $this->Form->control('dateTimeStart');
            echo $this->Form->control('dateTimeEnd');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
