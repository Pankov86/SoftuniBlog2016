<?php
//    if (isset($_SESSION['user_id'])){
         if ($this->comments): ?>
            <h3>Comments</h3>
            <table style="width: 95%" class="table table-stripped">
                <tr class="info">
                    <th>User</th>
                    <th>Content</th>
                    <th>Posted on</th>
                </tr>

                <?php
                foreach ($this->comments as $comment) : ?>
                    <tr>
                        <?php if ($comment['full_name']) : ?>
                            <td><?= htmlspecialchars($comment['full_name'])?></a></td>
                        <?php elseif (!$comment['full_name']) : ?>
                            <td><i>Anonymous</i></td>
                        <?php endif; ?>
                        <td><?= htmlspecialchars($comment['comment_body'])?></td>
                        <td><?= htmlspecialchars($comment['date'])?></td>

                        <?php if ((isset($_SESSION['user_id']) && $_SESSION['user_id'] == $comment['author_id']) ||
                            (isset($_SESSION['user_id']) && $_SESSION['group_name'] == 'admin')) : ?>

                            <td>
                                <a href="<?=APP_ROOT?>/home/deleteComment/<?=$comment['id']?>">[Delete comment]</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <h3>No comments yet</h3>
        <?php endif; ?>



