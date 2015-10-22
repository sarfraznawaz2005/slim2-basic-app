<?php
namespace PakChat\Controllers;

Use PakChat\Models\User;

class Login extends Controller
{
    private $title = 'Login';

    public function get()
    {
        $this->data['title'] = $this->title;
        $this->app->render('login.php', $this->data);
    }

    public function post()
    {
        $email = trim($this->app->request()->post('email'));
        $password = trim($this->app->request()->post('password'));

        if (!$email || !$password) {
            $this->app->flash('error', 'Email and Password are required fields.');
            $this->app->redirect('login');
        }

        $user = User::where('email', $email)
            ->where('password', md5($password))
            ->first();

        if ($user) {
            // TODO: create user session in slim way
            $this->app->flash('message', 'Logged in successfully');
            $this->app->redirect('home');
        } else {
            $this->app->flash('error', 'Invalid Email or Password.');
            $this->app->redirect('login');
        }

    }
}