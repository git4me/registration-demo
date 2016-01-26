<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

// Define app root and start autoloader
define('APP_ROOT', dirname(getcwd()));
require APP_ROOT . '/vendor/autoload.php';

// Set Flight view path param
Flight::set('flight.views.path', APP_ROOT . '/views');

// Register routes for loading registration page
Flight::route('GET /register', array('Register\Controller','getRegister'));
Flight::route('POST /register', array('Register\Controller','postRegister'));

// Default route to redirect to registration page
Flight::route('/', function() {
	Flight::redirect('/register');
});

// Start Flight
Flight::start();