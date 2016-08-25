<?php $this->title = "All users"; ?>

<h1><?= htmlspecialchars($this->title)?></h1>

<table>
    <tr>
        <th>Username</th>
        <th>Email</th>
        <th>User group</th>
    </tr>

    <?php foreach ($this->users as $user) : ?>
        <tr>
            <td><?php $user['id']?></td>
            <td>
                <a href="<?= APP_ROOT ?>/admin/details/<?php $user['id']?>"><?=$user['username']?>
                </a>
            </td>
            <td><?=$user['email']?></td>
            <td><?=$user['group_name']?></td>
        </tr>
    <?php endforeach; ?>

</table>