<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Preco $preco
 */

?>
<div class="row">
   
    <div class="column-responsive column-80">
        <div class="precos form content">
            <?= $this->Form->create() ?>
            <fieldset>
                <legend><?= __('Gerar Lista') ?></legend>
                 <?= $this->Html->link(__('Voltar'), ['controller'=>'/','action' => ''], ['class' => 'button float-right']) ?>
                <?php
                    echo $this->Form->control('datainicio',[ 'label'=>'Data de Inicio','type'=>'datetime']);
                    echo $this->Form->control('datafinal',[ 'label'=>'Data Final','type'=>'datetime']);
                    echo $this->Form->control('lista_id',[ 'label'=>'Lista','options'=> $_SESSION['lista']]);
                    
                   
                ?>
            </fieldset>
            <?= $this->Form->button(__('Pesquisar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

