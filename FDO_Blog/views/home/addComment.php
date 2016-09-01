<form id="comment-form" method="post" class="form-horizontal">
    <div><h3>Add new comment</h3></div>


    <div class="form-group">
        <div class="col-lg-4">
            <textarea class="form-control" rows="5" id="textArea" name="comment_content"
                      placeholder="Write your comment" required></textarea>
        </div>
    </div>

    <div>
        <button type="submit" class="btn btn-primary" onsubmit="<?=
        $id = $this->post['id'];
        $this->addComment($id)?>">Add comment</button>
         <button type="reset" class="btn btn-default">
            <a href="<?=APP_ROOT?>/home/view/<?=$this->post['id']?>">Delete text</a></button></div>
</form>
