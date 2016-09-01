<?php $this->title = "User info"; ?>

<legend><h1><?=htmlspecialchars($this->title)?></h1></legend>

<?php $user_info = $this->user_info ?>
<a href="<?=APP_ROOT?>/admin/delete/<?= $user_info['id']?>">Delete user</a>

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

<table class="table table-responsive">
    <tr >
        <th>Title</th>
        <th>Content</th>
        <th>Date</th>
        <th>Reads</th>
        <th>Comments</th>
        <th>Points</th>
        <th>Action</th>
    </tr>

    <?php foreach ($this->posts as $post) : ?>
        <tr>
            <td><a href="<?=APP_ROOT?>/home/view/<?=$post['id']?>"><?= htmlentities($post['title']); ?></a></td>
            <td><?= html_entity_decode($post['content'])?></td>
            <td><?= htmlspecialchars($post['date'])?></td>
            <td><?= htmlspecialchars($post['views_count'])?></td>
            <td><?= htmlspecialchars($post['comments_count'])?></td>
            <td><?= htmlspecialchars($post['points'])?></td>
            <td><a href="<?= APP_ROOT?>/posts/delete/<?= $post['id'] ?>">Delete post</a></td>
        </tr>
    <?php endforeach; ?>
</table>




