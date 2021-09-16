<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;


/**
 * Produtos Controller
 *
 * @property \App\Model\Table\ProdutosTable $Produtos
 * @method \App\Model\Entity\Produto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProdutosController extends AppController
{
      private function ismy($id) {
	$connection = ConnectionManager::get('default');
	$resultado=$connection->execute("SELECT 1 FROM `produtos` where id= :id and user_id= :user",[':id'=>$id,':user'=>$_SESSION['Auth']['id']])->fetch()[0];
	
	$resultado=$resultado==1?$resultado:0;
	return $resultado;
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($listaid)
    {
        if(empty($listaid)){
            $this->Flash->error(__('Defina a lista '));


        }else{
	  
        $produtos = $this->paginate($this->Produtos,['conditions'=>['Produtos.lista_id='.$listaid.' and Produtos.user_id='.$_SESSION['Auth']['id'] ]]);

        
    }
    $this->set(compact('produtos'));

    }

    /**
     * View method
     *
     * @param string|null $id Produto id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    { 
	
    if($this->ismy($id)==1){
        $produto = $this->Produtos->get($id, [
            'contain' => ['Precos'],
        ]);

        $this->set(compact('produto'));
	}else{
	   
	    return $this->redirect(['controller'=>"/",'action'=>'']);
	}
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $produto = $this->Produtos->newEmptyEntity();
        if ($this->request->is('post')) {
	    $data=$this->request->getData();
	    $data['user_id']=$_SESSION['Auth']['id'];
            $produto = $this->Produtos->patchEntity($produto, $data);
            if ($this->Produtos->save($produto)) {
                $this->Flash->success(__('Salvo'));

                return $this->redirect(['action' => 'index',$this->request->getData('lista_id')]);
            }
            $this->Flash->error(__('Erro'));
        }
        $this->set(compact('produto'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Produto id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
	if($this->ismy($id)==1){
        $produto = $this->Produtos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
	     $data=$this->request->getData();
	    $$data['user_id']=$_SESSION['Auth']['id'];
            $produto = $this->Produtos->patchEntity($produto, $data);
            if ($this->Produtos->save($produto)) {
                $this->Flash->success(__('Salvo'));

                return $this->redirect(['action' => 'index',$this->request->getData('lista_id')]);
            }
            $this->Flash->error(__('Erro'));
        }
        $this->set(compact('produto'));
	}else{
	   
	    return $this->redirect(['controller'=>"/",'action'=>'']);
	}
	
    }

    /**
     * Delete method
     *
     * @param string|null $id Produto id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null,$listaid)
    {
        $this->request->allowMethod(['post', 'delete']);
        $produto = $this->Produtos->get($id);
        if ($this->Produtos->delete($produto)) {
            $this->Flash->success(__('Apagado'));
        } else {
            $this->Flash->error(__('Erro'));
        }

        return $this->redirect(['action' => 'index',$listaid]);
    }
}
