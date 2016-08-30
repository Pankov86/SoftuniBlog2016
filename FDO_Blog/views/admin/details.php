<?php $this->title = "User info"; ?>

<h1><?= htmlspecialchars($this->title)?></h1>

<?php $user_info = $this->user_info ?>

<ul>
    <li>Username: <?=$user_info['username']?></li>
    <li>Full name: <?=$user_info['full_name']?></li>
    <li>Email: <?= $user_info['email']?></li>
    <li>User role: <?=$user_info['group_name']?></li>
    <li>Comments count: <?=$user_info['comments_count']?></li>
    <li>Points: <?=$user_info['posts_count']?></li>
    <li>Fucks given: <?=$user_info['points_given_by_user']?></li>
    <li>Points: <?=$user_info['comments_count'] + $user_info['posts_count'] + $user_info['points_given_by_user']?></li>
    <li>About me: <?=$user_info['About']?></li>
</ul>

<!--<form method="post" action="--><?//=APP_ROOT?><!--/users/edit">-->
<!--    <button type="submit" onsubmit="--><?php //$this->model-> ?><!--">-->
<!--        --><?php //if ($user_info['group_name'] == 'user') :?>
<!--        Make moderator-->
<!--        --><?php //else : ?>
<!--        Make user-->
<!--        --><?php //endif; ?>
<!--    </button>-->
<!--</form>-->

<a href="<?=APP_ROOT?>/admin/delete/<?= $user_info['id']?>">Delete user</a>