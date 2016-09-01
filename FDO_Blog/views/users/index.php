<?php $this->title = "User info"; ?>

<h1><?= htmlspecialchars($this->title)?></h1>

<table class="table table-striped ">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Full name</th>
        <th>User group</th>
        
    </tr>

    <?php foreach ($this->users as $user) : ?>
    <tr>
        <td><?=$user['id']?></td>
        <td><?=$user['username']?></td>
        <td><?=$user['full_name']?></td>
        <td><?=$user['user_group']?></td>
        

        <?php $role = $this->model->defineRole($user['id']); ?>

        <?php if ($role['user_group'] != "admin") : ?>
            <td>
                <form method="post">
                    <?= var_dump($user['id']); var_dump($role['user_group']) ?>
                    <input onsubmit="<?php $this->makeAdmin($user['id'])?>" type="submit" value="Make admin">
                </form>
            </td>
        <?php else: ?>

            <td>
                <form method="post" >
                    <?= var_dump($user['id']); var_dump($role['user_group']) ?>
                    <input onsubmit="<?php $this->makeUser($user['id'])?>" type="submit" value="Make user">
                </form>
            </td>
        <?php endif; ?>

        <td>
            <form method="post" onsubmit="<?php $this->deleteUser($user['id'])?>">
                <input type="submit" value="Delete user">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

