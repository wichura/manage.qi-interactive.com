<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Application',
    'defaultController' => 'Home',
    'language' => 'en',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.base.*',
        'application.models.*',
        'application.components.*',
        'application.controllers.base.*',
        'application.widgets.base.*',
        'application.helpers.*'
    ),
    'modules' => array(
        'user' => array(
            'hash' => 'sha1',
            'sendActivationMail' => true,
            'activeAfterRegister' => false,
            'autoLogin' => true
        ),
        'asset' => array(
            "defaultController" => "asset"
        ),
        'qiProject'
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
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                array(
                    'class' => 'CEmailLogRoute',
                    'levels' => 'error, warning',
                    'emails' => 'marcin.wiatr@cms.icodesign.com',
                    'sentFrom' => 'developernotification@icodesign.com',
                    'filter' => 'CLogFilter'
                )
            // uncomment the following to show log messages on web pages
            /**
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