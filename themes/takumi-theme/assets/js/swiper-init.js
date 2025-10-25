/**
 * Swiper Initialization
 */
document.addEventListener('DOMContentLoaded', function() {
  const swiperContainer = document.querySelector('.swiper-container');

  if (swiperContainer) {
    new Swiper('.swiper-container', {
      loop: true,
      effect: 'fade',
      autoplay: {
        delay: 2000,
        disableOnInteraction: false,
      },
      speed: 2000,
    });
  }
});
