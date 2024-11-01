(function ($, elementor) {
  "use strict";

  // Quantity increment and decrement buttons
  function dynamicQuantity(params) {
    if (params.length) {
      $(params).each(function () {
        if ($(this).find(".quantity-btn-wrapper").length) {
          $(this).find(".quantity-btn-wrapper").remove();
        }
        if ($(this).find(".quantity-btn-wrapper").length == 0) {
          $(this)
            .find('input[type="number"]')
            .after(
              $(
                '<div class="quantity-btn quantity-btn-up"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" /></svg></i></div>'
              )
            );
          $(this)
            .find('input[type="number"]')
            .before(
              $(
                '<div class="quantity-btn quantity-btn-down"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M3.75 12a.75.75 0 01.75-.75h15a.75.75 0 010 1.5h-15a.75.75 0 01-.75-.75z" clip-rule="evenodd" /></svg></div>'
              )
            );
        }

        var counterWrapper = jQuery(this),
          input = counterWrapper.find('input[type="number"]'),
          onBtnUp = counterWrapper.find(".quantity-btn-up"),
          onBtnDown = counterWrapper.find(".quantity-btn-down"),
          step = parseInt(input.attr("step")),
          min = input.attr("min"),
          max = input.attr("max") === "" ? 10000 : input.attr("max");

        var inputValue = input.val() === "" ? 0 : input.val();

        input.val(inputValue);

        onBtnUp.off("click").on("click", function () {
          var oldValue = parseFloat(input.val());
          if (oldValue >= max) {
            var newVal = oldValue;
          } else {
            if (step) {
              var newVal = oldValue + step;
            } else {
              var newVal = oldValue + 1;
            }
          }
          counterWrapper.find("input").val(newVal);
          counterWrapper.find("input").trigger("change");
        });

        onBtnDown.off("click").on("click", function () {
          var oldValue = parseFloat(input.val());
          if (oldValue <= min) {
            var newVal = oldValue;
          } else {
            if (step) {
              var newVal = oldValue - step;
            } else {
              var newVal = oldValue - 1;
            }
          }
          counterWrapper.find("input").val(newVal);
          counterWrapper.find("input").trigger("change");
        });
      });
    }
  }

  $(window).load(function () {
    if ($(".quantity").length) {
      dynamicQuantity($(".quantity"));
    }
  });
})(jQuery, window);
