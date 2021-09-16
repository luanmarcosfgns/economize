<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
  
    <div class="column-responsive column-80">
	
	
        <div class="users form content">
	   
            <?= $this->Form->create($user) ?>
            <fieldset>
		 <?= $this->Html->link(__('Voltar'), ['action' => 'login'], ['class' => 'button float-right']) ?>
                <h3><?= __('Cadastro') ?></h3>
                <?php
                    echo $this->Form->control('username',['label'=>'Email','type'=>'email']);
                    echo $this->Form->control('password',['label'=>'Senha']);
                    
                ?>
            </fieldset>
            <?= $this->Form->button(__('Cadastrar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
