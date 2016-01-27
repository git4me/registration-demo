# registration-demo

Simple demo of a registration system, including simple client-side (HTML5 only) and server-side validation, enforces unique email addresses and maintains a password blacklist.

## Requirements
* PHP 5.6
* Composer
* MySQL and PDO_MYSQL

## Installation

Extract the software to a web server. User `composer install` to install dependencies, copy `config.dist.php` to `config.php` and change the relevant database settings.

Import the `registration.sql` MySQL dump into your database.

To configure your webserver check out the [Flight documentation](http://flightphp.com/install).