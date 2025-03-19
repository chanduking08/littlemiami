/* Hero Carousel */
const myCarouselElement = document.querySelector('#mixedCarousel');

const carousel = new bootstrap.Carousel(myCarouselElement, {
  interval: 5000, // 5 seconds between slides
  ride: 'carousel',
  pause: false,
  wrap: true
});

/* Move out Soical icon from hamburger */
jQuery(document).ready(function($) {
  function moveSocialIcons() {
      if ($(window).width() <= 991) {
          if ($('.open-status .social-icons').length === 0) {
              $('.offcanvas-body .social-icons').prependTo('.open-status');
          }
      } else {
        if ($('.open-status .social-icons').length) {
          $('.open-status .social-icons').remove();
        }
      }
  }

  // Initial call
  moveSocialIcons();

  // Re-check on window resize
  $(window).resize(function() {
      moveSocialIcons();
  });
});
