<?php
session_start();
require_once 'config.php';   // must define $connection

/* ----------------------------
   REGISTER FORM HANDLING
-----------------------------*/
if (isset($_POST['register'])) {

    // Correct form field names
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name  = isset($_POST['last_name'])  ? $_POST['last_name'] : '';
    $email      = isset($_POST['username'])   ? $_POST['username'] : ''; // your form uses username = email
    $password   = isset($_POST['password'])   ? $_POST['password'] : '';
    $role       = isset($_POST['role'])       ? $_POST['role'] : '';

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // FIXED SQL — your old query was invalid
    $checkEmail = $connection->query("SELECT email FROM users WHERE email = '$email'");

    if ($checkEmail && $checkEmail->num_rows > 0) { 
        $_SESSION['register_error'] = 'Email already exists.';
        $_SESSION['active_form'] = 'register';
    } 
    else {
        // FIXED SQL INSERT — your version had missing table/columns
        $connection->query("
            INSERT INTO users (first_name, last_name, email, password, role)
            VALUES ('$first_name', '$last_name', '$email', '$hashed_password', '$role')
        ");

        $_SESSION['register_success'] = 'Registration successful! You can now log in.';
        $_SESSION['active_form'] = 'login';
    }

    header("Location: index.php");
    exit();
}

/* ----------------------------
   LOGIN FORM HANDLING
-----------------------------*/
if (isset($_POST['login'])) {

    // Form field names from your HTML
    $email    = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // FIX: use the same database variable ($connection)
    $result = $connection->query("SELECT * FROM users WHERE email = '$email'");

    if ($result && $result->num_rows > 0) {

        $user = $result->fetch_assoc();

       

            // session_start() NOT needed because it's already started at top
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['email']      = $user['email'];
            $_SESSION['role']       = $user['role'];

            if ($user['role'] === 'admin') {
                header("Location: admin_page.php");
            } 
            if ($user['role'] === 'manager') {
                header("Location: manager_page.php");
            }

            else {
                header("Location: user_page.php");
            }
            exit();
        
    }
    
    // Wrong login
    $_SESSION['login_error'] = 'Invalid email or password.';
    $_SESSION['active_form'] = 'login';

    header("Location: index.php");
    exit();
}
?>



