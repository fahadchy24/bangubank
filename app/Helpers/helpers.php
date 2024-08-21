<?php

declare(strict_types=1);

function sanitize(string $data): string
{
    return htmlspecialchars(stripslashes(trim($data)));
}

function dd(mixed $data): void
{
    echo '
    <pre>';
    print_r($data);
    echo '</pre>';
    die();
}

function flash($key, $message = null)
{
    if ($message) {
        $_SESSION['flash'][$key] = $message;
    } elseif (isset($_SESSION['flash'][$key])) {
        $message = $_SESSION['flash'][$key];
        unset($_SESSION['flash'][$key]);
        return $message;
    }
}


function old($key, $default = null)
{
    if (isset($_SESSION['old_input'][$key])) {
        return htmlspecialchars($_SESSION['old_input'][$key], ENT_QUOTES, 'UTF-8');
    }
    return $default;
}

function config($configFilename, $key)
{
    $path = sprintf("config/%s.php", $configFilename);
    if (file_exists($path)) {
        $config = include sprintf("config/%s.php", $configFilename);
        if (isset($config[$key])) {
            return $config[$key];
        }
    }
    return '';
}

function redirectWithMessage($message, $page)
{
    $redirectTo = config('app', 'url') . $page;
    $_SESSION['message'] = "$message";
    header("Location:$redirectTo");
    exit();
}
