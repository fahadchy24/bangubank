<?php

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
