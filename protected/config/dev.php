<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'My lovely application',
    'language' => 'en',
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.base.*',
        'application.models.*',
        'application.widgets.base.*',
        'application.components.*',
        'application.controllers.base.*',
        'application.helpers.*'
    ),
    'modules' => array(
         'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'dev',
            'ipFilters' => array('127.0.0.1', '::1'),
        )
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        'matadb' => array(
            'connectionString' => 'mysql:host=37.123.117.163;dbname=manage.qi-interactive.com',
            'emulatePrepare' => true,
            'username' => 'qi',
            'password' => 'CHcxjvLs',
            'charset' => 'utf8',
            'enableParamLogging' => true
        ),
        'db' => array(
            'connectionString' => 'mysql:host=37.123.117.163;dbname=manage.qi-interactive.com',
            'emulatePrepare' => true,
            'username' => 'qi',
            'password' => 'CHcxjvLs',
            'charset' => 'utf8',
            'enableParamLogging' => true
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                /*
              array(
              'class'=>'CWebLogRoute',
              ),
                 * */
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
    // this is used in contact page
    ),
);