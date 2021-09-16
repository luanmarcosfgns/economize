<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * Precos Controller
 *
 * @property \App\Model\Table\PrecosTable $Precos
 * @method \App\Model\Entity\Preco[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PrecosController extends AppController
{
      private function ismy($id) {
	$connection = ConnectionManager::get('default');
	$resultado=$connection->execute("SELECT 1 FROM `precos` where id= :id and user_id= :user",[':id'=>$id,':user'=>$_SESSION['Auth']['id']])->fetch()[0];
	
	$resultado=$resultado==1?$resultado:0;
	return $resultado;
    }
    /**
     * Index method
     * terminar de implementar aqui 
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($mercado_id,$lista_id=null)
    {
        
          $connection = ConnectionManager::get('default');
	$_SESSION['listas']=$connection->execute("SELECT id,nome FROM `listas`where user_id= :user ",[':user'=>$_SESSION['Auth']['id']])->fetchAll('assoc');
        if($lista_id==null){
       $lista_id=$_SESSION['listas'][0]['id'];
        }
         $existe=$connection->execute("SELECT 1 as existe FROM `listas`where id= :listaid and user_id= :user ",[':user'=>$_SESSION['Auth']['id'],':listaid'=>$lista_id])->fetchAll('assoc')[0]['existe']; 
         if($existe==1)
         {
             $listaprodutos=$connection->execute("SELECT id FROM `produtos`where lista_id=:lista_id and user_id= :user ",[':lista_id'=>$lista_id,':user'=>$_SESSION['Auth']['id']])->fetchAll('assoc');
                	if(!empty($listaprodutos))
                	{
                            $produtos_id='';
                            	foreach($listaprodutos as $rowprodutos){
                            	   $produtos_id=$produtos_id.$rowprodutos['id'].',';
                            	    
                            	}
                            	 $produtos_id=substr(trim($produtos_id),-0,-1);
                                    
                                    $this->paginate = [
                                        'contain' => ['Produtos', 'Mercados'],
                                    ];
                                    
                                
                             
                                    $precos = $this->paginate($this->Precos,['conditions'=>['Precos.mercado_id='.$mercado_id .' and Precos.user_id='.$_SESSION['Auth']['id'].' and Precos.produto_id in ('.$produtos_id.')']]);
                                  
                          
                      
                        }
                        else
                        {
                            
                            $precos = $this->paginate($this->Precos,['conditions'=>['Precos.mercado_id='.$mercado_id .' and Precos.user_id='.$_SESSION['Auth']['id'].' and Precos.produto_id =-1']]);
                           
                        }
                            
                          $this->set(compact('precos'));
      
         }
         else{
               $this->Flash->error(__('Esse estabelecimento não existe'));
             
            
          return $this->redirect(['controller' => 'mercados','action' => 'index']);  
            
             
         }
         
                
    }

    /**
     * View method SELECT produto_id,MIN(preco) as preco ,mercado_id,created,modified,id FROM `precos`  group by produto_id
     *
     * @param string|null $id Preco id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($datainicial,$datafinal,$listaid)
    {

       if($datainicial>$datafinal){
           $this->Flash->error(__('Erro valor de data inicial e maior que a final'));

       }else{
        $connection = ConnectionManager::get('default');
        $results = $connection->execute("SELECT precos.produto_id,MIN(preco) as preco ,precos.mercado_id,precos.created,precos.modified,precos.id FROM `precos` inner join produtos on(produtos.id=precos.produto_id) where precos.created>= :datainicial and precos.created<= :datafinal and produtos.lista_id= :listaid   group by produto_id",[':datainicial'=>$datainicial,':datafinal'=>$datafinal,':listaid'=>$listaid])->fetchAll('assoc');
$in='';

if(!empty( $results)){

        foreach ($results as $key => $value) {

            $in=$value['id'].','.$in;
            # code...
        }
    
$in=substr($in,0,-1);
        $where= ['conditions'=>["Precos.id in (".$in.') and Precos.user_id='.$_SESSION['Auth']['id']] ];
}else{
    
     $where= ['conditions'=>["Precos.id = -1"]];
}
        
       }

        
        $this->paginate = [
            'contain' => ['Produtos', 'Mercados'],
        ];
 

        $precos = $this->paginate($this->Precos,$where);



        $this->set(compact('precos'));
	
       
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($mercado_id)
    {
        $preco = $this->Precos->newEmptyEntity();
        if ($this->request->is('post')) {
	     $data=$this->request->getData();
	    $data['user_id']=$_SESSION['Auth']['id'];
            $preco = $this->Precos->patchEntity($preco, $data);
            if ($this->Precos->save($preco)) {
                $this->Flash->success(__('Salvo'));

                return $this->redirect(['action' => 'index',$mercado_id]);
            }
            $this->Flash->error(__('Erro'));
        }
        $produtos = $this->Precos->Produtos->find('list', ['limit' => 2000]);
        $mercados = $this->Precos->Mercados->find('list', ['limit' => 2000]);
        $this->set(compact('preco', 'produtos', 'mercados'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Preco id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null,$mercado_id)
    {
	if($this->ismy($id)==1){
        $preco = $this->Precos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
	    $data=$this->request->getData();
	    $data['user_id']=$_SESSION['Auth']['id'];
            $preco = $this->Precos->patchEntity($preco, $data);
            if ($this->Precos->save($preco)) {
                $this->Flash->success(__('Salvo'));

                return $this->redirect(['action' => 'index',$mercado_id]);
            }
            $this->Flash->error(__('Erro'));
        }
        $produtos = $this->Precos->Produtos->find('list', ['limit' => 2000]);
        $mercados = $this->Precos->Mercados->find('list', ['limit' => 2000]);
        $this->set(compact('preco', 'produtos', 'mercados'));
	}else{
	   
	    return $this->redirect(['controller'=>"/",'action'=>'']);
	}
    }

    /**
     * Delete method
     *
     * @param string|null $id Preco id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null,$mercado_id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $preco = $this->Precos->get($id);
        if ($this->Precos->delete($preco)) {
            $this->Flash->success(__('Apagado'));
        } else {
            $this->Flash->error(__('Erro'));
        }

        return $this->redirect(['action' => 'index',$mercado_id]);
    }


public function search()
    {
         unset($_SESSION['lista']);
 $connection = ConnectionManager::get('default');
       $lista = $connection->execute('select listas.id,concat(listas.id,"-",listas.nome) as nome from `listas` where user_id= :user',[':user'=>$_SESSION['Auth']['id']])->fetchAll('assoc');
       
       foreach($lista as $row){
           $listaf[$row['id']]=$row['nome'];
          
       }
       $_SESSION['lista']=$listaf;
      
   

  if ($this->request->is('post')) {
           if($this->request->getData('datainicio')<$this->request->getData('datafinal')){
            if (!empty($this->request->getData('datainicio') )and !empty($this->request->getData('datafinal')) ) {
            
        
                    $datainicio=str_replace('T','',str_replace(':','',str_replace('-','', $this->request->getData('datainicio'))));

                    $datafinal=str_replace('T','',str_replace(':','',str_replace('-','', $this->request->getData('datafinal'))));
                    $listaid=$this->request->getData('lista_id');
                

                return $this->redirect('/precos/view/'.$datainicio.'/'.$datafinal.'/'. $listaid);
            }
               
           }else{
            $this->Flash->error(__('Erro'));
        }
        }


    }


}

