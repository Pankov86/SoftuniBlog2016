<?php $this->title = 'Change password'; ?>

<h1><?= htmlspecialchars($this->title) ?></h1>

<?php $old_user_info = $this->user_info ?>

<form method="post">
    <div>Old Password:</div>
    <div><input type="password" name="oldPassword"></div>

    <div>New Password:</div>
    <div><input type="password" name="newPassword"></div>

    <div>Confirm Password:</div>
    <div><input type="password" name="confirmPassword"></div>

    <div><input type="submit" value="Save changes" onsubmit="<?= $this->changePassword() ?>"></div>

</form>