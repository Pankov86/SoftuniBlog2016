<?php $this->title = "User info"; ?>

<legend><h1><?= htmlspecialchars($this->title)?></h1></legend>

<?php $user_info = $this->user_info?>

    <ul class="list group">
        <li class="list-group-item">Username: <b><?=$user_info['username']?></b></li>
        <li class="list-group-item">Full name: <b><?=$user_info['full_name']?></b></li>
        <li class="list-group-item">Email: <b><?= $user_info['email']?></b></li>
        <li class="list-group-item">User role: <b><?=$user_info['group_name']?></b></li>
        <li class="list-group-item">Comments count: <b><?=$user_info['comments_count']?></b></li>
        <li class="list-group-item">Posts count: <b><?=$user_info['posts_count']?></b></li>
        <li class="list-group-item">Fucks given: <b><?=$user_info['points_given_by_user']?></b></li>
        <li class="list-group-item">Points: <b><?=$user_info['comments_count'] + $user_info['posts_count'] + $user_info['points_given_by_user']?></b></li>
        <li class="list-group-item">About me: <b><?=$user_info['About']?></b></li>
    </ul>


<?php if ($user_info['id'] == $_SESSION['user_id']) : ?>
    <form method="post" action="<?=APP_ROOT?>/users/edit" class="form-group col-lg-1">
        <button type="submit" class="btn btn-primary">Edit profile</button>
    </form>

    <form method="post" action="<?=APP_ROOT?>/users/pass" class="form-group col-lg-11">
        <button type="submit" class="btn btn-primary">Edit password</button>
    </form>
<?php endif; ?>

<?php if ($_SESSION['group_name'] == 'admin') : ?>
    <button type="reset" class="btn btn-default">
        <a href="<?=APP_ROOT?>/admin/delete/<?= $user_info['id']?>">Delete user</a>
    </button>

<?php endif; ?>

