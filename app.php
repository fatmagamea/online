<?php

require_once 'inc/connection.php';
require_once 'classes/Request.php';
require_once 'classes/Session.php';
require_once 'classes/Validation.php';



use Route\online\classes\Request;

use Route\online\classes\Session;
use Route\online\classes\Validation;

$request= new Request;
$session = new Session;
$validation = new Validation;


//session_start();
