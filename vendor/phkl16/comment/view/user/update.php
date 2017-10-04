<?php
$profile = $di->get("url")->create("user/profile");
$admin = $di->get("url")->create("user/admin");

?>

<h1>Updatera användare</h1>
<div class="form">
<?= $form ?>


<a href="<?= $profile ?>" class="navButton">Profil</a>

<?php if ($di->get("session")->has("admin")) {?>
    <a href="<?=$admin?>" class="navButton">Admin</a>
<?php } ?>
</div>
