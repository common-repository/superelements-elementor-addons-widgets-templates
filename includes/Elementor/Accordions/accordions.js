(function ($, elementor) {
  "use strict";
  var $window = $(elementor);
  var seElementor = {
    onInit: function () {
      var E_FRONT = elementorFrontend;
      var widgetHandlersMap = {
        "se_accordion.default": seElementor.Accordions,
      };

      $.each(widgetHandlersMap, function (widgetName, callback) {
        E_FRONT.hooks.addAction("frontend/element_ready/" + widgetName, callback);
      });
    },
    //========================= Accordion ==============================//
    Accordions: function ($scope) {
      let accordionsToggle = $scope.find(".accordion-title");
      $(".accordion-container .accordion-item:first-child .accordion-body").show();
      $(".accordion-container .accordion-item:first-child .accordion-title").addClass("active");

      accordionsToggle.on("click", function () {
        $(this).toggleClass("active");
        $(this).next(".accordion-body").slideToggle();

        // close other accordions
        $(this).parent().siblings().find($(".active"))?.toggleClass("active");
        $(".accordion-body").not($(this).next()).slideUp();
      });
    },
  };
  $window.on("elementor/frontend/init", seElementor.onInit);
})(jQuery, window);
