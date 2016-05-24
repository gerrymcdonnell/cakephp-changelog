# Gerrymcdonnell/Changelogs plugin for CakePHP 3

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require Gerrymcdonnell/Changelogs:dev-master
```

## Create the database tables
import "dbtables.sql"



##Load Plugin 
Add to your Cakephp3 bootstrap file;

Plugin::load('Gerrymcdonnell/Changelogs', ['bootstrap' => false, 'routes' => true]);

##View it
http://localhost/yourcakephpapp/gerrymcdonnell/changelogs