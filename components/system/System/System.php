<?php

/**
 * Description of System
 *
 * @author jaisonjustus
 */
/**
 * Including Base Libraries
 */
include __SITE_PATH . '/components/system/Registry/' . 'Registry.php';

include __SITE_PATH . '/components/system/Router/' . 'Router.php';

include __SITE_PATH . '/components/system/Controller/' . 'BaseController.php';

include __SITE_PATH . '/components/system/Template/' . 'Template.php';

include __SITE_PATH . '/components/system/Model/' . 'IModel.php';

/**
 * Data Access Library
 */
include __SITE_PATH . '/components/system/DataAccess/' . 'Database.php';

include __SITE_PATH . '/components/system/DataAccess/' . 'Sql.php';

include __SITE_PATH . '/components/system/DataAccess/' . 'Orm.php';

/**
 * Including Configuration Libraries
 */
$CONF = include __SITE_PATH . '/components/config/' . 'AppConfig.php';

include __SITE_PATH . '/components/config/' . 'UrlConfig.php';

$VENDOR = include __SITE_PATH . '/components/vendor/registry.php';

/**
 * Including Third Party Library
 */
foreach ($CONF['APP_VENDOR_REGISTRY'] as $libraries)
{
    foreach ($libraries as $lib)
    {
        if ($lib == 'doctrine')
        {
            include __SITE_PATH . '/components/vendor/' . $VENDOR[$lib];
            $classLoader = new \Doctrine\Common\ClassLoader('Doctrine', __SITE_PATH . '/components/vendor/orm/doctrine2/');
            $classLoader->register();
            
            $entityManager = include __SITE_PATH . '/components/system/DataAccess/' . 'InitDoctrine.php';
        } else
        {
            include __SITE_PATH . '/components/vendor/' . $VENDOR[$lib];
        }
    }
}

/**
 * Defining Base Url and Media URLs
 */
define('__BASE_URL', $CONF['APP_INFO']['ServerName']);
define('__STYLES', __BASE_URL . $CONF['APP_MEDIA']['styles']);
define('__SCRIPTS', __BASE_URL . $CONF['APP_MEDIA']['scripts']);
define('__IMAGES', __BASE_URL . $CONF['APP_MEDIA']['images']);

/**
 * Defining Home Controller
 */
define('__HOME_CONTROLLER', 'homeController');


/**
 * This function handles the autoloading of class files.
 * @param string $className 
 */
function hawkAutoload($className)
{
    $status = TRUE;
    $classNameLength = strlen($className);
    $classDirectory = __SITE_PATH;
    if (substr($className, $classNameLength - 4, $classNameLength) == 'Form')
    {
        $classDirectory .= '/app/model/';
    } else if (substr($className, $classNameLength - 5, $classNameLength) == 'Model')
    {
        $classDirectory .= '/app/model/';
    } else if (substr($className, $classNameLength - 6, $classNameLength) == 'Extend')
    {
        $classDirectory .= '/app/extend/';
    } else if (substr($className, $classNameLength - 7, $classNameLength) == 'Utility')
    {
        $classDirectory .= '/components/utilities/';
    } else if (substr($className, $classNameLength - 6, $classNameLength) == 'Module')
    {
        $classDirectory .= '/components/modules/';
    }
    else
    {
        $classDirectory .= '/app/model/entities/';
    }

    if ($status == TRUE)
    {
        include $classDirectory . $className . '.php';
    }
}

spl_autoload_register('hawkAutoload');

/**
 * Intializing User Url Patterns.
 */
UrlUtility::setUrlRules($urlPatterns);

/**
 * Initializing registry.
 */
$registry = new Registry();

$registry->em = $entityManager;
/**
 * Loading Functional Modules 
 * eg: Blog Module.
 */
foreach ($CONF['APP_MODULES'] as $modules)
{
    $modfile = __SITE_PATH . '/components/modules/' . $modules . '.php';

    if (is_readable($modfile) == true)
    {
        include $modfile;
        $class = $modules;
        $registry->$modules = new $class($registry);
    }
}

/**
 * Loading the Data Access method.
 */
if ($CONF['APP_DB_INFO']['AccessMethod'] == 'ORM')
{
    $registry->orm = new Orm($CONF['APP_DB_INFO'], $registry);
} else if ($CONF['APP_DB_INFO']['AccessMethod'] == 'SQL')
{
    //$registry->orm = new Orm($CONF['APP_DB_INFO'],$registry);
} else if ($CONF['APP_DB_INFO']['AccessMethod'] == 'BOTH')
{
    //$registry->orm = new Orm($CONF['APP_DB_INFO'],$registry);
}
?>
