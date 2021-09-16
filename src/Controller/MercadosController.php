<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;


/**
 * Mercados Controller
 *
 * @property \App\Model\Table\MercadosTable $Mercados
 * @method \App\Model\Entity\Mercado[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MercadosController extends AppController
{
      private function ismy($id) {
	$connection = ConnectionManager::get('default');
	$resultado=$connection->execute("SELECT 1 FROM `mercados` where id= :id and user_id= :user",[':id'=>$id,':user'=>$_SESSION['Auth']['id']])->fetch()[0];
	
	$resultado=$resultado==1?$resultado:0;
	return $resultado;
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $mercados = $this->paginate($this->Mercados,['conditions'=>['`Mercados`.user_id='.$_SESSION['Auth']['id']]]);

        $this->set(compact('mercados'));
                if(strripos($_SERVER["REQUEST_URI"],'index' )==false){

            return $this->redirect(['action' => 'index/']);
        }
    }

    /**
     * View method
     *
     * @param string|null $id Mercado id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    { if($this->ismy($id)==1){
        $mercado = $this->Mercados->get($id, [
            'contain' => ['Precos'],
        ]);

        $this->set(compact('mercado'));
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
        $mercado = $this->Mercados->newEmptyEntity();
        if ($this->request->is('post')) {
	     $data=$this->request->getData();
	    $data['user_id']=$_SESSION['Auth']['id'];
            $mercado = $this->Mercados->patchEntity($mercado, $data);
            if ($this->Mercados->save($mercado)) {
                $this->Flash->success(__('Salvo'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro'));
        }
        $this->set(compact('mercado'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mercado id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
if($this->ismy($id)==1){
        $mercado = $this->Mercados->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
	    $data=$this->request->getData();
	    $$data['user_id']=$_SESSION['Auth']['id'];
	    
            $mercado = $this->Mercados->patchEntity($mercado, $data);
            if ($this->Mercados->save($mercado)) {
                $this->Flash->success(__('Salvo'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro'));
        }
        $this->set(compact('mercado'));
	}else{
	   
	    return $this->redirect(['controller'=>"/",'action'=>'']);
	}
    }

    /**
     * Delete method
     *
     * @param string|null $id Mercado id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mercado = $this->Mercados->get($id);
        if ($this->Mercados->delete($mercado)) {
            $this->Flash->success(__('Apagado'));
        } else {
            $this->Flash->error(__('Erro'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
