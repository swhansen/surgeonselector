<?php
/**
 * @file
 * Provide views data and handlers.
 */

/**
 * Implements hook_views_plugins().
 */
function views_bootstrap_views_plugins() {
  $module_path = drupal_get_path('module', 'views_bootstrap');

  return array(
    'style' => array(
      'views_bootstrap_carousel_plugin_style' => array(
        'title' => t('Bootstrap Carousel'),
        'help' => t('Bootstrap Carousel Style'),
        'path' => $module_path . '/plugins/carousel',
        'handler' => 'ViewsBootstrapCarouselPluginStyle',
        'parent' => 'default',
        'theme' => 'views_bootstrap_carousel_plugin_style',
        'theme path' => $module_path . '/templates/carousel',
        'theme file' => 'theme.inc',
        'uses row plugin' => TRUE,
        'uses grouping' => FALSE,
        'uses options' => FALSE,
        'type' => 'normal',
      ),
      'views_bootstrap_thumbnail_plugin_style' => array(
        'title' => t('Bootstrap Thumbnails'),
        'help' => t('Bootstrap Thumbnails Style'),
        'path' => $module_path . '/plugins/thumbnail',
        'handler' => 'ViewsBootstrapThumbnailPluginStyle',
        'parent' => 'default',
        'theme' => 'views_bootstrap_thumbnail_plugin_style',
        'theme path' => $module_path . '/templates/thumbnail',
        'theme file' => 'theme.inc',
        'uses row plugin' => TRUE,
        'uses grouping' => TRUE,
        'uses options' => TRUE,
        'type' => 'normal',
      ),
      'views_bootstrap_grid_plugin_style' => array(
        'title' => t('Bootstrap Grid'),
        'help' => t('Bootstrap Grid Style'),
        'path' => $module_path . '/plugins/grid',
        'handler' => 'ViewsBootstrapGridPluginStyle',
        'parent' => 'default',
        'theme' => 'views_bootstrap_grid_plugin_style',
        'theme path' => $module_path . '/templates/grid',
        'theme file' => 'theme.inc',
        'uses row plugin' => TRUE,
        'uses grouping' => TRUE,
        'uses options' => TRUE,
        'type' => 'normal',
      ),
      'views_bootstrap_accordion_plugin_style' => array(
        'title' => t('Bootstrap Accordion'),
        'help' => t('Bootstrap Accordion Style'),
        'path' => $module_path . '/plugins/accordion',
        'handler' => 'ViewsBootstrapAccordionPluginStyle',
        'parent' => 'default',
        'theme' => 'views_bootstrap_accordion_plugin_style',
        'theme path' => $module_path . '/templates/accordion',
        'theme file' => 'theme.inc',
        'uses row plugin' => TRUE,
        'uses grouping' => TRUE,
        'uses options' => TRUE,
        'type' => 'normal',
      ),
    ),
    'row' => array(
      'views_bootstrap_carousel_plugin_rows' => array(
        'title' => t('Bootstrap Carousel'),
        'help' => t('Choose the fields to display in Bootstrap Carousel Style.'),
        'path' => $module_path . '/plugins/carousel',
        'handler' => 'ViewsBootstrapCarouselPluginRows',
        'theme' => 'views_bootstrap_carousel_plugin_rows',
        'theme path' => $module_path . '/templates/carousel',
        'theme file' => 'theme.inc',
        'uses fields' => TRUE,
        'uses options' => TRUE,
        'type' => 'normal',
      ),
    ),
  );
}
