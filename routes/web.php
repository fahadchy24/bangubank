<?php

$request = trim($_SERVER['REQUEST_URI']);
$viewDir = '../../views/';
$authDir = '../../views/auth/';

match ($request) {
    '/' => require __DIR__ . $viewDir . 'welcome.php',
    '/login' => require __DIR__ . $authDir . 'login.php',
    '/logout' => require __DIR__ . $authDir . 'logout.php',
    '/register' => require __DIR__ . $authDir . 'register.php',
    '/customers' => require __DIR__ . $viewDir . 'admin/customers.php',
    '/dashboard' => require __DIR__ . $viewDir . 'customer/dashboard.php',
    default => require __DIR__ . $viewDir . '404.php'
};