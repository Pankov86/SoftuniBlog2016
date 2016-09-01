<?php $this->title = 'Edit user info'; ?>

<legend><h1><?= htmlspecialchars($this->title) ?></h1></legend>

<?php $old_user_info = $this->user_info ?>

<form method="post" class="form-horizontal" >

    <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Full Name:</label>
        <div class="col-lg-4">
            <input type="text" class="form-control" id="inputName" name="newFullname" placeholder="Your name">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-lg-2 control-label">New Email:</label>
        <div class="col-lg-4">
            <input type="text" class="form-control" id="inputEmail" name="newEmail" placeholder="Your e-mail">
        </div>
    </div>

    <div class="form-group">
        <label for="textArea" class=" col-lg-2 control-label">About me:</label>
        <div class="col-lg-4">
            <textarea class="form-control" rows="5" id="textArea" name="newAboutMe" placeholder="Information about you" ></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            <button type="submit" class="btn btn-primary" onsubmit="<?=$this->editUserInfo() ?>">Save changes</button>

            <button type="reset" class="btn btn-default"><a href="<?=APP_ROOT?>/users/profile">Cancel</a></button>
        </div>
    </div>
</form>
