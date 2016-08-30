<?php $this->title = 'Register New User'; ?>

<h1><?= htmlspecialchars($this->title) ?></h1>


<!--    <div>About me(optional):</div>-->

<div class="container">
    <form method="post" class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Username:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="email" name="username"
                       placeholder="Enter username" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Password:</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" id="pwd" name="password"
                       placeholder="Enter password" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Confirm password:</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" id="pwd" name="confirm_password"
                       placeholder="Re-enter password" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Full name:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="email" name="full_name"
                       placeholder="Enter full name" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email address:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="email" name="email"
                       placeholder="Enter email address" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="email">*About me:</label>
            <div class="col-sm-4">
                <textarea rows="10" class="form-control" id="email" name="About"
                       placeholder="Tell us something about yourself"></textarea>
            </div>
        </div>
c
        <div class="checkbox">
            <label><input type="checkbox"> Remember me</label>
        </div>

        <button type="submit" class="btn btn-default">Register</button>

    </form>
</div>
