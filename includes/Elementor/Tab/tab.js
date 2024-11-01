(function ($, elementor) {
  "use strict";
  var $window = $(elementor);
  var seElementor = {
    onInit: function () {
      var E_FRONT = elementorFrontend;
      var widgetHandlersMap = {
        "se_tab.default": seElementor.Tabs,
      };

      $.each(widgetHandlersMap, function (widgetName, callback) {
        E_FRONT.hooks.addAction("frontend/element_ready/" + widgetName, callback);
      });
    },
    //========================= Accordion ==============================//
    Tabs: function ( $scope ) {
      let tabContents = $scope.find(".se-tab-content-wrapper .se-tab-content");
      let tabs = $scope.find(".se-tab-wrapper .se-tab-item");
      $(tabs).on("click", function () {
        // remove active classes from all the siblings
        if ($(this).siblings().hasClass("se-tab-item-active")) {
          $(this).siblings().removeClass("se-tab-item-active");
        }
    
        // remove active classes from all tab content siblings
        tabContents.each(function (index, item) {
          if ($(item).hasClass("se-tab-content-active")) {
            $(item).removeClass("se-tab-content-active");
          }
        });
    
        // add active class into the current item
        $(this).addClass("se-tab-item-active");
    
        // active tab panel if matches the unique id
        var uniqueId = $(this).attr("id");
        tabContents.each(function (index, item) {
          if ($(item).hasClass(uniqueId)) {
            $(item).addClass("se-tab-content-active");
          }
        });
      });
    }
  };
  $window.on("elementor/frontend/init", seElementor.onInit);
})(jQuery, window);
