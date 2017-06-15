<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 5/31/17
 * Time: 11:30 AM
 */

namespace App\Controllers;

use App\Models\User;

use Respect\Validation\Validator as v;

class AuthController extends Controller {

    // Sign Up Methods
    public function getSignUp ($request, $response, $args) {
        return $this->view->render($response, 'auth/signup.twig');
    }

    public function postSignUp ($request, $response, $args) {
        $validation = $this->container->validator->validate($request, [
            'first_name'        =>  v::alpha()->notEmpty()->noWhiteSpace()->length(3,24),
            'last_name'         =>  v::alpha(),
            'email'             =>  v::email()->notEmpty()->emailAvailable(),
            'phone'             =>  v::phone()->usernameAvailable(),
            'password'          =>  v::notEmpty()->length(8,56),
            'confirm_password'  =>  v::notEmpty()
        ]);

        if ($validation->failed()) {
            $this->flash->addMessage(
                'warning',
                'There are some errors with the provided data, please check & try again!');
            return $response->withRedirect($this->router->pathFor('auth.SignUp'));
        }

        User::create([
            'first_name'    =>  $request->getParam('first_name'),
            'last_name'     =>  $request->getParam('last_name'),
            'username'      =>  $request->getParam('username'),
            'email'         =>  $request->getParam('email'),
            'password'      =>  password_hash($request->getParam('password'), PASSWORD_DEFAULT)
        ]);

        // This is where you send an email

        $this->flash->addMessaeg(
            'success',
            'Your Account was created successfully. Please check your email for activation instructions.');
        $this->auth->attempt($request->getParam('email'), $request->getParam('password'));

        return $response->withRedirect($this->router->pathFor('home'));
    }

    // Sign In Methods
    public function getSignIn ($request, $response, $args) {
        return $this->view->render($response,'auth/signin.twig');
    }

    public function postSignIn ($request, $response, $args) {
        // Validation (for UX only)
        $auth = $this->auth->attempt (
            $request->getParam('email'),
            $request->getParam('password')
        );

        if (!$auth) {
            $this->flash->addMessage(
                'error',
                'Could not log you in!');
            return $response->withRedirect($this->router->pathFor('auth.SignIn'));
        }
        $this->flash->addMessage(
            'info',
            'Welcome ' . $this->auth->user()->fullName() . '!');

        return $response->withRedirect($this->router->pathFor('home'));
    }

    // Sign Out Method
    public function getSignOut ($request, $response, $args) {
        $this->auth->signOut();
        return $response->withRedirect($this->router->pathFor('home'));
    }

    // Password Methods
    public function getPasswordChange ($request, $response, $args) {
        return $this->view->render($response, 'auth/passwordChange.twig');
    }

    public function postPasswordChange ($request, $response, $args) {
        $validation = $this->validator->validate($request, [
            'old_Password'       =>  v::notEmpty()->noWhitespace()->matchesPassword($this->auth->user()->password),
            'new_Password'       =>  v::notEmpty()->noWhitespace()->length(6,32, true),
            'confirm_Password'   =>  v::notEmpty()->noWhitespace()
        ]);
        if ($validation->failed()) {
            $this->flash->addMessage('warning', 'Some of the info provided is incorrect / invalid!');
            return $response->withRedirect($this->router->pathFor('auth.password.change'));
        }
        $this->auth->user()->setPassword($request->getParam('new_Password'));
        $this->flash->addMessage('success', 'Your password was changed successfully.');
        // Email notification comes here (maybe reset all saved sessions also)
        return $response->withRedirect($this->router->pathFor('home'));
    }

}