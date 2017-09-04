<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>

    <?php foreach ($stylesheets as $stylesheet) : ?>
    <link rel="stylesheet" type="text/css" href="<?= $this->asset($stylesheet) ?>">
    <?php endforeach; ?>

</head>
<body>

<div class="header-wrap">
<?php if ($this->regionHasContent("navbar")) : ?>
    <?php $this->renderRegion("navbar") ?>
<?php endif; ?>
</div>

<?php if ($this->regionHasContent("main")) : ?>
<div class="main-wrap">
  <div class="main">
    <?php $this->renderRegion("main") ?>
  </div>
</div>
<?php endif; ?>

<?php if ($this->regionHasContent("footer")) : ?>
<div class="footer-wrap">
    <?php $this->renderRegion("footer") ?>
</div>
<?php endif; ?>

</body>
</html>
