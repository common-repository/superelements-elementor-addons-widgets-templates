(function ($) {
  "use strict";

  // drawer function
  var handler = $(".se-open-drawer");
  var menuDropHandler = $(".dropdown-arrow");

  // header scroll function
  function scrollFunction() {
    if ($(window).scrollTop() > 50) {
      $(".se-scroll-class").addClass("isScrolling");
    } else {
      $(".se-scroll-class").removeClass("isScrolling");
    }
  }

  // initialize functions here
  $(window).on("scroll", function () {
    scrollFunction();
  });
  scrollFunction();

  // menu drawer function
  handler.each(function (index, item) {
    useDrawer(item);
  });

  function useDrawer(drawerItem) {
    var p = $(drawerItem).parent();
    var drawerWrapper = p.find($(".se-drawer-wrapper"));
    var drawerContent = p.find($(".se-drawer-content"));
    var closeDrawer = p.find($(".se-close-drawer"));

    // show drawer
    $(drawerItem).click(function () {
      showDrawer();
    });

    // close drawer
    closeDrawer.click(function (e) {
      e.stopPropagation();
      hideDrawer();
    });

    // prevent drawer to close when click any where of drawer content
    drawerContent.click(function (e) {
      e.stopPropagation();
    });

    // click blur area to close modal
    drawerWrapper.click(function () {
      hideDrawer();
    });

    // open drawer function
    function showDrawer() {
      useFreezeBodyScroll(true);
      drawerWrapper.addClass("active");
      setTimeout(function () {
        drawerContent.removeClass("se-translate-x-full");
      }, 200);
    }

    // close drawer function
    function hideDrawer() {
      drawerContent.addClass("se-translate-x-full");
      setTimeout(function () {
        drawerWrapper.removeClass("active");
        useFreezeBodyScroll(false);
      }, 200);
    }
  }

  function useFreezeBodyScroll(freezeState) {
    if (typeof freezeState !== "boolean") {
      console.error("useFreezeBodyScroll param should be a boolean type value.");
      return false;
    }
    var body = $("body");
    if (freezeState) {
      body.addClass("se-overflow-hidden");
      body.removeClass("se-overflow-x-hidden");
    } else {
      body.removeClass("se-overflow-hidden");
      body.addClass("se-overflow-x-hidden");
    }
  }
  // drawer menu dropdown function
  menuDropHandler.click(function () {
    openDropdown($(this));
  });

  function openDropdown(menuDropHandler) {
    var dropdown = menuDropHandler.next();
    dropdown.slideToggle(500);
  }
})(jQuery, window);
