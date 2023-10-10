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
            <?= $this->Html->link(__('List Queue Failed Jobs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="queueFailedJobs form content">
            <?= $this->Form->create($queueFailedJob) ?>
            <fieldset>
                <legend><?= __('Add Queue Failed Job') ?></legend>
                <?php
                    echo $this->Form->control('class');
                    echo $this->Form->control('method');
                    echo $this->Form->control('data');
                    echo $this->Form->control('config');
                    echo $this->Form->control('priority');
                    echo $this->Form->control('queue');
                    echo $this->Form->control('exception');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
