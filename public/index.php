<?php
session_start();

// define a working directory
define('APP_PATH', dirname(dirname(__FILE__))); // PHP v5.3+

// autoload dependencies automatically via magical composer autoload
require APP_PATH . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

// website configuration file
require_once APP_PATH . '/config.php';

// instantiate slim framework
$options = array(
    'debug' => $config['debug'],
    'templates.path' => APP_PATH . '/app/PakChat/Views/',
    'view' => new \Slim\Views\Twig(),
    'mode' => $config['mode'],
    'cookies.encrypt' => true,
    'cookies.cipher' => MCRYPT_RIJNDAEL_256,
    'cookies.secret_key' => md5('@!secret!@'),
    'cookies.lifetime' => '30 minutes'
);

$app = new \Slim\Slim($options);
$app->setName($config['appname']); // later in view for example: $app->getName()

$app->view()->parserOptions = array(
    'charset' => 'utf-8',
    'debug' => true,
    'cache' => dirname(__FILE__) . '/cache',
    'auto_reload' => true,
    'strict_variables' => false,
    'autoescape' => true,
);

// slim environment
$environment = \Slim\Environment::getInstance();

// setup error handler
if ($config['mode'] === 'development') {
    Tracy\Debugger::enable();
}

// Slim's logging
$log = $app->getLog();
$log->setEnabled(false);

// monolog
$app->container->singleton('log', function () use ($config) {
    $log = new \Monolog\Logger($config['appname']);
    $log->pushHandler(new \Monolog\Handler\StreamHandler(APP_PATH . '/applog.log', \Monolog\Logger::DEBUG));
    return $log;
});


// database configuration
if ($config['database_enable']) {
    $capsule = new Capsule;

    if ($config['database_type'] === 'mysql') {
        $capsule->addConnection(array(
            'driver' => $config['database_type'],
            'host' => $config['database_host'],
            'database' => $config['database_dbname'],
            'username' => $config['database_user'],
            'password' => $config['database_password'],
            'prefix' => $config['database_prefix'],
            'charset' => $config['database_charset'],
            'collation' => $config['database_collation'],
        ));
    } elseif ($config['database_type'] === 'sqlite') {
        $capsule->addConnection(array(
            'driver' => $config['database_type'],
            'database' => APP_PATH . '/database.sqlite',
            'prefix' => '',
        ));
    }

    $capsule->bootEloquent();
    $capsule->setAsGlobal();

    // Connect using the Laravel Database component
    //$conn = $capsule->connection();
}

// middleware
require_once APP_PATH . '/app/middleware.php';

// load routes file
require_once APP_PATH . '/app/routes.php';

$app->run();
