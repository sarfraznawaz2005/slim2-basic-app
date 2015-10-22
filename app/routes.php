<?php

$app->get('/', '\\PakChat\\Controllers\\Home:get');
$app->get('/home', '\\PakChat\\Controllers\\Home:get');

$app->get('/register', '\\PakChat\\Controllers\\Register:get');
$app->post('/register', '\\PakChat\\Controllers\\Register:post');

$app->get('/login', '\\PakChat\\Controllers\\Login:get');
$app->post('/login', '\\PakChat\\Controllers\\Login:post');