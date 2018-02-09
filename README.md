# Gerrymcdonnell/Changelog plugin for CakePHP 3.x

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require Gerrymcdonnell/Changelog:dev-master
```
Add to bootstrap to load plugin;

```
Plugin::load('Gerrymcdonnell/Changelog', ['bootstrap' => true, 'routes' => true]);
```

To view this plugin your cakephp application;
http://localhost/[YOURCAKEAPPDIR]/gerrymcdonnell/changelog/changelogs


to create the required database tables run the migration file "20180209154356_CreateChangelogs.php" which is in the config/migrations folder by typing the following in your commnad prompt

Migrate:
cake migrations migrate

Rollback:
cake migrations rollback

```
