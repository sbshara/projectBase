<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 5/30/17
 * Time: 7:11 PM
 */

use Slim\App as Slim;
use Respect\Validation\Validator as v;


session_cache_limiter(false);
session_start();

// defining DIRECTORY SEPARATOR
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
// defining the application running mode (development or production)
defined('APPMODE') ? null : define('APPMODE', 'development.php');
//define Application root path
defined('ROOTPATH') ? null : define('ROOTPATH', dirname(__DIR__));
// define views path
defined('VIEWSPATH') ? null : define('VIEWSPATH', ROOTPATH . DS . 'resources' . DS . 'views' . DS);


// Autoload the composer libraries
require ROOTPATH . DS . 'vendor' . DS . 'autoload.php';

// pull in the configurations file
// TODO move configurations to DB
$settings = require (ROOTPATH . DS . 'app' . DS . 'Config' . DS . APPMODE);

$app = new Slim($settings);

require ROOTPATH . DS . 'bootstrap' . DS . 'container.php';

$app->add(new App\Middleware\ValidationErrorsMiddleware($container));
$app->add(new \App\Middleware\OldInputMiddleware($container));
$app->add(new \App\Middleware\CsrfViewMiddleware($container));
$app->add($container->csrf);

$app->add(new \Slim\HttpCache\Cache(
    $container->config->get('view.cacheavail'),
    $container->config->get('view.cachetime')
));


// validation rules
v::with('App\\Validation\\Rules\\');


require ROOTPATH . DS . 'app' . DS . 'Routes' . DS . 'web.php';