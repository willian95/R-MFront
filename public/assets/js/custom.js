$(document).ready(function () {
    setTimeout(function () {
      $(".loader").fadeOut(500);
    }, 4000);
  });

/***********slider home service**************** */
$(document).ready(function () {
    $(".slick-categories").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
    });
    $(".slider-servicio").slick({
        dots: false,
        infinite: true,
        speed: 300,
        autoplay: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ],
    });

    $(".see-more").on("click", function () {
        if (!$(".more-info-service-1").hasClass("is-active")) {
            $(".more-info-service-1").addClass("is-active");
        } else {
            $(".more-info-service-1").removeClass("is-active");
        }
    });
});

/*************************filterhome**********************************/
$(document).ready(function () {
    var customContainer = jQuery(".iso-container");
    customContainer.isotope({
      filter: ".caninos",
      transitionDuration: "2s",
      animationOptions: {
        duration: 7500,
        queue: false
      },

      layoutMode: "fitRows",
      fitRows: {
        gutter: 0
      }
    });

    jQuery("#custom-filter li:first-child > a").addClass("is-checked");

    jQuery("#custom-filter a").click(function () {
      jQuery("#custom-filter .is-checked").removeClass("is-checked");
      jQuery(this).addClass("is-checked");

      var customSelector = jQuery(this).attr("data-filter");
      customContainer.isotope({
        filter: customSelector,
        transitionDuration: "2s",
        animationOptions: {
          duration: 7500,
          queue: false
        },
        layoutMode: "fitRows",
        fitRows: {
          gutter: 0
        }
      });
      return false;
    });
  });


  /************************ejemplo filtro tienda (se que lo van a borrar.com)******************************* */
  function increaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('number').value = value;
  }

  function decreaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    document.getElementById('number').value = value;
  }


  /*************relacionados******************** */
  /***********slider home service**************** */
$(document).ready(function () {

    $(".slider-relacionados").slick({
        dots: false,
        infinite: true,
        speed: 300,
        autoplay: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ],
    });

});
