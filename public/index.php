<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

// Define app root and start autoloader
define('APP_ROOT', dirname(getcwd()));
require APP_ROOT . '/vendor/autoload.php';

try {
// Set Flight view path param and config options
Flight::set('flight.views.path', APP_ROOT . '/views');
Flight::set('config', require_once APP_ROOT . '/config.php');
$config = Flight::get('config');

// Register the PDO DB object in Flight
$dbOptions = [
	'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'],
	$config['db']['user'],
	$config['db']['pass']
];
Flight::register('db', 'PDO', $dbOptions, function($db) {
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
});

// Register routes for loading registration page
Flight::route('GET /register', array('Register\Controller', 'getRegister'));
Flight::route('POST /register', array('Register\Controller', 'postRegister'));

// Thanks page
Flight::route('/thanks', array('Register\Controller', 'getThanks'));

// Default route to redirect to registration page
Flight::route('/', function() {
	Flight::redirect('/register');
});

// Start Flight
Flight::start();
} catch(Exception $e) {
	print_R($e);
}