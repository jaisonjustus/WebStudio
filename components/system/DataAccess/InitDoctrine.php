<?php

use Doctrine\ORM\EntityManager,
    Doctrine\ORM\Configuration;
    
$applicationMode = "development";
if ($applicationMode == "development") {
    $cache = new \Doctrine\Common\Cache\ArrayCache;
} else {
    $cache = new \Doctrine\Common\Cache\ApcCache;
}

$config = new Configuration;
$config->setMetadataCacheImpl($cache);
$driverImpl = $config->newDefaultAnnotationDriver( __SITE_PATH . '/app/model/entities');
$config->setMetadataDriverImpl($driverImpl);
$config->setQueryCacheImpl($cache);
$config->setProxyDir( __SITE_PATH . '/app/model/proxies');
$config->setProxyNamespace('Hawk\Proxies');

if ($applicationMode == "development") {
    $config->setAutoGenerateProxyClasses(true);
} else {
    $config->setAutoGenerateProxyClasses(false);
}

$connectionOptions = array(
    'driver'   => 'pdo_mysql',
    'path'     => '127.0.0.1',
    'dbname'   => 'ce',
    'user'     => 'root',
    'password' => 'root'
);

return EntityManager::create($connectionOptions, $config);

?>
