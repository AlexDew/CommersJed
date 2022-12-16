<?php
date_default_timezone_set('America/Lima');
error_reporting(E_ALL);
ini_set('ignore_repeated_errors', TRUE);
ini_set('display_errors', FALSE);
ini_set('log_errors', TRUE);
ini_set("error_log", 'debug.log');

// config
require_once 'config/config.php';

// Controllers
require_once 'controllers/template.php';
require_once 'controllers/usuarioController.php';

// Models
require_once 'models/usuarioModel.php';

$app = new Template();