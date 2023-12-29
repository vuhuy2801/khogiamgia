new Swiper(".testimonials-slider", {
    speed: 600,
    breakpoints: {
        320: {
            slidesPerView: 3,
            spaceBetween: 40,
        },

        768: {
            slidesPerView: 3,
            spaceBetween: 40,
        },
        1024: {
            slidesPerView: 4,
            spaceBetween: 50,
        },
        1200: {
            slidesPerView: 5,
        },
    },
});
