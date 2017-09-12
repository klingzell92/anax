<?php
 $post = $app->url->create("comment/post");
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
<img src="<?=$comment[1] ?>" class="gravatar"/>

<p class="email"><?= $comment[0] ?></p>

<p><?= $comment[2]?></p>
</div>
<?php
    endforeach;
}?>
