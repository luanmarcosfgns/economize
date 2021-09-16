<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mercado[]|\Cake\Collection\CollectionInterface $mercados
 */
?>
<div class="mercados index content">
    <?= $this->Html->link(__('Novo Mercado'), ['action' => 'add'], ['class' => 'button float-left']) ?>
    <?= $this->Html->link(__('Voltar'), ['controller'=>'/','action' => ''], ['class' => 'button float-right']) ?>
    <center><h3><?= __('Mercados') ?></h3></center>
    <div class="table-responsive">
        <table class="tabela">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('created',['label'=>'Criado']) ?></th>
                    <th><?= $this->Paginator->sort('modified',['label'=>'Criado']) ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mercados as $mercado): ?>
                <tr>
                    <td data-label="id"><?= $this->Number->format($mercado->id) ?></td>
                    <td data-label="Nome"><?= h($mercado->nome) ?></td>
                    <td  data-label="Criado"><?= h($mercado->created) ?></td>
                    <td  data-label="Modificado"><?= h($mercado->modified) ?></td>
                    <td  data-label="Ações" class="actions">
                        <?= $this->Html->link(__('Preços'), ['controller'=>'precos','action' => 'index', $mercado->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $mercado->id]) ?>
                        <?= $this->Form->postLink(__('Apagar'), ['action' => 'delete', $mercado->id], ['confirm' => __('Deseja mesmo apagar a linha # {0}?', $mercado->id)]) ?>
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
            <?= $this->Paginator->next(__('Proximo') . ' >') ?>
            <?= $this->Paginator->last(__('Ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Pagina {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} no total.')) ?></p>
    </div>
</div>
