<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Preco $preco
 */
$mercado_id= trim(substr($_SERVER["REQUEST_URI"], strripos($_SERVER["REQUEST_URI"],'/' )+1));
?>
<div class="row">
 
    <div class="column-responsive column-80">
        <div class="precos form content">
            <?= $this->Form->create($preco) ?>
            <fieldset>
                <h3><?= __('Editar Preço') ?></h3>
                 <?= $this->Html->link(__('Voltar'), ['action' => 'index',$mercado_id], ['class' => 'button float-right']) ?>
                <?php
                    echo $this->Form->control('preco',[ 'label'=>'preço']);
                    echo $this->Form->control('produto_id', ['options' => $produtos],['limit'=>2000]);
                    echo $this->Form->control('mercado_id', ['type' => 'hidden','value'=>$mercado_id]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salvar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
