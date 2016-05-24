<?php   
	use Cake\Core\Configure;	
	
    /**
        read the text values from the config file.
    **/
	$priority=Configure::read('priority');
	$status=Configure::read('status');		
?>

<nav class="large-1 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions:') ?></li>
        <li>
		
		<?php 
			echo $this->Html->link(__('New Changelog'), ['controller'=>'changelogs','action' => 'add']);
		?>
		</li>
		
        <li><?= $this->Html->link(__('New Category'), ['controller'=>'changelogs-categories','action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Category List'), ['controller'=>'changelogs-categories','action' => 'index']) ?></li>

        
        <hr>Date
        <li><?= $this->Html->link(__('Latest Open'), ['action' => 'getlatest',1]) ?></li>
        <li><?= $this->Html->link(__('Latest Logs'), ['action' => 'getlatest',0]) ?></li>
		<li><?= $this->Html->link(__('Latest Modified-to do'), 'todo') ?></li>
        

        <hr>
        <li><?= $this->Html->link(__('All Changelog'), ['action' => 'index']) ?></li>       


        <hr>Status
        <li><?= $this->Html->link(__('Open Status'), ['action' => 'getstatus',0]) ?></li>
        <li><?= $this->Html->link(__('Closed Status'), ['action' => 'getstatus',1]) ?></li>

        <hr>Priority
        <li><?= $this->Html->link(__('Low Priority'), ['action' => 'getpriority',0]) ?></li>
        <li><?= $this->Html->link(__('Med Priority'), ['action' => 'getpriority',1]) ?></li>
        <li><?= $this->Html->link(__('High Priority'), ['action' => 'getpriority',2]) ?></li>


        <hr>categories         
        <?php
            //Changelogscategories            
            
            foreach ($Changelogscategories as $catagory)
            {                
                echo '<li>';
                echo $this->Html->link(__($catagory['title']), ['action' => 'getcategory',$catagory['id']]);
                echo '</li>';
            }
        ?>

        <hr>Ajax
        <?php
            
            echo '<li>';
            echo $this->Html->link('test clear','javascript:cleartable()');
            echo '</li>';

            echo '<li>';
            echo $this->Html->link('test all','javascript:ajax_getall()');
            echo '</li>';





            
        ?>



    </ul>
</nav>
<div class="changelogs index large-11 medium-8 columns content">


    <h3>
    <?php 
        if (isset($subtitle)){
            echo 'Changelogs: '.$subtitle; 
        }
        else{
            echo 'Changelogs'; 
        }        
    ?>
    </h3>
    <table cellpadding="0" cellspacing="0" id= "changelogs">
        <thead>
            <tr>
                
                <th><?= $this->Paginator->sort('title') ?></th>

                <th><?= $this->Paginator->sort('category') ?></th>
                

                <th><?= $this->Paginator->sort('user_id') ?></th>
				<th><?= $this->Paginator->sort('url') ?></th>
                <th><?= $this->Paginator->sort('priority') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>

                <th><?= $this->Paginator->sort('created') ?></th>
				<th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody id="changelogsbody">

        <?php $i=0; ?>
            <?php foreach ($changelogs as $changelog): ?>
            
            <?php
				//load table row element
				//echo $this->element('changelogs/tablerow');				
				//echo $this->Html->tableCells([['Jul 7th, 2007', 'Best Brownies', 'Yes']]);
			?>
			
			
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
				//created
				$customformat = $changelog->created->i18nFormat('dd-MMMM-YYYY HH:mm');
				echo $customformat;
				//format the created date				
				//echo ($this->Time->format($changelog->created,\IntlDateFormatter::SHORT,null,null));

			?>
			</td>
			
			
			<td>
			<?php
				//modified
				if(is_null($changelog->modified)==false)
					$customformat = $changelog->modified->i18nFormat('dd-MMMM-YYYY HH:mm');
				else
					$customformat="n/a";
					
				echo $customformat;

				

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

<hr>

<div class="paginator">
<?php
	//version info
    echo Configure::read('plugin_name').'_'.Configure::read('ver');
?>
</div>


<script>

function addrow(rowid)
{
    $('#changelogs').append('<tr> <td>title</td> <td>cat</td> <td>user</td> <td>url</td> <td>prioi</td> <td>status </td>  <td>created</td> </tr>');
}

function addnewlogrow(rowid,changelog)
{
    $('#changelogs').append('<tr> <td>'+changelog.title+'</td> <td>'+changelog.changelogscategory.title+'</td> <td>'+changelog.user_id+'</td> <td>'+changelog.url+'</td> <td>'+changelog.priority+'</td> <td>'+changelog.status+'</td>  <td>'+changelog.created+'</td> </tr>');
}


//ajax load all changelogs
function ajax_getall()
{
    var i=0;
     
     jQuery.ajax({
        type:'POST',
        async: true,
        cache: false,
        url: 'index.json',
        success: function(response) {

           console.log(response);
          
           //loop through results
           $.each(response.changelogs, function(key, value) {
                console.log("title:" + value.title);  
                i++;    

                addnewlogrow(i,value);          
            });

           console.log("found "+i + " log");
          
        },
        error: function(response) {
            console.log("error");
        },
    });
}



function cleartable()
{
     $('#changelogsbody').empty();
}

</script>