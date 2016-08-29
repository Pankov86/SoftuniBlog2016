<?php
//    if (isset($_SESSION['user_id'])){
         if ($this->comments): ?>
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

                        <?php if (isset($_SESSION['user_id]']) && $_SESSION['user_id'] == $comment['author_id']) : ?>
                            <td>
                                <a href="<?=APP_ROOT?>/home/deleteComment/<?=$comment['id']?>">[Delete]</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <h3>No comments yet</h3>
        <?php endif; ?>
<?php
//    }
//?>