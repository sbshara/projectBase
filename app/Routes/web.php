<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 5/30/17
 * Time: 8:50 PM
 */

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\AdminController;

use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

$app->group('', function () {

    // Public home page
    $this->get('/', HomeController::class . ':publicIndex')->setName('home');

//     Guest Auth Section
    $this->group('/auth', function () {
        $this->get('/signup/', AuthController::class . ':getSignUp')->setName('auth.SignUp');
        $this->post('/signup/', AuthController::class . ':postSignUp');
        $this->get('/signin/', AuthController::class . ':getSignIn')->setName('auth.SignIn');
        $this->post('/signin/', AuthController::class . ':postSignIn');
    });

})->add(new GuestMiddleware($container));



$app->group('', function () {

    // Logged in Home page
    $this->get('/home[/]', HomeController::class . ':index')->setName('private.home');

//     Logged Users AUTH section
    $this->group('/auth', function () {
        $this->get('/signout/', AuthController::class . ':getSignOut')->setName('auth.SignOut');
        $this->get('/password/change/', AuthController::class . ':getPasswordChange')->setName('auth.password.change');
        $this->post('/password/change/', AuthController::class . ':postPasswordChange');
    });

    // Admin Module
    $this->group('/admin', function () {

        $this->group('/user', function () {
            // get all users
            $this->get('s/', AdminController::class . ':getAllUsers')->setName('user.all');

            // get user by id
            $this->get('/update/{user_id}', AdminController::class . ':getUserById')->setName('user.id');
            $this->post('/update/{user_id}', AdminController::class . ':postUserById');

            // create new user
            $this->get('/new', AdminController::class . ':getNewUser')->setName('user.new');
            $this->post('/new', AdminController::class . ':postNewUser');

            // Change user password
            $this->get('/password/reset/{user_id}', AdminController::class . ':getUserPasswordReset')->setName('user.password');
            $this->post('/password/reset/{user_id}', AdminController::class . ':postUserPasswordReset');

            // delete user
            $this->get('/delete/{user_id}', AdminController::class . ':deleteUser')->setName('user.delete');
        });

        $this->group('/portal', function () {
            // get all users
            $this->get('s/', AdminController::class . ':getAllPortals')->setName('portal.all');

            // get user by id
            $this->get('/update/{portal_id}', AdminController::class . ':getPortalById')->setName('portal.id');
            $this->post('/update/{portal_id}', AdminController::class . ':postPortalById');

            // create new user
            $this->get('/new', AdminController::class . ':getNewPortal')->setName('portal.new');
            $this->post('/new', AdminController::class . ':postNewPortal');

            // delete user
            $this->get('/delete/{portal_id}', AdminController::class . ':deletePortal')->setName('portal.delete');
        });




    });


//     TODO: for every module, there should be a group below similar to the above AUTH GROUPING:




})->add(new AuthMiddleware($container));