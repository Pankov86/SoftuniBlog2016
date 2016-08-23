<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet"  href="<?=APP_ROOT?>/content/styles/styles.css" type="text/css"/>
    <link rel="icon" href="<?=APP_ROOT?>/content/images/favicon.ico" />
    <script src="<?=APP_ROOT?>/content/scripts/jquery-3.0.0.min.js"></script>
    <script src="<?=APP_ROOT?>/content/scripts/blog-scripts.js"></script>
    <title><?php if (isset($this->title)) echo htmlspecialchars($this->title) ?></title>
</head>

<body>
<header>
    <a href="<?=APP_ROOT?>"><img src="<?=APP_ROOT?>/content/images/site-logo.png"></a>
    
    <a href="<?=APP_ROOT?>/">Home</a>
    <a href="<?=APP_ROOT?>/home/about">About us</a>


    <?php if ($this->isLoggedInAsAdmin) : ?>
        <a href="<?=APP_ROOT?>/posts">Posts</a>
        <a href="<?=APP_ROOT?>/posts/create">Create Post</a>
        <a href="<?=APP_ROOT?>/admin">Admin Panel</a>


    <?php elseif ($this->isLoggedIn) : ?>
        <a href="<?=APP_ROOT?>/posts/viewAllPosts">All Posts</a>
        <a href="<?=APP_ROOT?>/posts">User Posts</a>
        <a href="<?=APP_ROOT?>/posts/create">Create Post</a>



    <?php else: ?>
        <a href="<?=APP_ROOT?>/users/login">Login</a>
        <a href="<?=APP_ROOT?>/users/register">Register</a>


    <?php endif; ?>

    <?php if ($this->isLoggedIn) : ?>
        <div id="logged-in-info">
            <span>Hello,<a href="<?=APP_ROOT?>/users/profile"><b><?=htmlspecialchars($_SESSION['username'])?></b></a></span>
            <form method="post" action="<?=APP_ROOT?>/users/logout">
                <input type="submit" value="Logout"/>
            </form>
        </div>
    <?php endif; ?>
</header>

<?php require_once('show-notify-messages.php'); ?>
