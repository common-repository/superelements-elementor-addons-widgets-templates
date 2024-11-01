(function ($, elementor) {
    "use strict";
    var $window = $(elementor);
    var tabsItem = $(".se-pricing-tab-item");
  
    var seElementor = {
      onInit: function () {
        var E_FRONT = elementorFrontend;
        var widgetHandlersMap = {
          "se_image_hotspot.default": seElementor.imageHotspot,
        };
  
        $.each(widgetHandlersMap, function (widgetName, callback) {
          E_FRONT.hooks.addAction("frontend/element_ready/" + widgetName, callback);
        });
      },
      //========================= Post Slider ==============================//
      imageHotspot: function ($scope) {
        let button = $scope.find('.pointer button');
        button.on('click', function(e){
            e.preventDefault();
          //  $(this).siblings('.pointer-content').toggle();
            console.log($(this).siblings('.pointer-content'));
        });
      },
    };
    $window.on("elementor/frontend/init", seElementor.onInit);
  })(jQuery, window);
  