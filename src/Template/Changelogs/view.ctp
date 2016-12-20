<nav class="large-1 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Changelog'), ['action' => 'edit', $changelog->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Changelog'), ['action' => 'delete', $changelog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $changelog->id)]) ?> </li>
        
        <li><?= $this->Html->link(__('List Changelogs'), ['action' => 'index']) ?> </li>

        
        
</nav>


<div class="changelogs view large-11 medium-10 columns content">
    <h3><?= h($changelog->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($changelog->title) ?></td>
            <td><?= $this->Html->link('Edit Changelog', ['action' => 'edit', $changelog->id]) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $changelog->has('user') ? $this->Html->link($changelog->user->id, ['controller' => 'Users', 'action' => 'view', $changelog->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('url') ?></th>
            <td><?= h($changelog->url) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($changelog->created) ?></td>
        </tr>
    </table>


    <div class="row">
        <h4><?= __('Description') ?></h4>

        <script>
        function test(){
            try{
                $('#codearea').select();
                //document.execCommand("copy");
            }
            catch(e)
            {
                console.log('Error');
            }
        }
        </script>

        <?php

            echo $this->Form->button('Copy to Clipboard', ['type' => 'button','onclick=javascript:test()']);

            //echo $this->Text->autoParagraph($changelog->description);
            echo $this->Form->textarea('notes', [
                'escape' => false,
                'default'=>$changelog->description,
                'rows' => '10', 'cols' => '10',
                'id'=>'codearea',
                'disabled'=>false
                ]);            

        ?>
    </div>


</div>
