<nav class="large-1 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>       

		
    </ul>
</nav>
<div class="questions view large-11 columns content">
    <h3>
	<?php
		//$this->assign('title', 'your-page-titlexxx');
	?>
	</h3>
    

        <?php
			echo $this->Form->create(null, [
			'url' => ['action' => 'search']
		]);

            echo $this->Form->input('search');
			
			echo $this->Form->button(__('search'));
			echo $this->Form->end();
        ?>
	
	



<h4 id="tables">Search Results <?php 
if(isset($count))
	echo 'Found '.$count.' results';
else
	echo 'Found 0 results';

?>
</h4>

<!--
	table style from http://foundation.zurb.com/sites/docs/v/5.5.3/components/kitchen_sink.html
!-->

<table id="searchresults">
  <thead>
    <tr>
      <th width=50>#</th>
      <th width=600>Title</th> 
    </tr>
	

  </thead>
  <tbody>
  			<?php
			
			use Cake\Utility\Text;
			
			//debug ($questions);
			if(isset($results)){
			
				$i=0;
				foreach ($results as $result)
				{
					
					$i++;
					echo '<tr>';
					echo '<td>';
					echo $i;
					echo '</td>';

					echo '<td>';
					echo $this->Html->link($result['title'],['action'=>'view',$result['id']]);
					echo '</td>';
					echo '</tr>';
					
					echo '<tr>';
					echo '<td></td>';
					echo '<td>';
					echo  Text::wrap($result['description'],10);
					echo '</td>';
					echo '</tr>';
				}
				
			}
			else
			{
				//debug('Found 0 results');
			}

		?>	
  </tbody>
</table>
</div>


