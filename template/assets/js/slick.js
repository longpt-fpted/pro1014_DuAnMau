
$('#news-box').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="display: block;"><i class="fal fa-angle-left"></i></button>',
    nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button" style="display: block;"><i class="fal fa-angle-right"></i></button>',
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      }
    ]
});
$('#hot-items').slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 3,
  prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="display: block;"><i class="fal fa-angle-left"></i></button>',
  nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button" style="display: block;"><i class="fal fa-angle-right"></i></button>',
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }
  ]
});
