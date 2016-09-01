<?php $this->title = 'Change password'; ?>

<legend><h1><?= htmlspecialchars($this->title) ?></h1></legend>

<div class="container">
    <form method="post" class="form-horizontal">

        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Enter old password:</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" id="pwd" name="old_password"
                       placeholder="Enter old password" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Enter new password:</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" id="pwd" name="new_password"
                       placeholder="Enter new password" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Confirm new password:</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" id="pwd" name="confirm_password"
                       placeholder="Enter old password" required>
            </div>
        </div>


        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button class="btn btn-primary" onsubmit="<?= $this->changePassword() ?>">Save changes</button>
                <button type="reset" class="btn btn-default"><a href="<?=APP_ROOT?>/users/profile">Cancel</a></button>

            </div>
        </div>

    </form>
</div>
