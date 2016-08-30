<?php $this->title = 'Login'; ?>

<h1><?= htmlspecialchars($this->title) ?></h1>
<div class="container">
    <form method="post" class="form-horizontal">

        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Username or E-mail:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="email" name="username"
                       placeholder="Enter email or username" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Password:</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" id="pwd" name="password"
                       placeholder="Enter password" required>
            </div>
        </div>

            <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-default">Login</button>

    </form>
</div>

<form class="form-horizontal">
    <div><a href="<?=APP_ROOT?>/users/resetPass" class="text-info">Forgot your password?</a></div>
</form>
