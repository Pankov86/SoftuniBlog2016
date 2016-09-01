<?php $this->title = 'Create new post'; ?>

<form class="form-horizontal" method="post">
    <fieldset>
        <legend><h1><?=htmlspecialchars($this->title)?></h1>
        </legend>
        <aside>
            <h3>Rules for posting</h3>
            <ul>-Don't spam</ul>
            <ul>-Don't use profanity</ul>
            <ul>-Your post must be related to the category </ul>
        </aside>

        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Title:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="inputEmail" name="post_title" placeholder="Your title">
            </div>
        </div>

        <div class="form-group">
            <label for="textArea" class=" col-lg-2 control-label">Textarea</label>
            <div class="col-lg-10">
                <textarea class="form-control" rows="5" id="textArea" name="post_content" placeholder="Your text" ></textarea>
            </div>
        </div>


        <div class="form-group">
            <label for="select" class="col-lg-2 control-label">Select category:</label>
            <div class="col-lg-10">
                <select class="form-control" id="select" name="category">
                    <?php $categories = $this->model->getCategories() ?>
                    <option value="<?= $categories[0]['id'] ?>" selected="selected"><?= $categories[0]['category_name'] ?></option>


                    <?php for ($i = 1; $i < count($categories); $i++): ?>
                        <option value="<?=$categories[$i]['id'] ?>" ><?= $categories[$i]['category_name'] ?></option>
                    <?php endfor; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="select" class="col-lg-2 control-label" name="tag_name" id="tags" list="tag_suggestions">Choose a tag:</label>
            <div class="col-lg-10">

                <?php $tags = $this->model->getTags() ?>

                <select class="form-control" id="tags" name="tag_name" list="tag_suggestions" placeholder="Pick a tag" id="tag_suggestions">
                    <?php $tags = $this->model->getTags();
                    foreach ($tags as $tag) : ?>
                        <option value="<?=$tag['tag_name'] ?>" ><?=$tag['tag_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default"><a href="<?=APP_ROOT?>/posts">Cancel</a></button>
                <button type="submit" class="btn btn-primary">Create post</button>
            </div>
        </div>
    </fieldset>
</form>
