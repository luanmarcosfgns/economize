<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Preco[]|\Cake\Collection\CollectionInterface $precos

 */

use Cake\Datasource\ConnectionManager;
$connection = ConnectionManager::get('default');

$link=explode('/',$_SERVER["REQUEST_URI"]);
$mercado_id= $link[4];

 $resultado = $connection->execute("select nome from mercados  where id=:id",[':id'=>$mercado_id])->fetchAll('assoc');
 
?>
<div class="precos index content">
    <?= $this->Html->link(__('Novo Preço'), ['action' => 'add',$mercado_id], ['class' => 'button float-left']) ?>


     <?= $this->Html->link(__('Voltar'), ['controller'=>'Mercados','action' => 'index'], ['class' => 'button float-right']) ?>
     <center> <h3><?= $resultado[0]['nome'] ?></h3></center>
     
  <div >
      <select class="filtrolista">
          <?php
        $listas=  $_SESSION['listas'];
          foreach($listas as $row){
              echo "<option value='".$row['id']."'>".$row['nome']."</option>";
          }
          
          ?>
      </select>
  </div>   
   
    <div class="table-responsive">

        <table class="tabela">
            <thead>
                <tr>
                    <th ><?= $this->Paginator->sort('id') ?></th>
                    <th ><?= $this->Paginator->sort('preco',['label'=>'Preço']) ?></th>
                    <th><?= $this->Paginator->sort('produto_id') ?></th>
                   
                    <th><?= $this->Paginator->sort('created',['label'=>'Criado']) ?></th>
                    <th><?= $this->Paginator->sort('modified',['label'=>'Modificado']) ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($precos as $preco): ?>
                <tr>
                    <td data-label="id"><?= $this->Number->format($preco->id) ?></td>
                    <td data-label="Preço"><?=  'R$ '. number_format ($preco->preco,2,',','') ?></td>
                    <td data-label="Produto"><?=$preco->produto->nome ?></td>
                   
                    <td data-label="Criado"><?= h($preco->created) ?></td>
                    <td data-label="Modificado"><?= h($preco->modified) ?></td>
                    <td data-label="Ações" class="actions">
                      
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $preco->id,$preco->mercado_id]) ?>
                        <?= $this->Form->postLink(__('Apagar'), ['action' => 'delete', $preco->id,$preco->mercado_id], ['confirm' => __('Deseja mesmo apagar a linha # {0}?', $preco->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">


<?php
switch (date("m")) {
        case "01":    $mes = 'Janeiro';     break;
        case "02":    $mes = 'Fevereiro';   break;
        case "03":    $mes = 'Março';       break;
        case "04":    $mes = 'Abril';       break;
        case "05":    $mes = 'Maio';        break;
        case "06":    $mes = 'Junho';       break;
        case "07":    $mes = 'Julho';       break;
        case "08":    $mes = 'Agosto';      break;
        case "09":    $mes = 'Setembro';    break;
        case "10":    $mes = 'Outubro';     break;
        case "11":    $mes = 'Novembro';    break;
        case "12":    $mes = 'Dezembro';    break; 
 }
?>
            
            <?= $this->Paginator->first('<< ' . __('Recente')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Proximo') . ' >') ?>
            <?= $this->Paginator->last(__('Ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Pagina {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} no total.')) ?></p>
    </div>
</div>
