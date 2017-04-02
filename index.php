<?php



// общие настойки
	ini_set('display_errors', 1);
	error_reporting (E_ALL);

// Подключение файлов системы
	define('ROOT', dirname(__FILE__));
	require_once(ROOT.'/Components/router.php');
// установка соединения с БД
	require_once(ROOT.'/Components/Db.php');

// вызов router
$router = new Router();
$router->run();



	
