<?php
 $post = $di->get("url")->create("comment/post");
 $delete = $di->get("url")->create("comment/delete");
 $edit = $di->get("url")->create("comment/edit");
?>

<form action="<?= $post ?>" method="post" class="commentSection">
  Email:<br>
  <input type="text" name="email" class="input"><br>
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
<img src="<?=$comment[2] ?>" class="gravatar"/>

<p class="email"><?= $comment[1] ?></p>

<p><?= $comment[3]?></p>
<a href="<?= $delete."/$comment[0]" ?>"> Ta bort </a>
<a href="<?= $edit."/$comment[0]" ?>"> Redigera </a>
</div>
<?php
    endforeach;
}?>
