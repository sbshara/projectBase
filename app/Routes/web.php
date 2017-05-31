<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 5/30/17
 * Time: 8:50 PM
 */

use App\Controllers\HomeController;

$app->get('/', HomeController::class . ':index')->setName('home');




$app->group('/auth', function () {

    $this->get('/signin/', AuthController::class . ':getSignin')->setName('auth.Sigin');
    $this->post('/signin/', AuthController::class . ':postSignin');


    $this->post('/signout/', AuthController::class . ':postSignOut')->setName('auth.SignOut');

    $this->get('/signup/', AuthController::class . ':getSignUp')->setName('auth.SigUp');
    $this->post('/signup/', AuthController::class . ':postSignUp');

});


