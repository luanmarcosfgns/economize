<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;



/**
 * Listas Controller
 *
 * @property \App\Model\Table\ListasTable $Listas
 * @method \App\Model\Entity\Lista[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ListasController extends AppController
{
    private function ismy($id) {
	$connection = ConnectionManager::get('default');
	$resultado=$connection->execute("SELECT 1 FROM `listas` where id= :id and user_id= :user",[':id'=>$id,':user'=>$_SESSION['Auth']['id']])->fetch()[0];
	
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
        $listas = $this->paginate($this->Listas,['conditions'=>['Listas.user_id='.$_SESSION['Auth']['id']]]);

        $this->set(compact('listas'));

    
    }

    /**
     * View method
     *
     * @param string|null $id Lista id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lista = $this->Listas->get($id, [
            'contain' => ['Produtos'],
        ]);

        $this->set(compact('lista'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lista = $this->Listas->newEmptyEntity();
        if ($this->request->is('post')) {
	    $data=$this->request->getData();
	    $data['user_id']=$_SESSION['Auth']['id'];
            $lista = $this->Listas->patchEntity($lista, $data);
            if ($this->Listas->save($lista)) {
                $this->Flash->success(__('Salvo'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro'));
        }
        $this->set(compact('lista'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lista id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {	
	if($this->ismy($id)==1){
	
	
        $lista = $this->Listas->get($id, [
            'contain' => [],
        ]);
	
        if ($this->request->is(['patch', 'post', 'put'])) {
	     $data=$this->request->getData();
	    $$data['user_id']=$_SESSION['Auth']['id'];
            $lista = $this->Listas->patchEntity($lista, $data);
            if ($this->Listas->save($lista)) {
                $this->Flash->success(__('Salvo'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro'));
        }
        $this->set(compact('lista'));
	}else{
	   
	    return $this->redirect(['controller'=>"/",'action'=>'']);
	}
    }

    /**
     * Delete method
     *
     * @param string|null $id Lista id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lista = $this->Listas->get($id);
        if ($this->Listas->delete($lista)) {
            $this->Flash->success(__('Apagado'));
        } else {
            $this->Flash->error(__('Erro'));
        }

        return $this->redirect(['action' => 'index' ]);
    }
}
