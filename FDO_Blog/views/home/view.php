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

    <form id="comment-form" method="post" onsubmit="<?=$this->addComment($this->post['id'])?>">
        <div><h3>Add new comment</h3></div>
    <textarea name="content" cols="50" rows="5" placeholder="Write your comment" required
    ></textarea>
        <div><input type="submit" value="Add comment" >
    </form>

    <?php include 'comments.php' ?>
</main>