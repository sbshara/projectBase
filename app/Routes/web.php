<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 5/30/17
 * Time: 8:50 PM
 */

use App\Controllers\HomeController;

use App\Controllers\AuthController;

$app->get('/', HomeController::class . ':index')->setName('home');




$app->group('/auth', function () {

    $this->get('/signup/', AuthController::class . ':getSignUp')->setName('auth.SignUp');
    $this->post('/signup/', AuthController::class . ':postSignUp');

    $this->get('/signin/', AuthController::class . ':getSignIn')->setName('auth.SignIn');
    $this->post('/signin/', AuthController::class . ':postSignIn');

    $this->get('/signout/', AuthController::class . ':getSignOut')->setName('auth.SignOut');

    $this->get('/password/change/', AuthController::class . ':getPasswordChange')->setName('auth.password.change');
    $this->post('/password/change/', AuthController::class . ':postPasswordChange');

});


