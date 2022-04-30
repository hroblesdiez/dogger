class TestimonialSlider {
    constructor() {
const swiper = new Swiper('.swiper', {
    // Optional parameters
    slidesPerView: 1,
    spaceBetween: 15,
    loop: true,
    speed: 2000,
    lazyLoading: true,
    keyboard: {
        enabled: true
      },
    autoplay: true,
    effect: 'fade',
    fadeEffect: {
        crossFade: true
    },
    
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  
  });
}
}
export default TestimonialSlider
