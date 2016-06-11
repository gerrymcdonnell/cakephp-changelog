# Gerrymcdonnell/Changelogs plugin for CakePHP 3

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require Gerrymcdonnell/Changelogs:dev-master
```

## Create the database tables
import "dbtables.sql"

OR run this SQL;

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



--
-- Table structure for table `changelogs_categories`
--

CREATE TABLE `changelogs_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `changelogs`
--
ALTER TABLE `changelogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `changelogs_categories`
--
ALTER TABLE `changelogs_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `changelogs`
--
ALTER TABLE `changelogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `changelogs_categories`
--
ALTER TABLE `changelogs_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;



##Load Plugin 
Add to your Cakephp3 bootstrap file;

Plugin::load('Gerrymcdonnell/Changelogs', ['bootstrap' => true, 'routes' => true]);

##View it
http://localhost/yourcakephpapp/gerrymcdonnell/changelogs/changelogs
