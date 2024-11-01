(function ($, elementor) {
  "use strict";
  var $window = $(elementor);
  var tabsItem = $(".se-pricing-tab-item");

  var seElementor = {
    onInit: function () {
      var E_FRONT = elementorFrontend;
      var widgetHandlersMap = {
        "se_pricing_tabs.default": seElementor.PricingTabs,
      };

      $.each(widgetHandlersMap, function (widgetName, callback) {
        E_FRONT.hooks.addAction("frontend/element_ready/" + widgetName, callback);
      });
    },
    //========================= Post Slider ==============================//
    PricingTabs: function ($scope) {
      // Yearly tab
      $(".se-pricing-tab-wrapper button:last-child").on("click", function () {
        $(this).addClass("active");
        $(".se-pricing-tab-wrapper button:first-child").removeClass("active");

        let getPrice = $(this).parents(".se-tab-container").find(".pricing-content");
        getPrice.each(function () {
          let dataYearlyPrice = $(this).find("a span:first-child").data("yearly");
          $(this).find("a span:first-child").html(dataYearlyPrice);
          // Change link
          let dataYearlyLink = $(this).find("a").data("yearly-url");
          $(this).find("a").attr("href", dataYearlyLink);
        });
      });
      // Monthly Tab
      $(".se-pricing-tab-wrapper button:first-child").on("click", function () {
        $(this).addClass("active");
        $(".se-pricing-tab-wrapper button:last-child").removeClass("active");

        let getPrice = $(this).parents(".se-tab-container").find(".pricing-content");
        getPrice.each(function () {
          let dataMonthlyPrice = $(this).find("a span:first-child").data("monthly");
          $(this).find("a span:first-child").html(dataMonthlyPrice);
          // Change link
          let dataMonthlyLink = $(this).find("a").data("monthly-url");
          $(this).find("a").attr("href", dataMonthlyLink);
        });
      });
    },
  };
  $window.on("elementor/frontend/init", seElementor.onInit);
})(jQuery, window);
