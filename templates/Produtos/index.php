<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto[]|\Cake\Collection\CollectionInterface $produtos
 */

$listaid= trim(substr($_SERVER["REQUEST_URI"], strripos($_SERVER["REQUEST_URI"],'/' )+1));

$listaid= strstr($listaid,'%')!==false?substr($listaid, 0,strtr($listaid,'%')):$listaid;
?>

<div class="produtos index content">
    <?= $this->Html->link(__('Novo Produto'), ['action' => 'add',$listaid], ['class' => 'button float-left']) ?>

     <?= $this->Html->link(__('Voltar'), ['controller'=>'listas','action' => 'index'], ['class' => 'button float-right']) ?>
    <center><?= __('Produtos') ?></center>
    <div class="table-responsive">
        <table class="tabela">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('quantidade') ?></th>
                    <th><?= $this->Paginator->sort('created',['label'=>'Criado']) ?></th>
                    <th><?= $this->Paginator->sort('modified',['label'=>'Modificar']) ?></th>
                   
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                <tr>
                    <td data-label="ID"><?= $this->Number->format($produto->id) ?></td>
                    <td data-label="Nome"><?= h($produto->nome) ?></td>
                    <td data-label="Quantidade"><?=   number_format ($produto->quantidade,2,',','') ?></td>
                    <td data-label="Criado"><?= h($produto->created) ?></td>
                    <td data-label="Modificado"><?= h($produto->modified) ?></td>
                    
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $produto->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $produto->id]) ?>
                        <?= $this->Form->postLink(__('Apágar'), ['action' => 'delete', $produto->id,$listaid], ['confirm' => __('Deseja mesmo apagar a linha # {0}?', $produto->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Ultimo')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Proximo') . ' >') ?>
            <?= $this->Paginator->last(__('Fim') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Pagina {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} no total.')) ?></p>
    </div>
</div>
