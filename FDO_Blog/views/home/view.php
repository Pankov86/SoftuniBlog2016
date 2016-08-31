<?php $this->title = $this->post['title']; ?>

<main>
    <h1><?= htmlentities($this->post['title']); ?></h1>
    <p>
        <i>Posted on</i>
        <?= htmlentities($this->post['date']); ?>
        <i>by</i>
        <a href="<?=APP_ROOT?>/users/profile/<?=$post['user_id']?>"><?= htmlentities($this->post['full_name']); ?></a>

        <?php if ($this->post['date_edited'] != '0000-00-00 00:00:00') :?>
            <i> // Last edit: </i>
            <?= htmlentities($this->post['date_edited']); ?>
        <?php endif; ?>

    </p>
    <p><?= $this->post['content']; ?></p>

    <form id="vote-form" method="post" action="">


        <?php
            if (isset($_SESSION['user_id'])){
                $user_id = $_SESSION['user_id'];

                if (isset($_POST['vote-button'])) {
                    $this->model->vote($this->post['id'], $user_id);
                    $this->post['points']++;
                }

                if (isset($_POST['unvote-button'])) {
                    $this->model->unVote($this->post['id'], $user_id);
                    $this->post['points']--;
                }

                if ($this->model->isVote($this->post['id'], $user_id)) { ?>
                    <input type="submit" value="I don't give a fuck" name="unvote-button"/>
                    <?php
                } else {
                    ?>
                    <input type="submit" value="I give a fuck" name="vote-button"/>
                    <?php
                }
            }
        ?>
    </form>

    <h4>Fucks given for this post: <?= $this->post['points']; ?></h4>

    <?php
        if (isset($_SESSION['user_id'])){
            $_SESSION['post_id'] = $this->post['id'] ;
            include 'addComment.php';
        }
        else if (!isset($_SESSION['user_id'])): ?>
            <h4>
                <a href="<?= APP_ROOT?>/users/login">Login to leave a comment</a>
            </h4>
    <?php endif; ?>

    <?php include 'Comments.php' ?>
</main>

