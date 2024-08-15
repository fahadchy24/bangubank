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
    }

    elseif (isset($_SESSION['flash'][$key])) {
        $message = $_SESSION['flash'][$key];
        unset($_SESSION['flash'][$key]);
        return $message;
    }
}