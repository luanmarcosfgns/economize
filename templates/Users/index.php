<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<h3><?= __('Usuário') ?></h3>
<div class="users index content">
 
    
    <div class="table-responsive">
	  <?= $this->Html->link(__('Novo'), ['action' => 'add'], ['class' => 'button float-left']) ?>   
    <?= $this->Html->link(__('Voltar'), ['controller'=>'/' ,'action' => ''], ['class' => 'button float-right']) ?>
        <table class="tabela">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id',['Identificação']) ?></th>
                    <th><?= $this->Paginator->sort('username',['label'=>'Usuário']) ?></th>
                  
                    <th><?= $this->Paginator->sort('role') ?></th>
                    <th><?= $this->Paginator->sort('created',['label'=>'Criado']) ?></th>
                    <th><?= $this->Paginator->sort('modified',['label'=>'Modificado']) ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td data-label="ID"><?= $this->Number->format($user->id) ?></td>
                    <td data-label="Usuário"><?= h($user->username) ?></td>
                   
                    <td data-label="Role"><?= h($user->role) ?></td>
                    <td data-label="Criado"><?= h($user->created) ?></td>
                    <td data-label="Modificado"><?= h($user->modified) ?></td>
                    <td data-label="Ações" class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Apagar'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
        <p><?= $this->Paginator->counter(__('Pagina {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} no total')) ?></p>
    </div>
</div>
