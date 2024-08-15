<?php

$request = trim($_SERVER['REQUEST_URI']);
$viewDir = '../../views/';
$authDir = '../../views/auth/';

match ($request) {
    '/' => require __DIR__ . $viewDir . 'welcome.php',
    '/login' => require __DIR__ . $authDir . 'login.php',
    '/register' => require __DIR__ . $authDir . 'register.php',
    default => require __DIR__ . $viewDir . '404.php'
};
