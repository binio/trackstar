<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'Nasze Modlitwy',
    'aliases' => array(
        'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change this if necessary
    ),
    // preloading 'log' component
    'preload'=>array('log'),

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
        'bootstrap.helpers.TbHtml',
    ),

    'modules'=>array(
        // uncomment the following to enable the Gii tool

        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            //'username'=>'admin',
            'password'=>'qwert',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
            //'generatorPaths' => array('bootstrap.gii'),
        ),

        'message' => array(
            //'class'=>'application.modules.MessageModule',
            'userModel' => 'User',
            'getNameMethod' => 'getFullName',
            'getSuggestMethod' => 'getSuggest',
        ),

    ),


    // application components
    'components'=>array(
        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
            'identityCookie'=>'abc123'
        ),
        'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',
        ),
        // uncomment the following to enable URLs in path-format
        'authManager'=>array(
            'class'=>'CDbAuthManager',
            'connectionID'=>'db'
        ),

        'urlManager'=>array(
            'urlFormat'=>'path',
            'rules'=>array(
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                //'mrt/p1/<p1:\w+>/p2/<p2:\w+>/*'=>'site/mypage',
                //'mrt/*'=>'site/mypage',
            ),
        ),

        //'db'=>array(
        //    'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
        //),
        // uncomment the following to use a MySQL database

        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=thomastest2',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'thomas1551',
            //'charset' => 'utf8',
            'enableProfiling' => true,
            'enableParamLogging' => true,
        ),

        'errorHandler'=>array(
            // use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'info, trace, error, warning',
                ),
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'write',
                    'logFile'=>'mrtFile.log'
                ),
                // uncomment the following to show log messages on web pages

                array(
                    'class'=>'CWebLogRoute',
                ),



            ),
        ),
        'mrtfunctions'=>array(
            'class'=>'application.extensions.mrtfunctions.Mrtfunctions',
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
        // this is used in contact page
        'adminEmail'=>'tbiniecki@gmail.com',
        'languages'=>array('en_us'=>'en', 'pl'=>'pl',),
    ),
    //'behaviors'=>array('mrt'=>array('class'=>'ext.behaviors.MrtBehavior')),
);