<form id="comment-form" method="post">
    <div><h3>Add new comment</h3></div>
    <textarea name="comment_content" cols="50" rows="5" placeholder="Write your comment" required
    ></textarea>
    <div><input type="submit" value="Add comment" onsubmit="<?=
        $id = $this->post['id'];
        $this->addComment($id)?>">
        <a href="<?=APP_ROOT?>/home/view/<?=$this->post['id']?>">[Cancel]</a></div>
</form>