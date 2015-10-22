<?php
namespace PakChat\Controllers;

class Home extends Controller
{
    private $title = 'Welcome';

    public function get()
    {
        //$this->app->log->info("Home Controller");

        $this->data['title'] = $this->title;
        $this->app->render('home.php', $this->data);
    }
}