/* Hero Carousel */
const myCarouselElement = document.querySelector('#mixedCarousel');

const carousel = new bootstrap.Carousel(myCarouselElement, {
  interval: 5000, // 5 seconds between slides
  ride: 'carousel',
  pause: false,
  wrap: true
});
