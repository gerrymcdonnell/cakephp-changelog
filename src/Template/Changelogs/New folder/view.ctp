<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Changelog'), ['action' => 'edit', $changelog->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Changelog'), ['action' => 'delete', $changelog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $changelog->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Changelogs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Changelog'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Changelog Categories'), ['controller' => 'ChangelogCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Changelog Category'), ['controller' => 'ChangelogCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="changelogs view large-9 medium-8 columns content">
    <h3><?= h($changelog->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($changelog->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Changelog Category') ?></th>
            <td><?= $changelog->has('changelog_category') ? $this->Html->link($changelog->changelog_category->title, ['controller' => 'ChangelogCategories', 'action' => 'view', $changelog->changelog_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($changelog->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $changelog->has('user') ? $this->Html->link($changelog->user->id, ['controller' => 'Users', 'action' => 'view', $changelog->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($changelog->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Priority') ?></th>
            <td><?= $this->Number->format($changelog->priority) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($changelog->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($changelog->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($changelog->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($changelog->description)); ?>
    </div>
</div>
