<main>
    <table>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Author</th>
            <th>Date</th>
            <th>Reads</th>
            <th>Comments</th>
            <th>Points</th>
            <?php if ($_SESSION['group_name'] == 'admin') : ?>
                <th>Action</th>
            <?php endif; ?>
        </tr>

        <?php foreach ($this->posts as $post) : ?>
            <tr>
                <td><a href="<?=APP_ROOT?>/home/view/<?=$post['id']?>"><?= htmlentities($post['title']); ?></a></td>
                <td><?= html_entity_decode($post['content'])?></td>
                <td><?= htmlspecialchars($post['full_name'])?></td>
                <td><?= htmlspecialchars($post['date'])?></td>
                <td><?= htmlspecialchars($post['views_count'])?></td>
                <td><?= htmlspecialchars($post['comments_count'])?></td>
                <td><?= htmlspecialchars($post['points'])?></td>
                
                <?php if ($_SESSION['group_name'] == 'admin') : ?>
                    <td><a href="<?= APP_ROOT?>/posts/delete/<?= $post['id'] ?>">Delete post</a></td>
                    <td><a href="<?= APP_ROOT?>/posts/edit/<?= $post['id'] ?>">Edit post</a></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</main>

