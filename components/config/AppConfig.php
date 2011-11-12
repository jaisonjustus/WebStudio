<?php

return array(
    'APP_INFO' => array(
        'AppName' => 'Collection Exchange',
        'ServerName' => 'http://localhost/hawkgc/',
        'Owner' => 'Jaison Justus',
        'Email' => 'info@collectionexchange.com'
    ),
    
    'APP_MEDIA' => array(
        'images' => 'media/images/',
        'scripts' => 'media/scripts/',
        'styles' => 'media/styles/',
    ),
    
    'APP_DB_INFO' => array(
        'DbServerName' => 'localhost',
        'DbUserName' => 'root',
        'DbPassCode' => 'root',
        'DbSchema' => 'ce',
        /**
         * Access Methods are ORM, SQL or BOTH
         */
        'AccessMethod' => 'ORM', 
    ),
    
    'APP_MODULES' => array(
        'blogModule'
    ),
    
    'APP_VENDOR_REGISTRY' => array(
        'template' => array('raintpl',),
        'orm' => array('redbean','doctrine'),
    ),
    
);

?>
