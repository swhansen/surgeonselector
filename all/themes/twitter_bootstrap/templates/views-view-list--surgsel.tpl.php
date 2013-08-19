<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */
?>
<?php 
print $wrapper_prefix; ?>
  <?php if (!empty($title)) : ?>
    <h3><?php print $title; ?></h3>
  <?php endif; ?>
  <?php print $list_type_prefix; ?>
    <?php foreach ($rows as $id => $row): ?>
      <li class="<?php print $classes_array[$id]; ?>"><?php print $row; ?></li>
<?php    

/** inject the HTML for the Book Online button on every Physician query -swh
 echo "<html>";
 echo "<title>HTML with PHP</title>";
 echo "<b>My Example</b>";
 Print "<i>Test Rows in views-view-list</i>";  
 */
 print '<form action="http://127.0.0.1/drupal/node/12">
    <input type="submit" class="bookonline" value="Book Online">
</form> ';
 echo '&nbsp';
 echo "<hr>";
 echo '&nbsp';
   ?>   
  
    <?php endforeach; ?>
  <?php print $list_type_suffix; ?>
<?php print $wrapper_suffix; ?>











