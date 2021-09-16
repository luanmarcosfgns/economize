<div class="users form content" style="max-width: 371px;">
    
    <h3>Login</h3>
    <?= $this->Form->create() ?>
    <fieldset>       
        <?= $this->Form->control('username', ['required' => true,'label'=>'Email','type'=>'email']) ?>
        <?= $this->Form->control('password', ['required' => true]) ?>
    </fieldset>
    <?= $this->Form->submit(__('Login')); ?>
    <?= $this->Form->end() ?>

    <?= $this->Html->link("Não Tem login? Cadastre-se", ['action' => 'add']) ?>
</div>