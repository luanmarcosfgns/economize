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
                <?= $this->Html->link(__('Voltar'), ['action' => 'index',$listaid], ['class' => 'button float-right']) ?>
                <legend><?= __('Adicionar Produto') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('quantidade',['step'=>'.01']);
                    echo $this->Form->control('lista_id',['type'=>'hidden','value'=>$listaid]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salvar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
