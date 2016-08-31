<legend><h1><?=htmlspecialchars($this->title)?></h1></legend>

<main>
    <?php foreach ($this->posts as $post) : ?>
        <h1><a href="<?=APP_ROOT?>/home/view/<?= $post['id'] ?>">
            <?= htmlentities($post['title']); ?></a></h1>

        <p>
            <i>Posted on</i>
            <?= htmlentities($post['date']); ?>
            <i>by</i>
            <a href="<?=APP_ROOT?>/users/profile/<?=$post['user_id']?>"><?= htmlspecialchars($post['full_name'])?></a>
        </p>

        <p><?= $post['content']; ?></p>
    <?php endforeach; ?>
</main>


