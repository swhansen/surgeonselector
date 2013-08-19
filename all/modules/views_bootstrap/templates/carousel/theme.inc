<?php

/**
 * Implementation of template preprocess for the view.
 */
function template_preprocess_views_bootstrap_carousel_plugin_style(&$vars) {
  drupal_add_js(array(
    'viewsBootstrap' => array(
      'carousel' => array(
        $vars['id'] => array(
          'id' => $vars['id'],
          'name' => $vars['view']->name,
        ),
      ),
    ),
  ), 'setting');

  drupal_add_js(drupal_get_path('module', 'views_bootstrap') . '/js/views-bootstrap-carousel.js');

  $vars['classes_array'][] = 'carousel slide';

  $vars['navigation'] = (bool)$vars['options']['navigation'];
  $vars['indicators'] = (bool)$vars['options']['indicators'];

  // Add attributes.
  $vars['attributes_array']['data-interval'] = $vars['options']['interval'] ? $vars['options']['interval'] : FALSE;
  $vars['attributes_array']['data-pause'] = $vars['options']['pause'] ? 'hover' : FALSE;

  $vars['attributes_array']['data-pause'] = FALSE;
}

/**
 * Implementation of template preprocess for the view fields.
 */
function template_preprocess_views_bootstrap_carousel_plugin_rows(&$vars) {
  $view = &$vars['view'];

  foreach ($vars['options'] as $id => $field) {
    if (isset($view->field[$field])) {
      $vars[$id] = $view->field[$field]->theme($vars['row']);
    }
  }
}
