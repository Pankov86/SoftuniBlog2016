<?php $this->title = "User info"; ?>

<legend><h1><?=htmlspecialchars($this->title)?></h1></legend>


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

<a href="<?=APP_ROOT?>/admin/delete/<?= $user_info['id']?>">Delete user</a>
