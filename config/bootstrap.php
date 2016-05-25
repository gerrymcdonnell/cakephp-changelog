<?php
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;

Configure::write('plugin_name', 'Gerry Mc Donnells Changelogs Cakephp 3 Plugin');
Configure::write('ver', '0.24 25/may/2016');
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

?>