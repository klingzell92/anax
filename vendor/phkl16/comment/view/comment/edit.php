<?php
 $save = $di->get("url")->create("comment/save");

?>

<form action="<?= $save ?>" method="post" class="commentSection">
  Email:<br>
  <input type="text" name="user" class="input" value="<?= $values->user ?>"><br>
  Kommentar:<br>
  <textarea rows="4" cols="50" name="comment" class="input">
<?= $values->content ?>
  </textarea>
  <input type="hidden" name="id" value="<?= $values->id ?>">
  <input type="submit" value="Spara ändringar" class="formButton">
</form>
