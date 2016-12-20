<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $changelogCategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $changelogCategory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Changelog Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Changelogs'), ['controller' => 'Changelogs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Changelog'), ['controller' => 'Changelogs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="changelogCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($changelogCategory) ?>
    <fieldset>
        <legend><?= __('Edit Changelog Category') ?></legend>
        <?php
            echo $this->Form->input('title');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
