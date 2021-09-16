<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
$listaid= trim(substr($_SERVER["REQUEST_URI"], strripos($_SERVER["REQUEST_URI"],'/' )+1));
?>

<div class="row">

    <div class="column-responsive column-80">
        <div class="produtos form content">
            
            <?= $this->Form->create($produto) ?>
            <fieldset>

                <legend><?= __('Editar Produto') ?></legend>
                 <?= $this->Html->link(__('Voltar'), ['action' => 'index',$produto->lista_id], ['class' => 'button float-right']) ?>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('quantidade',['step'=>'.01']);
                    echo $this->Form->control('lista_id',['type'=>'hidden']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salvar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

