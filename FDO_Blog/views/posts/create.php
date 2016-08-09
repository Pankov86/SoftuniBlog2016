<?php $this->title = 'Create new post'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<form method="post">
    <div>Select category</div>
    <select name="category" >
        <?php $categories = $this->model->getCategories() ?>
        <option value="<?= $categories[0]['id'] ?>" selected="selected"><?= $categories[0]['category_name'] ?></option>

        <?php for ($i = 1; $i < count($categories); $i++): ?>
            <option value="<?=$categories[$i]['id'] ?>" ><?= $categories[$i]['category_name'] ?></option>
        <?php endfor; ?>

        <!--        --><?php //$categories = $this->model->getCategories();
        //        foreach ($categories as $category) : ?>
        <!--            <option value="--><?//=$category['id'] ?><!--" >--><?//= $category['category_name'] ?><!--</option>-->
        <!--        --><?php //endforeach; ?>
    </select>

    <div>Title:</div>
    <input type="text" name="post_title">

    <div>Content:</div>
    <textarea rows="10" name="post_content"></textarea>

    <br>
<div>Choose a tag:</div>
    <div>
    <input id="tags" name="tags" list="tag_suggestions">
        <?php $tags = $this->model->getTags() ?>

        <datalist id="tag_suggestions">
        <?php $tags = $this->model->getTags();
        foreach ($tags as $tag) : ?>
                    <option value="<?=$tag['tag_name'] ?>" ></option>
                <?php endforeach; ?>
    </datalist>
    </div>

    <div><input type="submit" value="Create post">
        <a href="<?=APP_ROOT?>/posts">[Cancel]</a></div>
</form>
