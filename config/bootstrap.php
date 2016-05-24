<?php
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;

Configure::write('plugin_name', 'Gmcds Changelogs');
Configure::write('ver', '0.23 14/may/2016');
Configure::write('website', 'http://www.irishbloke.net');
Configure::write('git_website', '');

Configure::write('priority',[
0=>'Low',
1=>'Medium',
2=>'High'
]);

Configure::write('status',[
0=>'Open', 
1=>'Closed'
]);

?>