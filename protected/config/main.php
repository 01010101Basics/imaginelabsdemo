<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('editable', dirname(__FILE__).'/../extensions/x-editable');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/booster');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'',
	'id' => 'imagine-nation-net-lab1',
	'theme'=>'met',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',	
		'application.components.*',
		'editable.*', //easy include of editable classes
	 	'bootstrap.components.*',
		'application.components.DToggleColumn',
		 'ext.LinkListPager.LinkListPager',
		 'ext.aws.components.*',
		 'application.classes.*',


	),
	'controllerMap'=>array(
          'csv'=>array(
              'class'=>'application.extensions.csv.CsvController',
             /* 'property1'=>'value1',
              'property2'=>'value2',*/
              ),
      
 	),
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Enter Your Password Here',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		*/
		'pdfable'=>array(
            'class'=>'ext.pdfable.pdfable.PdfableModule',
            // Optional: Set path to wkthmltopdf binary
            'bin' => '/usr/bin/wkhtmltopdf',
        ),
        
				'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'yehweh12',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1','13.52.241.93'),
		),
	),

	// application components
	'components'=>array(
		'widgets' => array (
         'CGridView'=>array(
             'cssFile' => '../css/gridview.css',
        ),
         'CDetailView'=>array(
             'cssFile' => '../../css/detailview.css',
        ),
    		
  		),
		'bootstrap' => array(
         				'class' => 'booster.components.Bootstrap',
        ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'clientScript'=>array(
            'packages'=>array(
                'jquery'=>array(
                    'baseUrl'=>'//ajax.googleapis.com/ajax/libs/jquery/1.7.2/',
                    'js'=>array('jquery.min.js'),
                )
            ),
        ),
		
		'ePdf' => array(
        'class'         => 'ext.yii-pdf.EYiiPdf',
        'params'        => array(
            'mpdf'     => array(
                'librarySourcePath' => 'application.vendors.mpdf.*',
                'constants'         => array(
                    '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                ),
				'HTML2PDF' => array(
                    'librarySourcePath' => 'application.vendors.html2pdf.*',
                    'classFile'         => 'html2pdf.php', // For adding to Yii::$classMap
                    'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
                        'orientation' => 'P', // landscape or portrait orientation
                        'format'      => 'A4', // format A4, A5, ...
                        'language'    => 'en', // language: fr, en, it ...
                        'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
                        'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
                        'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
                    )
                )
					),
				),
			   
			),
			
			 'ldap'=>array(
            'class'=>'application.extensions.adLDAP.YiiLDAP',
             // those are standard adLDAP options check http://adldap.sourceforge.net/ for documentation


'options'=> array(
							#for use with ADLDAP Active Directory / OpenLDAP
                            'ad_port'      => 389,
                            'domain_controllers'    => array('10.0.0.24'),

                            'account_suffix' =>  '@domain',
                            'base_dn' => NULL,
                    // for basic functionality this could be a standard, non pr$
                            'admin_username' => 'ldapuser',
                            'admin_password' => 'passw0rd',
            ),
		),
		 /*'urlManager'=>array(
  			'urlFormat'=>'path',

     		 'showScriptName'=>false,
      			'caseSensitive'=>false,
        ),*/
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName' => false, 
		'caseSensitive' => false,	
		'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		), 

		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=127.0.0.1;dbname=dummy',
			'emulatePrepare' => true,
			'username' => 'mysqluser@localhost',
			'password' => '',
			'charset' => 'utf8',
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
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'ken.goddard@cableeng.com',
	),
);
