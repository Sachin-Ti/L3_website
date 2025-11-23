<?php 
session_start();

$errors = [
    'login' => isset($_SESSION['login_error']) ? $_SESSION['login_error'] : '',
    'register' => isset($_SESSION['register_error']) ? $_SESSION['register_error'] : ''
];

$active_form = isset($_SESSION['active_form']) ? $_SESSION['active_form'] : 'login';
 
session_unset();

function showError($error){
    return !empty($error) ? "<p class='error-message'>{$error}</p>" : '';
}

function isActiveForm($form, $active_form){
    return $form === $active_form ? 'active' : '';
}

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>inventory system</title>
        
        <!--Materials Icons-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round"rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=order_approve" />

        <!--CSS/Stylesheet-->
        <link rel="stylesheet" href="login.css"/>
        
    </head>

    <body>
    <div class="container">
        <div class="form-box <?= isActiveForm('login',$active_form); ?>" id="login-form">
            <form action="login_register.php" method="post">
                <h2>Login</h2>
                    <?= showError($errors['login']); ?>
                    <input type="email" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit" name="login">Login</button>
                <p>Not registered? <a href="#" onclick="showForm('register-form')">Register</a></p>
            </form>
        </div>

                <div class="form-box <?= isActiveForm('register',$active_form);?>" id="register-form">
            <form action="login_register.php" method="post">
                <h2>Register</h2>
                <?= showError($errors['register']); ?>
                    <input type="text" name="first_name" placeholder="First Name" required>
                    <input type="text" name="last_name" placeholder="Last Name" required>
                    <input type="email" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <select name="role" required>
                        <option value="" disabled selected>Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="Manager">Manager</option>
                        <option value="User">User</option>
                    </select>
                    <button type="submit" name="register">Register</button>
                <p>Already have an account? <a href="#"onclick="showForm('login-form')">Login</a></p>
            </form>
        </div>
      
    </div>
    <script src="login.js"></script>
    </body>
</html>