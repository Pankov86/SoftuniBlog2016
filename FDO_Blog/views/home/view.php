<?php $this->title = $this->post['title']; ?>

<main>
    <h1><?= htmlentities($this->post['title']); ?></h1>
    <p>
        <i>Posted on</i>
        <?= htmlentities($this->post['date']); ?>
        <i>by</i>
        <?= htmlentities($this->post['full_name']); ?>
    </p>
    <p><?= $this->post['content']; ?></p>

    <form id="vote-form" method="post" action="">

        <?php
            $user_id = $_SESSION['user_id'];

            if (isset($_POST['vote-button'])) {
                $this->model->vote($this->post['id'], $user_id);
                $this->post['points']++;
            }

            if (isset($_POST['unvote-button'])) {
                $this->model->unVote($this->post['id'], $user_id);
                $this->post['points']--;
            }

            var_dump($this->model->isVote($this->post['id'], $user_id));

        if ($this->model->isVote($this->post['id'], $user_id)) { ?>
            <input type="submit" value="Unvote" name="unvote-button"/>
            <?php
        } else {
            ?>
            <input type="submit" value="Vote" name="vote-button"/>

            <?php
        }


        ?>

    </form>
    <p><?= $this->post['points']; ?></p>

    <?php $_SESSION['post_id'] = $this->post['id'] ?>
    <?php include 'addComment.php' ?>
    <?php include 'Comments.php' ?>
</main>

