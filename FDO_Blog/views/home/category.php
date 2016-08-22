<?php $this->title = $this->category['category_name']; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<main>
    <?php foreach ($this->posts as $post) : ?>
        <h1><a href="<?=APP_ROOT?>/home/view/<?= $post['id'] ?>">
                <?= htmlentities($post['title']); ?></a></h1>
        <p>
            <i>Posted on</i>
            <?= htmlentities($post['date']); ?>
            <i>by</i>
            <?= htmlentities($post['full_name']); ?>
        </p>
        <p><?= $post['content']; ?></p>
    <?php endforeach; ?>
</main>


