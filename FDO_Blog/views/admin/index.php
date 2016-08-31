<?php $this->title = "All users"; ?>
<legend><h1><?=htmlspecialchars($this->title)?></h1></legend>

<table class="table">
    <tr>
        <th>Username</th>
        <th>Email</th>
        <th>User group</th>
    </tr>

    <?php foreach ($this->users as $user) : ?>
        <tr>
            <?php if ($user['id'] != 1) : ?>
            <td>
                <a href="<?= APP_ROOT ?>/admin/details/<?=$user['id']?>"><?=$user['username']?></a>
            </td>
            <td><?=$user['email']?></td>
            <td><?=$user['group_name']?></td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table>
