# Gerrymcdonnell/Changelogs plugin for CakePHP 3

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require gerrymcdonnell/changelogs:dev-master
```

Step 2:
##Load Plugin 
Add to your Cakephp3 bootstrap file;

```
Plugin::load('Gerrymcdonnell/Changelogs', ['bootstrap' => true, 'routes' => true]);
```

Step 3:
## Create the database tables
import "dbtables.sql"

run this SQL;
-- --------------------------------------------------------

--
-- Table structure for table `changelogs`
--

CREATE TABLE `changelogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `changelogscategories_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `priority` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `changelogs_categories`
--

CREATE TABLE `changelogs_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


//Categories
INSERT INTO `changelogs_categories` (`id`, `title`, `created`, `modified`) VALUES
(0, 'Changelog', '2016-04-11 17:13:46', '2016-04-11 17:13:46'),
(1, 'Idea', '2016-04-10 21:11:29', '2016-04-10 21:11:29'),
(2, 'Bug', '2016-04-10 21:11:35', '2016-04-10 21:11:35'),
(3, 'To Do', '2016-04-10 21:11:41', '2016-04-10 21:11:41'),
(4, 'Article', '2016-04-15 17:52:34', '2016-05-04 13:14:41'),
(5, 'Plugins', '2016-05-07 20:48:47', '2016-06-04 20:36:29'),
(6, 'Project', '2016-06-11 10:34:56', '2016-06-11 10:34:56');


##View it
http://localhost/yourcakephpapp/gerrymcdonnell/changelogs/changelogs/
