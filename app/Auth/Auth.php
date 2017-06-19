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

    public function authorized () {
        /**
         * TODO:
         * provide ACL here in association with DB tables
         */
        /**
         * @user
         * @routes
         * @permissions (contains route with CRUD)
         * @policies (policy Name, and inheretance)
         * @policies_route_permissions (1 policy to many permissions)
         * policies would have few default as base,
         * when creating a user, he/she would get a policy
         * if additional permissions required, a custom policy would be created
         * the created policy would inherit the original set of permissions, and add the required additions to it
         * @authorized  if authorized,
         * this method will respond with @bool(true)
         */
    }

    public function allUsers () {
        if($this->check()) {
            if ($this->user()->company_id == 1048021) {
                return User::all();
            } else {
                return User::where('company_id', $this->user()->company_id)->get();
            }
        } else {
            return false;
        }
    }

}