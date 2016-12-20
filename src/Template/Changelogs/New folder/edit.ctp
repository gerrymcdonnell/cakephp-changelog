<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $changelog->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $changelog->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Changelogs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Changelog Categories'), ['controller' => 'ChangelogCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Changelog Category'), ['controller' => 'ChangelogCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="changelogs form large-9 medium-8 columns content">
    <?= $this->Form->create($changelog) ?>
    <fieldset>
        <legend><?= __('Edit Changelog') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('changelog_category_id', ['options' => $changelogCategories]);
            echo $this->Form->input('description');
            echo $this->Form->input('priority');
            echo $this->Form->input('url');
            echo $this->Form->input('status');
            echo $this->Form->input('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
