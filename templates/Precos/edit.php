<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Preco $preco
 */
?>
<div class="row">

    <div class="column-responsive column-80">
        <div class="precos form content">
            <?= $this->Form->create($preco) ?>
            <fieldset>
                <legend><?= __('Editar Preço') ?></legend>
                <?= $this->Html->link(__('Voltar'), ['action' => 'index',$preco->mercado_id], ['class' => 'button float-right']) ?>
                <?php
                    echo $this->Form->control('preco',[ 'label'=>'preço']);
                    echo $this->Form->control('produto_id', ['options' => $produtos]);
                    echo $this->Form->control('mercado_id', ['type' => 'hidden']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salvar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
