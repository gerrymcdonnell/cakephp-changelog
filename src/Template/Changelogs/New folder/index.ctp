<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Changelog'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Changelog Categories'), ['controller' => 'ChangelogCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Changelog Category'), ['controller' => 'ChangelogCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="changelogs index large-9 medium-8 columns content">
    <h3><?= __('Changelogs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('changelog_category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('priority') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($changelogs as $changelog): ?>
            <tr>
                <td><?= $this->Number->format($changelog->id) ?></td>
                <td><?= h($changelog->title) ?></td>
                <td><?= $changelog->has('changelog_category') ? $this->Html->link($changelog->changelog_category->title, ['controller' => 'ChangelogCategories', 'action' => 'view', $changelog->changelog_category->id]) : '' ?></td>
                <td><?= $this->Number->format($changelog->priority) ?></td>
                <td><?= h($changelog->url) ?></td>
                <td><?= $this->Number->format($changelog->status) ?></td>
                <td><?= $changelog->has('user') ? $this->Html->link($changelog->user->id, ['controller' => 'Users', 'action' => 'view', $changelog->user->id]) : '' ?></td>
                <td><?= h($changelog->created) ?></td>
                <td><?= h($changelog->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $changelog->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $changelog->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $changelog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $changelog->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
