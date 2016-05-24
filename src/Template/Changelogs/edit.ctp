<?php   
	use Cake\Core\Configure;
	
	$category=Configure::read('category');
	$priority=Configure::read('priority');
	$status=Configure::read('status');		
?>

<nav class="large-1 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $changelog->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $changelog->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Changelogs'), ['action' => 'index']) ?></li>

    </ul>
</nav>
<div class="changelogs form large-6 columns content">
    <?= $this->Form->create($changelog) ?>
    <fieldset>
        <legend><?= __('Edit Changelog') ?></legend>
        <?php
            echo $this->Form->input('title');			
			
			
			echo $this->Form->input('changelogscategories_id', ['options' => $changelogscategories,'label'=>'Category']);

            echo $this->Form->textarea('description', ['rows' => '10']);
			echo $this->Form->input('url');


			echo '<div class="changelogs form large-6 medium-6 columns">';			
				echo $this->Form->label('priority', 'Priority');
				echo $this->Form->radio('priority',$priority);		
			echo '</div>';

			
			
			echo '<div class="changelogs small large-6 columns">';
				echo $this->Form->label('status', 'Status');
				echo $this->Form->radio('status',$status);					
			echo '</div>';

            //echo $this->Form->input('user_id', ['options' => $users]);
        ?>
    </fieldset>
	<?= '<div class="changelogs large-2 columns">'?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
	<?= '</div>'?>
</div>
<div class="changelogs form large-5 columns content">
</div>
