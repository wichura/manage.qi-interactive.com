<?php

$application = dirname(__FILE__) . "/mata/components/MataWebApplication.php";

// change the following paths if necessary
$yii = dirname(__FILE__) . '/yii/framework/yii.php';

if (strripos($_SERVER['SERVER_NAME'], "localhost") == true || strrpos($_SERVER['SERVER_NAME'], ".local") == true) {
    $config = dirname(__FILE__) . '/protected/config/dev.php';
    defined('YII_DEBUG') or define('YII_DEBUG', true);
} else {
    $config = dirname(__FILE__) . '/protected/config/prod.php';
}

require_once($yii);
require_once($application);
Yii::createApplication("MataWebApplication", $config)->run();