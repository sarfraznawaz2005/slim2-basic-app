<?php
namespace PakChat\Controllers;

// base class
class Controller
{
    protected $app = null;
    protected $config = null;
    protected $data = array();

    public function __construct()
    {
        global $app;
        global $config;

        $this->app = $app;
        $this->config = $config;

        $this->data = array(
            'appName' => $this->config['appname'],
            'currentYear' => date('Y'),
        );
    }
}