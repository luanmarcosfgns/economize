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
		<?= $_SESSION['Auth']['role']=='ADM'?'<a href="/users/"  class="button float-right">'.'voltar'.'</a></li>':'<a href="economize/"  class="button float-right">'.'voltar'.' </a></li>'?>
                <h3><?= __('Cadastre-se') ?></h3>
		<?php
		
		echo $this->Form->control('password', ['label' => 'Senha','value'=>'']);
		?>
            </fieldset>
	    <?= $this->Form->button(__('salvar')) ?>
	    <?= $this->Form->end() ?>
        </div>
    </div>
</div>
