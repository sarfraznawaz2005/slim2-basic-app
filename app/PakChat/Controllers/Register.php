<?php
namespace PakChat\Controllers;

Use PakChat\Models\User;

class Register extends Controller
{
    private $title = 'Register';

    public function get()
    {
        $this->data['title'] = $this->title;
        $this->app->render('register.php', $this->data);
    }

    public function post()
    {
        if (!User::validate($this->app->request()->post())) {
            $this->app->flash('form', $this->app->request()->post());
            $this->app->flash('error', User::$errors);
            $this->app->redirect('register');
        }

        // make sure this email is not already registered
        $userExists = User::where('email', $this->app->request()->post('email'))->count();

        if ($userExists) {
            $this->app->flash('form', $this->app->request()->post());
            $this->app->flash('error', 'A user with specified email address already exists.');
            $this->app->redirect('register');
        }

        $user = new User();
        $user->name = $this->app->request()->post('name');
        $user->mobile = $this->app->request()->post('mobile');
        $user->gender = ($this->app->request()->post('gender') === 'male') ? 1 : 0;
        $user->email = $this->app->request()->post('email');
        $user->password = md5($this->app->request()->post('password'));

        if ($user->save()) {
            // TODO: send email to user also + may be activate him via token in email
            $this->app->flash('message', 'You have successfully registerd! You can login now.');
            $this->app->redirect('login');
        } else {
            $this->app->flash('error', 'Unknow error, please try again later.');
            $this->app->redirect('register');
        }

    }
}