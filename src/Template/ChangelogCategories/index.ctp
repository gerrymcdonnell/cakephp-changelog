<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Changelog Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Changelogs'), ['controller' => 'Changelogs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Changelog'), ['controller' => 'Changelogs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="changelogCategories index large-9 medium-8 columns content">
    <h3><?= __('Changelog Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($changelogCategories as $changelogCategory): ?>
            <tr>
                <td><?= $this->Number->format($changelogCategory->id) ?></td>
                <td><?= h($changelogCategory->title) ?></td>
                <td><?= h($changelogCategory->created) ?></td>
                <td><?= h($changelogCategory->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $changelogCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $changelogCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $changelogCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $changelogCategory->id)]) ?>
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
