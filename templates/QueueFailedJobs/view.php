<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QueueFailedJob $queueFailedJob
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Queue Failed Job'), ['action' => 'edit', $queueFailedJob->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Queue Failed Job'), ['action' => 'delete', $queueFailedJob->id], ['confirm' => __('Are you sure you want to delete # {0}?', $queueFailedJob->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Queue Failed Jobs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Queue Failed Job'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="queueFailedJobs view content">
            <h3><?= h($queueFailedJob->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Class') ?></th>
                    <td><?= h($queueFailedJob->class) ?></td>
                </tr>
                <tr>
                    <th><?= __('Method') ?></th>
                    <td><?= h($queueFailedJob->method) ?></td>
                </tr>
                <tr>
                    <th><?= __('Config') ?></th>
                    <td><?= h($queueFailedJob->config) ?></td>
                </tr>
                <tr>
                    <th><?= __('Priority') ?></th>
                    <td><?= h($queueFailedJob->priority) ?></td>
                </tr>
                <tr>
                    <th><?= __('Queue') ?></th>
                    <td><?= h($queueFailedJob->queue) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($queueFailedJob->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($queueFailedJob->created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Data') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($queueFailedJob->data)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Exception') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($queueFailedJob->exception)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
