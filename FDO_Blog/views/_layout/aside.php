<aside>
    <h2>Categories</h2>
    <a href="<?=APP_ROOT?>/home/">All</a>
    <?php
    $categories = HomeController::getAllCategories();
    foreach ($categories as $category) : ?>
        <a href="<?=APP_ROOT?>/home/category/<?=$category['id']?>"><?= htmlentities($category['category_name']); ?></a>
    <?php endforeach; ?>
</aside>