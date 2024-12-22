<?php
session_start();

function login($name, $pass, $users_file) {
    $name = trim(htmlspecialchars($name));
    $pass = trim(htmlspecialchars($pass));
    if ($name === '' || $pass === '') {
        return 'Empty fields are not allowed.';
    }

    if (!file_exists($users_file)) {
        return 'Users file not found.';
    }

    $file = fopen($users_file, 'r');
    $hashed_pass = md5($pass);
    while ($line = fgets($file)) {
        list($stored_name, $stored_hash, $email) = explode(':', trim($line));
        if ($stored_name === $name && $stored_hash === $hashed_pass) {
            fclose($file);
            $_SESSION['registered_user'] = $name;
            return true;
        }
    }
    fclose($file);
    return 'Invalid login or password.';
}

if (isset($_POST['login_btn'])) {
    $users_file = 'pages/users.txt';
    $result = login($_POST['login'], $_POST['password'], $users_file);

    if ($result === true) {
        header('Location: index.php?page=1');
        exit();
    } else {
        $error_message = $result;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="my-4">Login</h2>
    <?php if (isset($error_message)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error_message) ?></div>
    <?php endif; ?>
    <form action="login.php" method="post">
        <div class="mb-3">
            <label for="login" class="form-label">Username</label>
            <input type="text" id="login" name="login" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
