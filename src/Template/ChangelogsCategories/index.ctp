<nav class="large-1 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
		
		<li><?= $this->Html->link(__('Changelogs'), ['action' => 'index','controller'=>'changelogs']) ?></li>
		<hr>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="changelogsCategories index large-5 columns content">
    <h3><?= __('Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($changelogsCategories as $changelogsCategory): ?>
            <tr>
                <td><?= $this->Number->format($changelogsCategory->id) ?></td>
                <td>
				
				<?php 
					//echo($changelogsCategory->title); 
					echo $this->Html->link($changelogsCategory->title,['action'=>'view',$changelogsCategory->id]);
				?>
				
				</td>
                <td><?= h($changelogsCategory->created) ?></td>
                <td><?= h($changelogsCategory->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $changelogsCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $changelogsCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $changelogsCategory->id)]) ?>
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

<div class="changelogsCategories index large-6 columns content">
</div>