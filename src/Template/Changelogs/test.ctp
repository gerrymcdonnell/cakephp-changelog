<nav class="large-1 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Changelog'), ['action' => 'edit', $changelog->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Changelog'), ['action' => 'delete', $changelog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $changelog->id)]) ?> </li>
        
        <li><?= $this->Html->link(__('List Changelogs'), ['action' => 'index']) ?> </li>

        
        
</nav>


<div class="changelogs view large-11 medium-10 columns content">
		<?php
			use Cake\Core\Configure;
			echo Configure::read('gerry.test');
			
			$category=Configure::read('category');
			
			echo $category[0];
		?>


</div>
