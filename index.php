<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

require 'vendor/autoload.php';

define('APP_ROOT', getcwd());
Flight::set('flight.views.path', APP_ROOT . '/views');

Flight::route('GET /register', function() {
	Flight::render('register', array('body' => 'World'), 'body_content');
	Flight::render('layout/layout');
});

Flight::route('POST /register', function(){
    echo 'I received a POST request.';
});

Flight::route('/', function() {
	Flight::redirect('/register');
});

Flight::start();