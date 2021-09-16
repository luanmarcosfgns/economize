

<div class="row">
   

    <div class="column-responsive column-80">
        
        <div class="listas form content">
            
           
            <?= $this->Form->create($lista) ?>
             
            <fieldset>
                 <?= $this->Html->link(__('Voltar'), ['action' => 'index'], ['class' => 'button float-right']) ?>
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
