<?php $this->title = 'Delete post'; ?>



<form class="form-horizontal" method="post">
    <fieldset>
        <legend><h1><?=htmlspecialchars($this->title)?></h1>
        </legend>


        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Title:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="inputEmail" name="post_title" value="<?=htmlspecialchars($this->post['title'])?>" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="textArea" class=" col-lg-2 control-label">Content</label>
            <div class="col-lg-10">
                <textarea class="form-control" rows="5" id="textArea" disabled><?=htmlspecialchars($this->post['content'])?></textarea>
            </div>
        </div>


        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" class="btn btn-primary">Delete post</button>
                <button type="reset" class="btn btn-default"><a href="<?=APP_ROOT?>/posts">Cancel</a></button>
            </div>
        </div>
    </fieldset>
</form>
