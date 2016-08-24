<?php $this->title = 'Change password'; ?>

<h1><?= htmlspecialchars($this->title) ?></h1>

<form method="post">
    <div>Enter old Password:</div>
    <div><input type="password" name="old_password"></div>

    <div>Enter new Password:</div>
    <div><input type="password" name="new_password"></div>

    <div>Confirm new Password:</div>
    <div><input type="password" name="confirm_password"></div>

    <div><input type="submit" value="Save changes" onsubmit="<?= $this->changePassword() ?>"></div>

</form>