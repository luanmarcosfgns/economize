<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Preco[]|\Cake\Collection\CollectionInterface $precos

 */
$mercado_id= trim(substr($_SERVER["REQUEST_URI"], strripos($_SERVER["REQUEST_URI"],'/' )+1));
?>
<div class="precos index content">
    


     <?= $this->Html->link(__('Voltar'), ['action' => 'search'], ['class' => 'button float-right']) ?>
      <h3><?= __('Preços') ?></h3>
      <button class="compartilhar">Salvar Image</button>
      
   
    <div id="capture" class="table-responsive">

        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('preco') ?></th>
                    <th><?= $this->Paginator->sort('produto_id') ?></th>
                    <th><?= $this->Paginator->sort('mercado_id') ?></th>
                    <th><?= $this->Paginator->sort('created',['label'=>'Criado']) ?></th>
                    <th><?= $this->Paginator->sort('modified',['label'=>'Modificado']) ?></th>
                  
                </tr>
            </thead>
            <tbody>
                <?php foreach ($precos as $preco): ?>
                <tr>
                    <td data-label="id"><?= $this->Number->format($preco->id) ?></td>
                    <td data-label="Preço"><?= 'R$ '. number_format ($preco->preco,2,',','') ?></td>
                    <td data-label="Produto"><?=$preco->produto->nome?></td>
                    <td data-label="Mercado"><?= $preco->mercado->nome?></td>
                    <td data-label="Criado"><?= h($preco->created) ?></td>
                    <td data-label="Modificado"><?= h($preco->modified) ?></td>
                    
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Começo')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Proximo') . ' >') ?>
            <?= $this->Paginator->last(__('Ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Pagina {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} no total.')) ?></p>
    </div>
</div>
<div id="previewImage" style='visibility: hidden;'>
    
</div>
