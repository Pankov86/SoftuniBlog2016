<?php $this->title = "User info"; ?>

<legend><h1><?=htmlspecialchars($this->title)?></h1></legend>

<?php $user_info = $this->user_info ?>
<a class=" btn btn-default" href="<?=APP_ROOT?>/admin/delete/<?= $user_info['id']?>">Delete user</a>
<br>
 <br>
<ul class="list-group">
    <li class="list-group-item">Username:<b><?=$user_info['username']?></b></li>
    <li class="list-group-item">Full name: <b><?=$user_info['full_name']?></b></li>
    <li class="list-group-item">Email: <b><?= $user_info['email']?></b></li>
    <li class="list-group-item">User role: <b><?=$user_info['group_name']?></b></li>
    <li class="list-group-item">Comments count: <b><?=$user_info['comments_count']?></b></li>
    <li class="list-group-item">Points: <b><?=$user_info['posts_count']?></b></li>
    <li class="list-group-item">Fucks given: <b><?=$user_info['points_given_by_user']?></b></li>
    <li class="list-group-item">Points: <b><?=$user_info['comments_count'] + $user_info['posts_count'] + $user_info['points_given_by_user']?></b></li>
    <li class="list-group-item">About me: <b><?=$user_info['About']?></b></li>
</ul>

<table class="table table-responsive table-hover">
    <tr>
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




