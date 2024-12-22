<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link active" href="index.php?page=1">Home</a>
    </li>
    <li class="nav-item">
        <?php
        session_start();
        if (isset($_SESSION['registered_user'])) {
            echo '<a class="nav-link" href="index.php?page=2">Upload</a>';
        } else {
            echo '<a class="nav-link disabled" href="#">Upload (Login Required)</a>';
        }
        ?>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.php?page=3">Gallery</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.php?page=4">Registration</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.php?page=5">Login</a>
    </li>
</ul>
