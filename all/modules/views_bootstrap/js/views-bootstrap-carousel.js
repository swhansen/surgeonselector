(function ($) {
  Drupal.behaviors.viewsBootstrapCarousel = {
    attach: function(context, settings) {
      $.each(settings.viewsBootstrap.carousel, function(id, carousel) {
        $('#views-bootstrap-carousel-' + carousel.id, context).carousel();
      });
    }
  };
})(jQuery);
