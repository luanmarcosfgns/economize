
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
$listaid= trim(substr($_SERVER["REQUEST_URI"], strripos($_SERVER["REQUEST_URI"],'/' )+1));
?>

<div class="row">
 
    <div class="column-responsive column-80">
        <div class="produtos view content">
            
            <h3><?= h($produto->id) ?></h3>
             <?= $this->Html->link(__('Voltar'), ['action' => 'index',$produto->lista_id], ['class' => 'button float-right']) ?>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($produto->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($produto->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantidade') ?></th>
                    <td><?= $this->Number->format($produto->quantidade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lista Id') ?></th>
                    <td><?= $this->Number->format($produto->lista_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($produto->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($produto->modified) ?></td>
                </tr>
            </table>
            
        </div>
    </div>
</div>
