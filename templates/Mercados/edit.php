<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mercado $mercado
 */
?>

            
        
<div class="row">
 
    <div class="column-responsive column-80">
        <div class="mercados form content">
            <?= $this->Form->create($mercado) ?>
            <fieldset>
                <legend><?= __('Editar Mercado') ?></legend>
                 <?= $this->Html->link(__('Voltar'), ['action' => 'index'], ['class' => 'button float-right']) ?>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('descricao',['label'=>'descrição']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salvar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

