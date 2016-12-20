<?php
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;

Configure::write('plugin_name', 'Gerry Mc Donnells Changelogs Cakephp3 Plugin');
Configure::write('ver', '0.4 20/12/2016');
Configure::write('website', 'http://www.irishbloke.net');
Configure::write('git_website', '');

Configure::write('priority',[
0=>'Low',
1=>'Medium',
2=>'High',
3=>'Critical'
]);

Configure::write('status',[
0=>'Open', 
1=>'Closed'
]);


//*************************************************************************
//options
//*************************************************************************


//show descrption under the title of the log
Configure::write('show_description', true);

//truncate decs textdomain
Configure::write('show_description_truncate',false);
?>