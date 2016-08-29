<?php $this->title = 'Edit post'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<form method="post">
    
    <div>Title:</div>
    <input type="text" name="post_title"
            value="<?=htmlspecialchars($this->post['title'])?>">

    <div>Content:</div>
    <textarea rows="10" name="post_content"
    ><?=htmlspecialchars($this->post['content'])?></textarea>

    <div><input type="submit" value="Edit post">
        <a href="<?=APP_ROOT?>/posts">[Cancel]</a></div>
</form>