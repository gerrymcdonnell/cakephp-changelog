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


<div class="changelogs form large-6 columns content">
    <?= $this->Form->create($changelog) ?>
    <fieldset>
        <legend><?= __('Add Changelog') ?></legend>
        <?php
		
            echo $this->Form->input('title');			
			
			
			echo $this->Form->input('changelogscategories_id', ['options' => $changelogscategories,'label'=>'Category','default'=>0]);

            //echo $this->Form->input('description');
			echo $this->Form->textarea('description', ['rows' => '10']);
			
			echo $this->Form->input('url');


			echo '<div class="changelogs form large-6 medium-6 columns">';			
				echo $this->Form->label('priority', 'Priority');
				echo $this->Form->radio('priority',$priority,['default'=>1]);		
			echo '</div>';

			
			
			echo '<div class="changelogs small large-6 columns">';
				echo $this->Form->label('status', 'Status');
				echo $this->Form->radio('status',$status,['default'=>0]);					
			echo '</div>';
           
		    //echo $this->request->param('_csrfToken');

        ?>
    </fieldset>
	 <?= '<div class="changelogs large-2 columns">'?>
    <?= $this->Form->button(__('Save')) ?>
    <?= $this->Form->end() ?>
	 <?= '</div>'?>
</div>

<div class="changelogs form large-5 columns content">
</div>
