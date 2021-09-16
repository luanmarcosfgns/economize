<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lista[]|\Cake\Collection\CollectionInterface $listas
 */
?>
<div class="listas index content">
    <?= $this->Html->link(__('Nova Lista'), ['action' => 'add'], ['class' => 'button float-left']) ?>
    <?= $this->Html->link(__('Voltar'), ['controller'=>'/','action' => ''], ['class' => 'button float-right']) ?>
   <center> <h3><?= __('Listas') ?></h3></center>
    <div class="table-responsive">
        <table class="tabela">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('created',['label'=>'Criado']) ?></th>
                    <th><?= $this->Paginator->sort('modified',['label'=>'Modificado']) ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listas as $lista): ?>
                <tr>
                    <td data-label="ID"><?= $this->Number->format($lista->id) ?></td>
                    <td data-label="Nome"><?= h($lista->nome) ?></td>
                    <td data-label="Criado"><?= h($lista->created) ?></td>
                    <td data-label="Modificado"><?= h($lista->modified) ?></td>
                    <td data-label="Ações" class="actions">
                        <?= $this->Html->link(__('Produtos'), ['controller' => 'produtos','action' => 'index', $lista->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $lista->id]) ?>
                        <?= $this->Form->postLink(__('Apagar'), ['action' => 'delete', $lista->id], ['confirm' => __('Deseja mesmo apagar a linha # {0}?', $lista->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primeiro')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Próximo') . ' >') ?>
            <?= $this->Paginator->last(__('Ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Pagina {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} no total.')) ?></p>
    </div>
</div>
