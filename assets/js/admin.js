(function ($) {
  // all the global variables defined here
  var eAll = $("#enableAll");
  var dAll = $("#disableAll");
  var widgetItems = $(".widget-item");
  var edAic = $("#enableDisableAllCheckbox");
  var seWidgetsForm = $("#se-widgets-form");
  var notify = $(".se-widget-saved-changes");
  var allWidgets = $(".se-widgets-body input");

  // Save widgets active/inactive data
  $("body").on("submit", seWidgetsForm, function (e) {
    e.preventDefault();

    let fieldValues = seWidgetsForm.serialize();

    $.ajax({
      url: se_object.ajax_url,
      type: "post",
      data: {
        action: "se_save_widgets_settings",
        security: se_object.nonce,
        values: fieldValues,
      },
      success: function (response) {
        if (response?.success) {
          // do stuff for success message
          notifyFunction("success");
        } else {
          // do stuff for error message
          notifyFunction("error");
        }
      },
      error: function (error) {
        // do stuff for error message
        notifyFunction("error");
      },
    });
  });

  eAll.click(function () {
    enableAllItems($(this));
  });

  dAll.click(function () {
    disableAllItems($(this));
  });

  // enable and disable toggle when click on enable or disable all checkbox
  edAic.change(function () {
    if ($(this).is(":checked")) {
      enableAllItems(eAll);
    } else {
      disableAllItems(dAll);
    }
  });

  // enable and disable one item
  if (widgetItems.length) {
    widgetItems.click(function () {
      $(this).toggleClass("active");
      var input = $(this).find("input");
      input.prop("checked", !input.prop("checked"));

      // check if the last item is disabled or enabled
      lastItemChecked();
    });
  }

  // enable all item function
  function enableAllItems(element) {
    // add active class into current button
    $(element).addClass("active");
    // remove active class from disable button
    dAll.removeClass("active");
    // enable main checkbox
    var iAll = $(element).parent().find("label > input");
    iAll.prop("checked", true);
    // enable all widget checkbox and active
    widgetItems.each(function (index, item) {
      $(item).find("input").prop("checked", true);
      $(item).addClass("active");
    });
  }

  // disable all item functions
  function disableAllItems(element) {
    // add active class into current button
    $(element).addClass("active");
    // remove active class from enable button
    eAll.removeClass("active");
    // disable main checkbox
    var iAll = $(element).parent().find("label > input");
    iAll.prop("checked", false);
    // disable all widget checkbox and active
    widgetItems.each(function (index, item) {
      $(item).find("input").prop("checked", false);
      $(item).removeClass("active");
    });
  }

  // notification function
  function notifyFunction(param) {
    if (param == "success") {
      notify.addClass("active");
      setTimeout(function () {
        notify.removeClass("active");
      }, 3000);
    } else {
      notify.addClass("notify-error");
      setTimeout(function () {
        notify.removeClass("notify-error");
      }, 3000);
    }
  }

  // check if the last item is disabled or enabled
  function lastItemChecked() {
    var allEnable = true;
    allWidgets.each(function (_, item) {
      if (!$(item).is(":checked")) {
        allEnable = false;
        return false;
      }
    });

    if (!allEnable) {
      edAic.prop("checked", false);
      eAll.removeClass("active");
    } else {
      edAic.prop("checked", true);
      eAll.addClass("active");
    }
  }
})(jQuery);
