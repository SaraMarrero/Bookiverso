var glide01 = new Glide('.glide-01', {
    type: 'carousel',
    focusAt: 'center',
    perView: 6,
    autoplay: 3000,
    animationDuration: 700,
    gap: 24,
    classes: {
        activeNav: '[&>*]:bg-slate-700',
    },
    breakpoints: {
        1200: {
            perView: 4
        },
        900: {
            perView: 3
        },
        600: {
            perView: 2
        },
        473: {
            perView: 1
        }
    },
});

glide01.mount();