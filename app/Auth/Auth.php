<?php
/**
 * Created by PhpStorm.
 * User: shiblie
 * Date: 6/12/17
 * Time: 1:55 PM
 */

namespace App\Auth;

use App\Models\User;

class Auth {

    public function attempt ($user, $password) {
        $user = User::where('email', $user)->first();

        if (!$user) {
            return false;
        } else {
            if (password_verify($password, $user->password)){
                $_SESSION['user'] = $user->id;
                return true;
            } else {
                return false;
            }
        }
    }

    public function check () {
        return isset($_SESSION['user']);
    }

    public function user () {
        return isset($_SESSION['user']) ?
            User::find($_SESSION['user']) : false;
    }

    public function signOut () {
        unset($_SESSION['user']);
        session_destroy();
    }

    public function socialLogin () {

    }

}