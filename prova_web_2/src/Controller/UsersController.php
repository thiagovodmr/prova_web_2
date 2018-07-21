<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function isMonitor($user){
        $conn = ConnectionManager::get('default');
        $sqlMonitors = "
        SELECT * 
        from monitors as m inner join users as u
        on m.user_id = u.id
        where m.user_id = ".$user["id"];
        
        
        $stmt = $conn->execute($sqlMonitors);
        $monitors = $stmt->fetchAll('assoc');

        return (count($monitors) > 0);
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'logout']);
    }

    public function login()
    {

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

                if(!$this->isMonitor($user)){
                    return $this->redirect($this->Auth->redirectUrl());
                    
                }else{
                    return $this->redirect(
                        [
                            "controller"=>"MonitorsStudents",
                            "action"=>"index"
                        ]);
                }

            }
            $this->Flash->error(__('Usuário inválido, tente novamente'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Monitors', 'Students']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        
        $monitorsModel = $this->loadModel('Monitors');
        $monitor = $monitorsModel->newEntity();

        $estudantesModel = $this->loadModel('Students');
        $estudante = $estudantesModel->newEntity();

        if ($this->request->is('post')) {

            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                if($this->request->getData("role") == "Student"){
                    $estudante["user_id"] = $user->id;
                    if($estudantesModel->save($estudante)){

                        $this->Flash->success(__('Aluno Salvo com sucesso.'));
                    }else{
                        $this->Flash->error(__('Aluno não pode ser salvo, tente novamente por favor.'));
                        $this->Users->delete($user); 
                    }
                } 
                else{
                    $monitor["disciplina"] = $this->request->getData("disciplina");
                    $monitor["user_id"] = $user->id;
                    if($monitorsModel->save($monitor)){
                        $this->Flash->success(__('Monitor salvo com sucesso.'));  
                    }else{
                        $this->Flash->error(__('Monitor não pode ser salvo, tente novamente por favor.'));
                        $this->Users->delete($user);            
                    }
                }


                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
