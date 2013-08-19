<?php print $image ?>

<?php if ($title || $description): ?>
  <div class="carousel-caption">
    <?php if ($title): ?>
      <h4><?php print $title ?></h4>
    <?php endif ?>

    <?php if ($description): ?>
      <p><?php print $description ?></p>
    <?php endif ?>
  </div>
<?php endif ?>