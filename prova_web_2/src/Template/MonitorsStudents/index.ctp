<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MonitorsStudent[]|\Cake\Collection\CollectionInterface $monitorsStudents
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Monitors Student'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Monitors'), ['controller' => 'Monitors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Monitor'), ['controller' => 'Monitors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="monitorsStudents index large-9 medium-8 columns content">
    <h3><?= __('Horários Agendados') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('monitor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('student_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dateTimeStart') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dateTimeEnd') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($monitorsStudents as $monitorsStudent): ?>
            <tr>
                <td><?= $this->Number->format($monitorsStudent->id) ?></td>
                <td><?= $monitorsStudent->has('monitor') ? $this->Html->link($monitorsStudent->monitor->id, ['controller' => 'Monitors', 'action' => 'view', $monitorsStudent->monitor->id]) : '' ?></td>
                <td><?= $monitorsStudent->has('student') ? $this->Html->link($monitorsStudent->student->id, ['controller' => 'Students', 'action' => 'view', $monitorsStudent->student->id]) : '' ?></td>
                <td><?= h($monitorsStudent->dateTimeStart) ?></td>
                <td><?= h($monitorsStudent->dateTimeEnd) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $monitorsStudent->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $monitorsStudent->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $monitorsStudent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $monitorsStudent->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
