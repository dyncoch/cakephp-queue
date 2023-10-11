<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Queue\QueueManager;
use Exception;

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

    public function requeue($id = null)
    {
        $this->request->allowMethod(['post', 'requeue']);

        $failedJobsQuery = $this->QueueFailedJobs->find();

        if ($id !== null) {
            $failedJobsQuery->where(['id' => $id]);
        }

        $failedJobsCount = $failedJobsQuery->count();
        if (!$failedJobsCount) {
            $this->Flash->error(__('No jobs found.'));
            return $this->redirect(['action' => 'index']);
        }

        $jobsToRequeue = $failedJobsQuery->all();

        $succeededCount = 0;
        $failedCount = 0;

        foreach ($jobsToRequeue as $failedJob) {
            $this->log('Requeueing FailedJob with ID ' . $failedJob->id, 'debug');
            try {
                QueueManager::push(
                    [$failedJob->class, $failedJob->method],
                    $failedJob->decoded_data,
                    [
                        'config' => $failedJob->config,
                        'priority' => $failedJob->priority,
                        'queue' => $failedJob->queue,
                    ]
                );

                $this->QueueFailedJobs->deleteOrFail($failedJob);

                $succeededCount++;
            } catch (Exception $e) {
                $this->log("Exception occurred while requeueing FailedJob with ID {$failedJob->id}", 'error');
                $this->log((string)$e, 'error');

                $failedCount++;
            }
        }

        $this->Flash->success(__('Requeued {0} jobs.', $succeededCount));
        $this->Flash->error(__('Failed to requeue {0} jobs.', $failedCount));

        return $this->redirect(['action' => 'index']);
    }
}
