<main>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Author</th>
            <th>Date</th>
        </tr>

        <?php foreach ($this->posts as $post) : ?>
            <tr>
                <td><?= htmlspecialchars($post['id'])?></td>
                <td><a href="<?=APP_ROOT?>/home/view/<?=$post['id']?>"><?= htmlentities($post['title']); ?></a></td>
                <td><?= cutLongText($post['content'])?></td>
                <td><?= htmlspecialchars($post['full_name'])?></td>
                <td><?= htmlspecialchars($post['date'])?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>

