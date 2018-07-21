<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Monitors'), ['controller' => 'Monitors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Monitor'), ['controller' => 'Monitors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Monitors') ?></h4>
        <?php if (!empty($user->monitors)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Disciplina') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->monitors as $monitors): ?>
            <tr>
                <td><?= h($monitors->id) ?></td>
                <td><?= h($monitors->user_id) ?></td>
                <td><?= h($monitors->disciplina) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Monitors', 'action' => 'view', $monitors->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Monitors', 'action' => 'edit', $monitors->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Monitors', 'action' => 'delete', $monitors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $monitors->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Students') ?></h4>
        <?php if (!empty($user->students)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->students as $students): ?>
            <tr>
                <td><?= h($students->id) ?></td>
                <td><?= h($students->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Students', 'action' => 'view', $students->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Students', 'action' => 'edit', $students->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Students', 'action' => 'delete', $students->id], ['confirm' => __('Are you sure you want to delete # {0}?', $students->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
