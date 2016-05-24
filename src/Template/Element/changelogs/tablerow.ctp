<?php
	$i++;
	echo '<tr id="changelogrow_'.$i.'">';
	
?>

	<td>
		<?php 
			if($changelog->status==1)
			{
				echo '<strike>';
				echo $this->Html->link($changelog->title,['action'=>'edit',$changelog->id]);
				echo '</strike>';
			}
			else{
				echo $this->Html->link($changelog->title,['action'=>'edit',$changelog->id]);
			}
		?>
	</td>

	<td>
	<?php   
		echo $this->Html->link($changelog->changelogscategory->title,['action'=>'getcategory',$changelog->changelogscategory->id]);
		//echo $changelog->changelogscategory->title;
	?>
	</td>

	<td><?php
			//echo $changelog->has('user') ? $this->Html->link($changelog->user->username, ['controller' => 'Users', 'action' => 'view', $changelog->user->id]) : '';
			//echo $changelog->user->username;
		?>
	</td>



	<td>
	<?php 
		//truncate link
		$link=$this->Text->truncate($changelog->url,30,array('ellipsis' => '..','exact' => false));
		echo $this->Html->link($link,$changelog->url); ?>
	</td>

	<td>

	<?php 
		/**
			colour coded labels for thge priority fields
		**/
		//load the zurb helper from Zurb plugin
		$this->loadHelper('Zurbdemo.Zurb');  

		if($changelog->priority==0){
			$this->Zurb->printLabel('secondary',$priority[$changelog->priority]);
		}
		else if($changelog->priority==1){
			$this->Zurb->printLabel('regular',$priority[$changelog->priority]);
		}
		else if($changelog->priority==2){
			$this->Zurb->printLabel('alert',$priority[$changelog->priority]);
		}
		else{
			echo $priority[$changelog->priority]; 
		}
	?>
	</td>


	<td>
	<?php 

		//colour coded priority status
		if($changelog->status==0){
			$this->Zurb->printLabel('success',$status[$changelog->status]);
		}
		else if($changelog->status==1){
			$this->Zurb->printLabel('regular',$status[$changelog->status]);
		}
		else{
			echo $status[$changelog->status]; 
		}


	   
	?>
	</td>


	<td>
	<?php
		//format the created date
		echo ($this->Time->format($changelog->created, 
		\IntlDateFormatter::SHORT,
		null,
		null
		));

	?>
	</td>



	<td class="actions">
		<?php

			//echo $this->Html->link(__('ajax'), 'javascript:addrow('.$i.')');
			
			echo $this->Html->link(__(' View '), ['action' => 'view', $changelog->id]);
			echo $this->Html->link(__(' Edit '), ['action' => 'edit', $changelog->id]);
			echo $this->Form->postLink(__(' Delete'), ['action' => 'delete', $changelog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $changelog->id)]) 

		?>
	</td>
	</tr>