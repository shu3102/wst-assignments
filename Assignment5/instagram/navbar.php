<!-- <?php
    ob_start();
    session_start();
?> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="container-fluid bg-light w-100 p-1">
    <nav class="navbar navbar-light bg-light p-2">
    <a class="navbar-brand pl-5" href="/instagram/profiles.php">
        <img src="https://cdn4.iconfinder.com/data/icons/picons-social/57/38-instagram-2-512.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Profiles
    </a>
    <span class="row">
        <?php 
            if(isset($_SESSION['user'])){
                echo '<a href="/instagram/form.php" class="nav-link col-6">Profile</a>';
                echo '<a href="/instagram/logout.php" class="nav-link col-6">logout</a>';
            } else {
                echo '<a href="/instagram/form.php" class="nav-link col-4">Profile</a>';
                echo '<a href="/instagram/login.php" class="nav-link col-4">login</a>';
                echo '<a href="/instagram/signup.php" class="nav-link col-4">signup</a>';
            }
        ?>
    </span>
    </nav>
</div>