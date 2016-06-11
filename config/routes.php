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


/**
	or to access 
	websiteroot/logs or websiteroot/changelogs
**/

/*
Router::connect('/logs', 
    array('plugin' => 'Gerrymcdonnell/Changelogs','controller' => 'changelogs', 'action' => 'index')
);


Router::connect('/changelogs', 
    array('plugin' => 'Gerrymcdonnell/Changelogs','controller' => 'changelogs', 'action' => 'index')
);
*/
	

