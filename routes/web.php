<?php

declare(strict_types=1);

$request = trim($_SERVER['REQUEST_URI']);
$viewDir = '../../views/';

match ($request) {
    '/' => require __DIR__ . $viewDir . 'welcome.php',
    '/login' => require __DIR__ . $viewDir . 'auth/login.php',
    '/logout' => require __DIR__ . $viewDir . 'auth/logout.php',
    '/register' => require __DIR__ . $viewDir . 'auth/register.php',
    '/customers' => require __DIR__ . $viewDir . 'admin/customers.php',
    '/dashboard' => require __DIR__ . $viewDir . 'customer/dashboard.php',
    default => require __DIR__ . $viewDir . '404.php'
};
