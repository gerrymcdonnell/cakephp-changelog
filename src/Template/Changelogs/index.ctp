<style>
.side-nav li a:not(.button) {
	display:inline;
}
</style>

<?php   
	use Cake\Core\Configure;	
	
    /**
        read the text values from the config file.
    **/
	$priority=Configure::read('priority');
	$status=Configure::read('status');		
	
	//load css
	echo $this->Html->css('Gerrymcdonnell/Changelogs.style');
?>

<nav class="large-1 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions:') ?></li>
        <li>
		
		<?php 
			echo $this->Html->link(__('New'), ['controller'=>'changelogs','action' => 'add']);
		?>
		</li>
		
        <li><?= $this->Html->link(__('New Category'), ['controller'=>'changelogs-categories','action' => 'add']) ?></li>
		
		<hr>
		<li><?= $this->Html->link(__('All Changelog'), ['action' => 'index']) ?></li>   
        <li><?= $this->Html->link(__('Category List'), ['controller'=>'changelogs-categories','action' => 'index']) ?></li>
		
		<hr>
		<li><?= $this->Html->link(__('search'), ['action' => 'search']) ?></li>   
        
        <hr>Date
        <li><?= $this->Html->link(__('Latest Open'), ['action' => 'getlatest',1]) ?></li>
        <li><?= $this->Html->link(__('Latest Logs'), ['action' => 'getlatest',0]) ?></li>
		<li><?= $this->Html->link(__('Latest Modified'), ['action'=>'getByModified']) ?></li>
        


            


        <hr>Status
        <li><?= $this->Html->link(__('Open'), ['action' => 'getstatus',0]) ?></li>
        <li><?= $this->Html->link(__('Closed'), ['action' => 'getstatus',1]) ?></li>

        <hr>Priority
        <li><?= $this->Html->link(__('Low'), ['action' => 'getpriority',0]) ?></li>
        <li><?= $this->Html->link(__('Med'), ['action' => 'getpriority',1]) ?></li>
        <li><?= $this->Html->link(__('High'), ['action' => 'getpriority',2]) ?></li>
		<li><?= $this->Html->link(__('Critical'), ['action' => 'getpriority',3]) ?></li>

        <hr>Categories         
        <?php
            //Changelogscategories            
            
            foreach ($Changelogscategories as $catagory)
            {                
                echo '<li>';
                echo $this->Html->link(__($catagory['title']), ['action' => 'getcategory',$catagory['id']]);
                echo '</li>';
            }
        ?>

        <hr>Ajax - In Development
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
                
                <th width="500"><?= $this->Paginator->sort('title') ?></th>

                <th width="150"><?= $this->Paginator->sort('category') ?></th>   

				
				<?php
					//user name
					/*
					echo '<th>';
					echo $this->Paginator->sort('user_id');
					echo '</th>';
					*/
				?>
				
				<th><?= $this->Paginator->sort('url') ?></th>
                <th width="100"><?= $this->Paginator->sort('priority') ?></th>
                <th width="100"><?= $this->Paginator->sort('status') ?></th>

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

			<td id="logtitle_<?= $changelog->id ?>">
				<?php 
					if($changelog->status==1)
					{						
						//item is closed
						echo $this->Html->link($changelog->title,['action'=>'edit',$changelog->id],['class'=>'changelogstrike']);						
					}
					else{
						echo $this->Html->link($changelog->title,['action'=>'edit',$changelog->id]);
					}
				?>
			</td>

			
			<td>
			<?php   
				echo $this->Html->link($changelog->changelogscategory->title,['action'=>'getcategory',$changelog->changelogscategory->id]);
			?>
			</td>

			
			<?php
				//Username
				//echo '<td>';
				//echo $changelog->has('user') ? $this->Html->link($changelog->user->username, ['controller' => 'Users', 'action' => 'view', $changelog->user->id]) : '';
				//echo $changelog->user->username;
				//echo '</td>';
			?>
			



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
				$this->loadHelper('Gerrymcdonnell/Changelogs.Zurb');  

				if($changelog->priority==0){
					$this->Zurb->printLabel('secondary',$priority[$changelog->priority]);
				}
				else if($changelog->priority==1){
					$this->Zurb->printLabel('regular',$priority[$changelog->priority]);
				}
				else if($changelog->priority==2){
					$this->Zurb->printLabel('warning',$priority[$changelog->priority]);
				}
				else if($changelog->priority==3){
					$this->Zurb->printLabel('alert',$priority[$changelog->priority]);
				}
				else{
					echo $priority[$changelog->priority]; 
				}
			?>
			</td>

			

			<td id="status_<?=$changelog->id ?>" class="status">
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

<center>
<div>
<?php
	//version info
    echo Configure::read('plugin_name').'_'.Configure::read('ver');
?>
</div>
</center>

<script>

/**
flip the status
**/
$('.status').on('dblclick', function(e) {
	id=$(this).attr('id');
	
	tmp=id.split('_');
	id=tmp[1];	
	
	s=$(this).text().trim();
	
	console.log(s);
	
	if(s=="Open"){		
		status=1;
		$(this).attr('class', '');
		$(this).attr('class', 'label');
		$(this).text('Closed');
		//this is the closed/open label, need to go up an element
		//$(this).attr('class', 'changelogstrike');
		
		$('#logtitle_'+id).attr('class', 'changelogstrike');
	}
	else{
		status=0;
		$(this).attr('class', '');
		$(this).attr('class', 'success label');
		$(this).text('Open');
		//$(this).attr('class', 'changelog');
		
		$('#logtitle_'+id).attr('class', 'changelog');
	}
	
	ajaxeditstatus(id,status);
	
	//$(this).attr('class', 'label');
		
});


function ajaxeditstatus(changelog_id,status){	

	var mydata=new Object();
	mydata.changelog_id=changelog_id;
	mydata.status=status;

		jQuery.ajax({
			type:'POST',
			async: true,
			cache: false,
			data: mydata,
			url: 'changelogs/ajaxedit/'+changelog_id,
			success: function(response) {					
				//success
				console.log(response);                
			},
			error: function(response) {					
				console.log(response);
			}
		});
}









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
        url: 'changelogs/index.json',
        success: function(response) {          
           //loop through results
           $.each(response.changelogs, function(key, value) {
                console.log("title:" + value.title);  
                i++;   

				//add to table
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