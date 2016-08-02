<?php if ($this->comments): ?>
    <h3>Comments</h3>
    <table style="width: 95%">
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Content</th>
            <th>Posted on</th>
        </tr>

        <?php  
            foreach ($this->comments as $comment) : ?>
            <tr>
                <td><?= htmlspecialchars($comment['id'])?></td>
                <td><?= htmlspecialchars($comment['full_name'])?></a></td>
                <td><?= htmlspecialchars($comment['comment_body'])?></td>
                <td><?= htmlspecialchars($comment['date'])?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else : ?>
    <h3>No comments yet</h3>
<?php endif;?>