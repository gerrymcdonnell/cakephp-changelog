<?php   
	use Cake\Core\Configure;
	
	$priority=Configure::read('priority');
	$status=Configure::read('status');		
?>

<nav class="large-1 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Changelogs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller'=>'changelogs-categories','action' => 'add']) ?></li>
    </ul>
</nav>
<div class="changelogs form large-11 medium-10 columns content">
    <?= $this->Form->create($changelog) ?>
    <fieldset>
        <legend><?= __('Add Changelog') ?></legend>
        <?php
		
            echo $this->Form->input('title');			
			
			
            //echo $this->Form->label('category', 'category');			
			//using db table
			echo $this->Form->input('changelogscategories_id', ['options' => $changelogscategories]);
			

			//echo $this->Form->select('category', $category);

            echo $this->Form->input('description');
			echo $this->Form->input('url');

            //$options = ['0' => 'Low', '1' => 'Medium','2' => 'High'];

            echo $this->Form->label('priority', 'Priority');
            echo $this->Form->select('priority', $priority);
  

            //$status = ['0' => 'open', '1' => 'closed'];

            echo $this->Form->label('status', 'Status');
            echo $this->Form->select('status', $status);


            //echo $this->Form->input('user_id', ['options' => $users]);

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
