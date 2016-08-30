<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet"  href="<?=APP_ROOT?>/content/styles/styles.css" type="text/css"/>
        <link rel="icon" href="<?=APP_ROOT?>/content/images/favicon.ico" />
        <script src="<?=APP_ROOT?>/content/scripts/jquery-3.0.0.min.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title><?php if (isset($this->title)) echo htmlspecialchars($this->title) ?></title>
    </head>

    <body>
    <div class="jumbotron text-center">
        <h1>First Dollar Online</h1>
        <p>Place motto here :)</p>
    </div>

    <header class="container">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand"
                       href="<?=APP_ROOT?>"><img src="<?=APP_ROOT?>/content/images/site-logo.png"/>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="<?=APP_ROOT?>/">Home <span class="sr-only"></span></a></li>
                        <li> <a href="<?=APP_ROOT?>/home/about">About us</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" type="button" aria-haspopup="true"
                               aria-expanded="false">Categories <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?=APP_ROOT?>/home/">All</a></li>
                                <li role="separator" class="divider"></li>
                                <?php
                                $categories = HomeController::getAllCategories();
                                foreach ($categories as $category) : ?>
                                    <li><a href="<?=APP_ROOT?>/home/category/<?=$category['id']?>">
                                            <?= htmlentities($category['category_name']); ?></a></li>
                                <?php endforeach; ?>

                            </ul>
                        </li>
                    </ul>

    <!--                <form class="navbar-form navbar-left">-->
    <!--                    <div class="form-group">-->
    <!--                        <input type="text" class="form-control" placeholder="Search">-->
    <!--                    </div>-->
    <!--                    <button type="submit" class="btn btn-default">Search</button>-->
    <!--                </form>-->
                    <ul class="nav navbar-nav navbar">

                        <?php if ($this->isLoggedInAsAdmin) : ?>
                            <li><a href="<?=APP_ROOT?>/posts">Posts</a></li>
                            <li><a href="<?=APP_ROOT?>/admin">Users</a></li>
                            <li><a href="<?=APP_ROOT?>/posts/create">Create Post</a></li>

                        <?php elseif ($this->isLoggedIn) : ?>
                            <li><a href="<?=APP_ROOT?>/posts/index">All Posts</a></li>
                            <li><a href="<?=APP_ROOT?>/posts/user_posts">User Posts</a></li>
                            <li> <a href="<?=APP_ROOT?>/posts/create">Create Post</a></li>

                        <?php else: ?>
                            <li><a href="<?=APP_ROOT?>/users/login">Login</a></li>
                            <li><a href="<?=APP_ROOT?>/users/register">Register</a></li>

                        <?php endif; ?>

                    <ul class="nav navbar-nav navbar-right">

                        <?php if ($this->isLoggedIn) : ?>
                            <li><a id="logged-in-info"><span>Hello,<a href="<?=APP_ROOT?>/users/profile">
                                    <b><?=htmlspecialchars($_SESSION['username'])?></b></a></span></li>
                            <li><form method="post" action="<?=APP_ROOT?>/users/logout">
                                <input type="submit" value="Logout"/></form></li>
                            </a>
                        <?php endif; ?>
                    </ul>

                </div>

            </div>

        </nav>

    </header>
<?php require_once('show-notify-messages.php'); ?>
