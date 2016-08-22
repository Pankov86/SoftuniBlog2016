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

    <form id="vote-form" method="post" action="<?php

    if (isset($_POST['vote-button']))
    {
        if ($this->isPost) {
            $user_id = $_SESSION['user_id'];
            if ($this->model->vote($this->post['id'], $user_id)) {
                header("Location: " . APP_ROOT . '/home/view/' . $this->post['id']);
            }
        }
    }
    ?>">
        <input type="submit" value="Vote" name="vote-button"/>
    </form>
    <p><?= $this->post['points']; ?></p>

    <?php $_SESSION['post_id'] = $this->post['id'] ?>
    <?php include 'addComment.php' ?>
    <?php include 'Comments.php' ?>
</main>

