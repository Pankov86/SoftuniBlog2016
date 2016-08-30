<?php var_dump($_SESSION['af_rows'])?>
<?php var_dump($_SESSION['id'])?>

<h4>Are you sure you want to delete user <?= $this->user_name['username'] ?>?</h4>
<p>Information for this user will be saved.</p>
<p>All posts of this user will be deleted.</p>

<form method="post">
    <input type="submit" value="Delete user">
    <a href="<?= APP_ROOT?>/admin/details/<?= $this->user_id?>">Cancel</a>
</form>



