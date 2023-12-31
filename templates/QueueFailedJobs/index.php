<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\QueueFailedJob> $queueFailedJobs
 */
?>
<div class="queueFailedJobs index content">
    <?= $this->Form->postLink(__('Re-queue all failed jobs'), ['action' => 'requeue'], ['confirm' => __('Are you sure you want to requeue all the jobs?'), 'class' => 'button float-right']) ?>
    <h3><?= __('Queue Failed Jobs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('class') ?></th>
                    <!-- <th><?= $this->Paginator->sort('method') ?></th> -->
                    <th><?= $this->Paginator->sort('config') ?></th>
                    <th><?= $this->Paginator->sort('priority') ?></th>
                    <th><?= $this->Paginator->sort('queue') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('full_name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($queueFailedJobs as $queueFailedJob) : ?>
                    <tr>
                        <td><?= $this->Number->format($queueFailedJob->id) ?></td>
                        <td><?= h($queueFailedJob->class) ?></td>
                        <!-- <td><?= h($queueFailedJob->method) ?></td> -->
                        <td><?= h($queueFailedJob->config) ?></td>
                        <td><?= h($queueFailedJob->priority) ?></td>
                        <td><?= h($queueFailedJob->queue) ?></td>
                        <td><?= h($queueFailedJob->created) ?></td>
                        <td><?= h($queueFailedJob->email) ?></td>
                        <td><?= h($queueFailedJob->full_name) ?></td>
                        <td class="actions">
                            <?= $this->Form->postLink(__('Re-queue'), ['action' => 'requeue', $queueFailedJob->id], ['confirm' => __('Are you sure you want to requeue # {0}?', $queueFailedJob->id)]) ?>
                            <?= $this->Html->link(__('View'), ['action' => 'view', $queueFailedJob->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $queueFailedJob->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $queueFailedJob->id], ['confirm' => __('Are you sure you want to delete # {0}?', $queueFailedJob->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>