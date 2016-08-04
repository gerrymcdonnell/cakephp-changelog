<?php
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;

Configure::write('plugin_name', 'Gerry Mc Donnells Changelogs Cakephp3 Plugin');
Configure::write('ver', '0.36 4/aug/2016');
Configure::write('website', 'http://www.irishbloke.net');
Configure::write('github', 'https://github.com/gerrymcdonnell/cakephp-changelogs');

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

//truncate text description
Configure::write('show_description_truncate',false);
?>