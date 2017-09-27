<?php
 $post = $di->get("url")->create("comment/post");
 $delete = $di->get("url")->create("comment/delete");
 $edit = $di->get("url")->create("comment/edit");
?>

<form action="<?= $post ?>" method="post" class="commentSection">
  Kommentar:<br>
  <!--<input type="text" name="comment">!-->
  <textarea rows="4" cols="50" name="comment" class="input">
  </textarea>
  <input type="submit" value="Skriv Kommentar" class="formButton">
</form>

<?php
if ($comments) {
    foreach ($comments as $comment) :
?>
<div class="comment">
<img src="<?=$comment->gravatar ?>" class="gravatar"/>

<p class="email"><?= $comment->user ?></p>

<p><?= $comment->content?></p>
<?php
if ($di->get("session")->get("username") == $comment->user || $di->get("session")->has("admin") ) {
?>
<a href="<?= $delete."/$comment->id" ?>"> Ta bort </a>
<a href="<?= $edit."/$comment->id" ?>"> Redigera </a>
<?php
}
 ?>
</div>
<?php
    endforeach;
}?>
