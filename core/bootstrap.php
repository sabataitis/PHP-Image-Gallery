<?php

use Core\App;
use Core\Database\{QueryBuilder, Connection};

// show errors
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Set sessions
if(!isset($_SESSION)) {
    session_start();
}

App::bind('document_root', dirname($_SERVER['DOCUMENT_ROOT'], 1));
App::bind('config',require('database/Config.php'));

require_once('database/Connection.php');
require_once('database/QueryBuilder.php');

$config = App::get('config');

App::bind('database', new QueryBuilder(
    \Core\Database\Connection::connect($config['database'])
));

