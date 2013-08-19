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
    
          
        <li class="<?php print $classes_array[$id]; ?>">
          <?php print $row; ?>
          <!-- <form action="http://www.surgeonselector.com/drupal/node/12">
            <input type="submit" class="fsBookOnline" value="Book Online">
          </form> 
            <div class="views-field views-field-field-bookOnline">        
              <div class="field-content">
                <a href="/drupal-7.22/node/2/" >
                  <button class="fsBookOnline">Book Online</button>
                </a>
              </div>  
            </div>-->
          </li>
        <?php    

/** inject the HTML for the Book Online button on every Physician query -swh
 echo "<html>";
 echo "<title>HTML with PHP</title>";
 echo "<b>My Example</b>";
 Print "<i>Test Rows in views-view-list</i>";  
 */

   ?>  

 
  
    <?php endforeach; ?>

  <?php print $list_type_suffix; ?>
<?php print $wrapper_suffix; ?>











