<?php
use Cake\Routing\Router;

//to access websiteroot/gerrymcdonnell/changelogs

Router::plugin(
    'Gerrymcdonnell/Changelogs',
    ['path' => '/gerrymcdonnell/changelogs/'],
    function ($routes) {
        $routes->fallbacks('DashedRoute');
    }	
);


Router::plugin(
    'Gerrymcdonnell/Changelogs',
    ['path' => '/gerrymcdonnell/changelogs/'],
    function ($routes) {
        $routes->fallbacks('DashedRoute');
    }	
);



/*
Router::connect('/logs', 
    array('plugin' => 'Gerrymcdonnell/Changelogs','controller' => 'changelogs', 'action' => 'index')
);


Router::connect('/changelogs', 
    array('plugin' => 'Gerrymcdonnell/Changelogs','controller' => 'changelogs', 'action' => 'index')
);
*/
	

