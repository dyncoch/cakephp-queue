<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * QueueFailedJobs Controller
 *
 * @property \App\Model\Table\QueueFailedJobsTable $QueueFailedJobs
 * @method \App\Model\Entity\QueueFailedJob[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QueueFailedJobsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $queueFailedJobs = $this->paginate($this->QueueFailedJobs);

        $this->set(compact('queueFailedJobs'));
    }

    /**
     * View method
     *
     * @param string|null $id Queue Failed Job id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $queueFailedJob = $this->QueueFailedJobs->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('queueFailedJob'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $queueFailedJob = $this->QueueFailedJobs->newEmptyEntity();
        if ($this->request->is('post')) {
            $queueFailedJob = $this->QueueFailedJobs->patchEntity($queueFailedJob, $this->request->getData());
            if ($this->QueueFailedJobs->save($queueFailedJob)) {
                $this->Flash->success(__('The queue failed job has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The queue failed job could not be saved. Please, try again.'));
        }
        $this->set(compact('queueFailedJob'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Queue Failed Job id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $queueFailedJob = $this->QueueFailedJobs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $queueFailedJob = $this->QueueFailedJobs->patchEntity($queueFailedJob, $this->request->getData());
            if ($this->QueueFailedJobs->save($queueFailedJob)) {
                $this->Flash->success(__('The queue failed job has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The queue failed job could not be saved. Please, try again.'));
        }
        $this->set(compact('queueFailedJob'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Queue Failed Job id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $queueFailedJob = $this->QueueFailedJobs->get($id);
        if ($this->QueueFailedJobs->delete($queueFailedJob)) {
            $this->Flash->success(__('The queue failed job has been deleted.'));
        } else {
            $this->Flash->error(__('The queue failed job could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
