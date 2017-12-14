<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time ;

/**
 * Rooms Controller
 *
 *
 * @method \App\Model\Entity\Room[] paginate($object = null, array $settings = [])
 */
class RoomsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $rooms = $this->paginate($this->Rooms);

        $this->set(compact('rooms'));
        $this->set('_serialize', ['rooms']);
    }

    /**
     * View method
     *
     * @param string|null $id Room id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $room = $this->Rooms->get($id);
    
        $Monday=$this->Rooms->Showtimes
             ->find()
             ->where(['room_id' => $id,
             'start >=' => new Time('monday this week'),
             'start <' => new Time('tuesday this week')])
             ->contain(['Movies']);
             
         $Tuesday=$this->Rooms->Showtimes
             ->find()
             ->where(['room_id' => $id,
             'start >=' => new Time('tuesday this week'),
             'start <' => new Time('wednesday this week')])
             ->contain(['Movies']);
             
         $Wednesday=$this->Rooms->Showtimes
             ->find()
             ->where(['room_id' => $id,
             'start >=' => new Time('wednesday this week'),
             'start <' => new Time('thursday this week')])
             ->contain(['Movies']);
             
         $Thursday=$this->Rooms->Showtimes
             ->find()
             ->where(['room_id' => $id,
             'start >=' => new Time('thursday this week'),
             'start <' => new Time('friday this week')])
             ->contain(['Movies']);
             
         $Friday=$this->Rooms->Showtimes
             ->find()
             ->where(['room_id' => $id,
             'start >=' => new Time('friday this week'),
             'start <' => new Time('saturday this week')])
             ->contain(['Movies']);
             
             
        $Saturday=$this->Rooms->Showtimes
             ->find()
             ->where(['room_id' => $id,
             'start >=' => new Time('saturday this week'),
             'start <' => new Time('sunday this week')])
             ->contain(['Movies']);
             
        $Sunday=$this->Rooms->Showtimes
             ->find()
             ->where(['room_id' => $id,
             'start >=' => new Time('sunday this week'),
             'start <' => new Time('monday next week')])
             ->contain(['Movies']);
         
        $this->set('room', $room);
        if (!empty($Monday))$this->set('Monday', $Monday);
        if (!empty($Tuesday)) $this->set('Tuesday', $Tuesday);
        if (!empty($Wednesday))$this->set('Wednesday', $Wednesday);
        if (!empty($Thursday))$this->set('Thursday', $Thursday);
        if (!empty($Friday)) $this->set('Friday', $Friday);
        if (!empty($Saturday)) $this->set('Saturday', $Saturday);
        if (!empty($Sunday)) $this->set('Sunday', $Sunday);
         
        $this->set('_serialize', ['room']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $room = $this->Rooms->newEntity();
        if ($this->request->is('post')) {
            $room = $this->Rooms->patchEntity($room, $this->request->getData());
            if ($this->Rooms->save($room)) {
                $this->Flash->success(__('The room has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The room could not be saved. Please, try again.'));
        }
        $this->set(compact('room'));
        $this->set('_serialize', ['room']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Room id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $room = $this->Rooms->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $room = $this->Rooms->patchEntity($room, $this->request->getData());
            if ($this->Rooms->save($room)) {
                $this->Flash->success(__('The room has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The room could not be saved. Please, try again.'));
        }
        $this->set(compact('room'));
        $this->set('_serialize', ['room']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Room id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $room = $this->Rooms->get($id);
        if ($this->Rooms->delete($room)) {
            $this->Flash->success(__('The room has been deleted.'));
        } else {
            $this->Flash->error(__('The room could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
