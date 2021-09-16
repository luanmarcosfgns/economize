<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lista $lista
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Voltar'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="listas form content">
            <?= $this->Form->create($lista) ?>
            <fieldset>
                <legend><?= __('Adicionar Lista') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('descricao',['label'=>'Descrição']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salvar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
