<main>
    <table>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Group</th>
        </tr>

<?php foreach ($this->users as $user) : ?>
    <tr>
        <td><?= htmlspecialchars($user['username'])?></td>
        <td><?= htmlentities($user['email']); ?></td>
        <td><?= cutLongText($user['group_name'])?></td>

        <td>
            <a href="<?=APP_ROOT?>/posts/edit/<?=$user['id']?>">[View Profile]</a>

        </td>
    </tr>
<?php endforeach; ?>

</table>
</main>


