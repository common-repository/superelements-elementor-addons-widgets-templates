(function ($, elementor) {
  "use strict";
  console.log("WooCommerce Products loop")
  var $window = $(elementor);

  var productWidget = {
    onInit: function () {
      var E_FRONT = elementorFrontend;
      var widgetHandlersMap = {
        "se_products.default": productWidget.Products,
      };

      $.each(widgetHandlersMap, function (widgetName, callback) {
        E_FRONT.hooks.addAction("frontend/element_ready/" + widgetName, callback);
      });
    },
  };
  $window.on("elementor/frontend/init", productWidget.onInit);
})(jQuery, window);
