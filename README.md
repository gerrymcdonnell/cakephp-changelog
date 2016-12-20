# Gerrymcdonnell/Changelog plugin for CakePHP

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require Gerrymcdonnell/Changelog
```


# Database Structure

--
-- Database: `cakenewsapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `changelogs`
--

CREATE TABLE `changelogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `changelog_category_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `priority` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `changelog_categories`
--

CREATE TABLE `changelog_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `changelog_categories`
--

INSERT INTO `changelog_categories` (`id`, `title`, `created`, `modified`) VALUES
(1, 'Changelog', '2016-04-11 17:13:46', '2016-04-11 17:13:46'),
(2, 'Bug', '2016-04-10 21:11:35', '2016-04-10 21:11:35'),
(3, 'To Do', '2016-04-10 21:11:41', '2016-04-10 21:11:41'),
(4, 'Article', '2016-04-15 17:52:34', '2016-05-04 13:14:41'),
(5, 'Plugins', '2016-05-07 20:48:47', '2016-06-04 20:36:29'),
(6, 'Project', '2016-06-11 10:34:56', '2016-06-11 10:34:56'),
(8, 'Idea', '2016-04-10 21:11:29', '2016-04-10 21:11:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user',
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
-- Indexes for table `changelog_categories`
--
ALTER TABLE `changelog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `changelogs`
--
ALTER TABLE `changelogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `changelog_categories`
--
ALTER TABLE `changelog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
