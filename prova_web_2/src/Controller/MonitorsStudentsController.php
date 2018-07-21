<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
/**
 * MonitorsStudents Controller
 *
 * @property \App\Model\Table\MonitorsStudentsTable $MonitorsStudents
 *
 * @method \App\Model\Entity\MonitorsStudent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MonitorsStudentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'add']);
    }

    public function index()
    {
        

        $this->paginate = [
            'contain' => ['Monitors', 'Students']
        ];
        $monitorsStudents = $this->paginate($this->MonitorsStudents);

        $this->set(compact('monitorsStudents'));
    }

    /**
     * View method
     *
     * @param string|null $id Monitors Student id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $monitorsStudent = $this->MonitorsStudents->get($id, [
            'contain' => ['Monitors', 'Students']
        ]);

        $this->set('monitorsStudent', $monitorsStudent);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $monitorsStudent = $this->MonitorsStudents->newEntity();
        if ($this->request->is('post')) {
            $monitorsStudent = $this->MonitorsStudents->patchEntity($monitorsStudent, $this->request->getData());

            if ($this->MonitorsStudents->save($monitorsStudent)) {
                $this->Flash->success(__('The monitors student has been saved.'));

                return $this->redirect(['action' => 'index']);
            }else{

                $this->Flash->error(__('The monitors student could not be saved. Please, try again.'));
            }
        }
        
        $conn = ConnectionManager::get('default');
        $sqlMonitors = "
                SELECT m.id, u.name 
                from monitors as m inner join users as u
                on m.user_id = u.id
                ";
        $sqlEstudantes = "
                SELECT e.id, u.name 
                from students as e inner join users as u
                on e.user_id = u.id
                ";
        

        $stmt = $conn->execute($sqlMonitors);
        $stmt2 = $conn->execute($sqlEstudantes);

        $monitors = $stmt->fetchAll('assoc');
        $students = $stmt2->fetchAll('assoc');

        // $students = $this->MonitorsStudents->Students->find('list', ['limit' => 200]);
        
        // $monitors = $this->MonitorsStudents->Monitors->find('list', ['limit' => 200]);
        $this->set(compact('monitorsStudent', 'monitors', 'students'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Monitors Student id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $monitorsStudent = $this->MonitorsStudents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $monitorsStudent = $this->MonitorsStudents->patchEntity($monitorsStudent, $this->request->getData());
            if ($this->MonitorsStudents->save($monitorsStudent)) {
                $this->Flash->success(__('The monitors student has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The monitors student could not be saved. Please, try again.'));
        }
        $monitors = $this->MonitorsStudents->Monitors->find('list', ['limit' => 200]);
        $students = $this->MonitorsStudents->Students->find('list', ['limit' => 200]);
        $this->set(compact('monitorsStudent', 'monitors', 'students'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Monitors Student id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $monitorsStudent = $this->MonitorsStudents->get($id);
        if ($this->MonitorsStudents->delete($monitorsStudent)) {
            $this->Flash->success(__('The monitors student has been deleted.'));
        } else {
            $this->Flash->error(__('The monitors student could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
