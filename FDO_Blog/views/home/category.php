<?php $this->title = $this->category['category_name']; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<aside>
    <h2>Categories</h2>
    <?php foreach ($this->categories as $category) : ?>
        <a href="<?=APP_ROOT?>/home/category/<?=$category['id']?>"><?= htmlentities($category['category_name']); ?></a>
    <?php endforeach; ?>
</aside>

<main>
    <?php foreach ($this->posts as $post) : ?>
        <h1><?= htmlentities($post['title']); ?></h1>
        <p>
            <i>Posted on</i>
            <?= htmlentities($post['date']); ?>
            <i>by</i>
            <?= htmlentities($post['full_name']); ?>
        </p>
        <p><?= $post['content']; ?></p>
    <?php endforeach; ?>
</main>


