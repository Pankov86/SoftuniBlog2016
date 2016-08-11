<?php $this->title = 'Delete Comment'; ?>


<h1><?=htmlspecialchars($this->title)?></h1>

<form method="post">
    <div>Content:</div>
    <textarea rows="10" name="comment_body" disabled
    ><?=htmlspecialchars($this->comment['comment_body'])?></textarea>
    <div><input type="submit" value="Delete Comment">
        <a href="<?=APP_ROOT?>/posts">[Cancel]</a></div>
</form>
