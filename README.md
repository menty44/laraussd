# pezeshaTask

###################################################################################
#                    HOW TO RUN THE SOFTWARE                                      #
###################################################################################

*Install xampp (php 7 prefered)

*After installing make sure the user is root with no password

*Run xampp (windows users) on the control panel switch on apache and mysql

*Run xampp (linux users) sudo /opt/lampp/lampp start

*Type on the browser http://localhost/phpmyadmin  or http://127.0.0.1/phpmyadmin

*Create database called bank and import the sql file inside the project in the folder called bankdb or on the
mysql console you can run the below script;

//start script;

create database bank; 

use bank;

-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 07, 2017 at 04:21 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
`id` int(11) NOT NULL,
`type` varchar(255) NOT NULL,
`balance` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
`id` int(10) UNSIGNED NOT NULL,
`name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
`type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
`balance` int(11) NOT NULL,
`notransdep` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
`notranswith` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `type`, `balance`, `notransdep`, `notranswith`, `created_at`, `updated_at`) VALUES
(1, 'Yea', 'debit', 3429, '8', '', '2017-03-02 06:31:34', '2017-03-07 11:27:28'),
(2, 'Yea', 'credit', 5531, '1', '', '2017-03-07 01:23:36', '2017-03-07 12:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
`id` int(10) UNSIGNED NOT NULL,
`migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
`batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_03_06_121518_create_tasks_table', 1),
(4, '2017_03_06_121546_create_accounts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
`email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
`token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
`created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
`id` int(10) UNSIGNED NOT NULL,
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
`id` int(10) UNSIGNED NOT NULL,
`name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
`email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
`password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
`remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
`created_at` timestamp NULL DEFAULT NULL,
`updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
ADD KEY `password_resets_email_index` (`email`),
ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


//end script



*Install composer, installation link is here (https://getcomposer.org/download/)

*Clone the project to your apache root (www or htdocs) for both windows and linux environments

*Open cmd in windows / terminal in linux and cd to the project terminal e.g cd PathToHtdocs/bankapi/bankapi/todo

*Then run in the cmd / terminal while in the project root this command php artisan serve 

*If successful it will display this Laravel development server started on http://127.0.0.1:8000/ (The server is now up and 
running)

*On the browser you can use either of these urls to access the endpoints http://127.0.0.1:8000/   or 
http://localhost/bankapi/bankapi/todo/public/

*If you are using google chrome browser install a plugin called Postman for testing the api endpoints

*If you are using firefox mozilla browser install a plugin called HttpRequester for testing the api endpoints


###################################################################################
#                   ENDPOINTS AVAILABLE FOR TESTING                               #
###################################################################################

*GET http://localhost:8000/api/accounts

*PUT http://localhost:8000/api/deposit/1

*PUT http://localhost:8000/api/deposit/2

*PUT http://localhost:8000/api/withdrawal/1

*PUT http://localhost:8000/api/withdrawal/2

*GET http://localhost:8000/api/balance

*GET http://localhost:8000/api/balancebyid/1

*GET http://localhost:8000/api/balancebyid/2

N.B: for GET methods submit empty requests but for PUT methods please include a body in this format {"balance" : "desired amount"} ,e.g {"balance" : "3400"}

*change the balance amount for various responses as required

#Screenshots for the tests are inside the folder called screenshot

install phpunit and guzzle by issuing these commands on the linux terminal;

composer require phpunit/phpunit 

composer require guzzlehttp/guzzle

composer update


For testing and run this command on the terminal ;

./vendor/bin/phpunit --bootstrap src/Apis.php tests/ApisTest

Screenshot for the api Results is included in the folder called screenshot (tests.png)


