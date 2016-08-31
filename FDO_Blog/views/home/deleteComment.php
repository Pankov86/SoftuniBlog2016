<?php $this->title = 'Delete Comment'; ?>

<legend><h1><?=htmlspecialchars($this->title)?></h1></legend>


<div class="form-group">
    <form method="post">
        <div class="col-lg-10 col-lg-offset-2">
            <button type="reset" class="btn btn-default"><a href="<?=APP_ROOT?>/posts">Cancel</a></button>
            <button type="submit" class="btn btn-primary">Delete comment</button>
        </div>
    </form>
</div>
