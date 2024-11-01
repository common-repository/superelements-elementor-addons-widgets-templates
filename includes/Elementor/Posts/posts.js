(function ($, elementor) {
  "use strict";
  var $window = $(elementor);

  var postWidget = {
    onInit: function () {
      var E_FRONT = elementorFrontend;
      var widgetHandlersMap = {
        "se_post.default": postWidget.PostGrid,
      };

      $.each(widgetHandlersMap, function (widgetName, callback) {
        E_FRONT.hooks.addAction("frontend/element_ready/" + widgetName, callback);
      });
    },
    //========================= Post Slider ==============================//
    PostGrid: function ($scope) {
      let postSlider = $scope.find(".se-post-slider");
      if (postSlider.length) {
        postSlider.slick({
          autoplay: false,
          infinity: false,
          prevArrow:
            '<button type="button" class="slick-prev" aria-label="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg></button>',
          nextArrow:
            '<button type="button" class="slick-next" aria-label="slide-right"><svg xmlns="http://www.w3.org/2000/svg", fill="none", viewBox="0 0 24 24", stroke-width="1.5", stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" /></svg></button>',
          responsive: [
            {
              breakpoint: 1780,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
              },
            },
            {
              breakpoint: 1279,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
              },
            },
            {
              breakpoint: 1023,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
              },
            },
            {
              breakpoint: 639,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              },
            },
          ],
        });
      }
    },
  };
  $window.on("elementor/frontend/init", postWidget.onInit);
})(jQuery, window);
