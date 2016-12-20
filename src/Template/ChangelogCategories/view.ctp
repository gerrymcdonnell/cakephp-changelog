<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Changelog Category'), ['action' => 'edit', $changelogCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Changelog Category'), ['action' => 'delete', $changelogCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $changelogCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Changelog Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Changelog Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Changelogs'), ['controller' => 'Changelogs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Changelog'), ['controller' => 'Changelogs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="changelogCategories view large-9 medium-8 columns content">
    <h3><?= h($changelogCategory->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($changelogCategory->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($changelogCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($changelogCategory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($changelogCategory->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Changelogs') ?></h4>
        <?php if (!empty($changelogCategory->changelogs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Changelog Category Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Priority') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($changelogCategory->changelogs as $changelogs): ?>
            <tr>
                <td><?= h($changelogs->id) ?></td>
                <td><?= h($changelogs->title) ?></td>
                <td><?= h($changelogs->changelog_category_id) ?></td>
                <td><?= h($changelogs->description) ?></td>
                <td><?= h($changelogs->priority) ?></td>
                <td><?= h($changelogs->url) ?></td>
                <td><?= h($changelogs->status) ?></td>
                <td><?= h($changelogs->user_id) ?></td>
                <td><?= h($changelogs->created) ?></td>
                <td><?= h($changelogs->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Changelogs', 'action' => 'view', $changelogs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Changelogs', 'action' => 'edit', $changelogs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Changelogs', 'action' => 'delete', $changelogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $changelogs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
