<?php
/**
 * Created by PhpStorm.
 * User: professor
 * Date: 09.02.2019
 * Time: 23:07
 */

namespace Controllers;

use App\Core\Controller;
use App\Core\Session\Session;

class MainController extends Controller
{
    public function index()
    {
        return view('index', ['welcome' => app()->name]);
    }

    public function signup()
    {
        return view('signin');
    }

    public function signin()
    {
        if (app()->isGuest) {
            return view('signin');
        }
        header('Location: /');
    }

    public function postSignin()
    {
        if (app()->isGuest) {
            $username = $_POST['username'] ?? false;
            $password = $_POST['password'] ?? false;
            if ($username && $password) {
                if (app()->auth->login($username, $password)) {
                    Session::set('flash', 'Hi ' . $username . '! You successfully signed in.');
                    header('Location: /');
                } else {
                    Session::set('flash', 'Username or password is wrong');
                    header('Location: /signin');
                }
            } else {
                Session::set('flash', 'Username or password is not entered');
                header('Location: /signin');
            }
        } else {
            header('Location: /');
        }
    }

    public function signout()
    {
        if (!app()->isGuest) {
            app()->auth->destroySession();
            header('Location: /');
        }
    }

    public function home($page)
    {
        $tasks = app()->db->select('tasks', '*');
        return view('home', compact('tasks','page'));
    }
}