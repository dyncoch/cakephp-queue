<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

$this->Html->css('fix', ['block' => true]);
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create(null) ?>
            <fieldset>
                <legend><?= __('Notify User') ?></legend>
                <?php
                echo $this->Form->control('subject');
                echo $this->Form->control('body');

                echo $this->Form->button(__('Notify'));

                $this->Form->setTemplates([
                    'checkboxWrapper' => '<div class="checkbox fix">{{label}}</div>',
                ]);

                echo $this->Form->control(
                    'users',
                    ['options' => $users, 'multiple' => 'checkbox']
                );

                $this->Form->setTemplates([
                    'checkboxWrapper' => '<div class="checkbox">{{label}}</div>',
                ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Notify')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>