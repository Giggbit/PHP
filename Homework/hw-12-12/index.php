<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <header class="row">
        <div class="col-12">
<!--            --><?php //if (!isset($_SESSION['registered_user'])): ?>
<!--                <a href="pages/login.php" class="btn btn-primary">Login</a>-->
<!--            --><?php //else: ?>
<!--                <p>Welcome, --><?php //= htmlspecialchars($_SESSION['registered_user']) ?><!--!</p>-->
<!--                <form action="logout.php" method="post">-->
<!--                    <button type="submit" name="logout_btn" class="btn btn-danger">Logout</button>-->
<!--                </form>-->
<!--            --><?php //endif; ?>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <?php
            include_once("pages/menu.php");
            include_once("pages/functions.php");
        ?>
    </nav>

    <section>
        <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                if ($page == 1) include "pages/home.php";
                if ($page == 2) include "pages/upload.php";
                if ($page == 3) include "pages/gallery.php";
                if ($page == 4) include "pages/registration.php";
                if ($page == 5) include "pages/login.php";
            }
        ?>
    </section>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php

