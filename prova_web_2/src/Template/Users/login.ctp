<div class="users form">
	<?= $this->Flash->render('auth') ?>
	<?= $this->Form->create() ?>
	<fieldset>
		<legend><?= __('Por favor, entre com seu usuário e senha:') ?></legend>
		<?= $this->Form->control('username',["label"=>"Login"]) ?>
		<?= $this->Form->control('password') ?>
	</fieldset>
	<?= $this->Form->button(__('Login'),["label"=>"Login"]); ?>
	<?= $this->Form->end() ?>
</div>