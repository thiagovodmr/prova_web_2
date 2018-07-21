<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Student'), ['action' => 'edit', $student->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Student'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Monitors Users'), ['controller' => 'MonitorsUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Monitors User'), ['controller' => 'MonitorsUsers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="students view large-9 medium-8 columns content">
    <h3><?= h($student->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $student->has('user') ? $this->Html->link($student->user->name, ['controller' => 'Users', 'action' => 'view', $student->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($student->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Monitors Users') ?></h4>
        <?php if (!empty($student->monitors_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Student Id') ?></th>
                <th scope="col"><?= __('Monitor Id') ?></th>
                <th scope="col"><?= __('DateTimeStart') ?></th>
                <th scope="col"><?= __('DateTimeEnd') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($student->monitors_users as $monitorsUsers): ?>
            <tr>
                <td><?= h($monitorsUsers->id) ?></td>
                <td><?= h($monitorsUsers->student_id) ?></td>
                <td><?= h($monitorsUsers->monitor_id) ?></td>
                <td><?= h($monitorsUsers->dateTimeStart) ?></td>
                <td><?= h($monitorsUsers->dateTimeEnd) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MonitorsUsers', 'action' => 'view', $monitorsUsers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MonitorsUsers', 'action' => 'edit', $monitorsUsers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MonitorsUsers', 'action' => 'delete', $monitorsUsers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $monitorsUsers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
