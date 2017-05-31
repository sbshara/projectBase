<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 5/30/17
 * Time: 10:31 PM
 */

use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Slim\Flash\Messages;
use Slim\Csrf\Guard;
use Illuminate\Database\Capsule\Manager as Capsule;
//use Illuminate\Container\Container;
use Noodlehaus\Config;

use App\Controllers\HomeController;

$container = $app->getContainer();

$container['view'] = function ($container) {            // Add the Twig View dependency
    $view = new Twig(
        $container->config->get('view.template'), [
        'cache' =>  $container->config->get('view.cache'),
        'debug' =>  $container->config->get('view.debug')
    ]);
    $view->addExtension (
        new TwigExtension (
            $container->router,
            $container->request->getUri()
        )
    );
    $view->getEnvironment()->addGlobal('URI', [
        'FullPath'      =>  $container->request->getUri(),
        'Path'          =>  $container->request->getUri()->getPath(),
        'BasePath'      =>  $container->request->getUri()->getBasePath()
    ]);

    // Globalize the Auth module to access it within template partials
//    $view->getEnvironment()->addGlobal('auth', [
//        'check'         	=>  $container->auth->check(),
//        'user'          	=>  $container->auth->user(),
//        'profile'       	=>  $container->auth->profile(),
//        'userMaster'        =>  $container->auth->userMaster()
//    ]);

    // Add the flash message
    $view->getEnvironment()->addGlobal('flash', $container->flash);

    return $view;
};


$container['HomeController'] = function ($container) {
    return new HomeController();
};
















$container['config'] = function ($container) { return new Config(ROOTPATH.DS.'app'.DS.'Config'.DS.APPMODE); };
$capsule = new Capsule;
$capsule->addConnection($container->config->get('db'));
//$capsule->setEventDispatcher(new Dispatcher(new Container));
$capsule->setAsGlobal();
$capsule->bootEloquent();


$container['db'] = function ($container) use ($capsule) { return $capsule; };

// Add the authorization dependency
//$container['auth'] = function ($container) { return new \App\Helpers\Auth(); };

$container['flash'] = function ($container) {  return new Messages(); }; // Add global message flash dependency



// Add the validation dependency
$container['validator'] = function ($container) {
    return new App\Validation\Validator();
};

//$container['cache'] = function ($container) {
////    return new \App\Middleware\HttpCache\CacheProvider();             // Slim HttpCache
//    return new \Slim\HttpCache\CacheProvider();
//};

// Override notFoundHandler (404):
//$container['notFoundHandler'] = function ($container) {
//    return new App\Handlers\NotFoundHandler($container['view']);
//};

// Override notAllowedHandler (405):
//$container['notAllowedHandler'] = function ($container) {
//    return new App\Handlers\notAllowedHanlder($container['view']);
//};

// Override phpErrorHandler (500):
//$container['phpErrorHandler'] = function ($container) {
//    return new App\Handlers\phpErrorHandler($container['view']);
//};

// Add the Controllers:
//$container['AuthController'] = function ($container) {
//    return new \App\Controllers\Auth\AuthController($container);
//};

//$container['PasswordController'] = function ($container) {
//    return new \App\Controllers\Auth\PasswordController($container);
//};

// Add the validation dependency
$container['validator'] = function ($container) {
    return new App\Validation\Validator();
};

//$container['cache'] = function ($container) {
//    return new \App\Middleware\HttpCache\CacheProvider();
//};

// Override notFoundHandler:
//$container['notFoundHandler'] = function ($container) {
//    return new App\Handlers\NotFoundHandler($container['view']);
//};

$container['csrf'] = function ($container) { return new Guard(); };