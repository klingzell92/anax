<?php
 $save = $di->get("url")->create("comment/save");

?>

<form action="<?= $save ?>" method="post" class="commentSection">
  Email:<br>
  <input type="text" name="email" class="input" value="<?= $values[1] ?>"><br>
  Kommentar:<br>
  <textarea rows="4" cols="50" name="comment" class="input">
<?= $values[3] ?>
  </textarea>
  <input type="hidden" name="id" value="<?= $values[0] ?>">
  <input type="submit" value="Spara ändringar" class="formButton">
</form>
