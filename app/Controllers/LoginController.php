<?php

declare(strict_types=1);

$errors = [];

$name = $email = $password = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userlist = json_decode(file_get_contents("././storage/data/users.json"), true);

    $_SESSION['old_input'] = $_POST;

    // Validate and Sanitize Email Field
    if (empty($_POST['email'])) {
        $errors['email'] = 'Please provide an email address';
    } else {
        $email = sanitize($_POST['email']);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please provide a valid email address';
        }
    }

    // Validate and Sanitize Password Field
    if (empty($_POST['password'])) {
        $errors['password'] = 'Please provide a password';
    } elseif (strlen($_POST['password']) < 8) {
        $errors['password'] = 'Password must be 8 characters long.';
    } else {
        $password = sanitize($_POST['password']);
    }

    if (empty($errors)) {
        foreach ($userlist as $user) {
            if ($user['email'] == $email && password_verify($password, $user['password'])) {
                $_SESSION['name'] = $user['name'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['is_admin'] = $user['is_admin'];
                $_SESSION['logged_in'] = true;

                if ($_SESSION['is_admin'] === true) {
                    redirectWithMessage("You have logged in successfully!", 'customers');
                }

                redirectWithMessage("You have logged in successfully!", 'dashboard');
            } else {
                $errors['auth_error'] = 'The email or password is wrong';
            }
        }
    }
}
