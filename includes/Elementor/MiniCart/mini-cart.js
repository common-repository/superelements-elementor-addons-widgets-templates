jQuery(document).ready(function ($) {
  let miniCart = $(".se-mini-cart");
  let openCartDrawer = $(".se-mini-cart-handler");
  let closeCartDrawer = $(".se-mini-cart-close");
  let miniCartList = $(".se-mini-cart-list");
  let overlayCartDrawer = $(".se-mini-cart-overlay");

  openCartDrawer.on("click", function () {
    updateMiniCart();
  });
  closeCartDrawer.on("click", () => {
    closeMiniCartDrawer();
  });
  overlayCartDrawer.on("click", () => {
    closeMiniCartDrawer();
  });

  function updateMiniCart() {
    miniCart.addClass("active");
    useFreezeBodyScroll(true);
    $.ajax({
      url: wc_add_to_cart_params.ajax_url,
      type: "POST",
      data: { action: "get_mini_cart_content" },
      beforeSend: function () {
        miniCart.addClass("loading");
      },
      success: function (response) {
        miniCart.removeClass("loading");
        let emptyClass = $(response)[0].className === "woocommerce-mini-cart__empty-message";
        if (emptyClass) {
          miniCart.addClass("empty-cart");
        } else {
          miniCart.removeClass("empty-cart");
          miniCartList.html(response);
        }
      },
    });
  }

  // close mini cart drawer
  function closeMiniCartDrawer() {
    miniCart.removeClass("active");
    useFreezeBodyScroll(false);
  }

  // freeze body scroll
  function useFreezeBodyScroll(freezeState) {
    if (typeof freezeState !== "boolean") {
      console.error("useFreezeBodyScroll param should be a boolean type value.");
      return false;
    }

    let scrollbarWidth = getBodyScrollbarWidth();
    console.log(scrollbarWidth);
    let html = $("html");
    let wpadminbar = $("#wpadminbar");

    if (freezeState) {
      html.css("overflow", "hidden");
      html.css("padding-right", `${scrollbarWidth}px`);

      if (wpadminbar) {
        wpadminbar.css("padding-right", `${scrollbarWidth}px`);
      }
    } else {
      html.css("overflow", "auto");
      html.css("padding-right", "0px");

      if (wpadminbar) {
        wpadminbar.css("padding-right", "0px");
      }
    }
  }

  // body scrollbar width
  function getBodyScrollbarWidth() {
    let overflowScrollCssValue = $("body").height() > $(window).height() ? "scroll" : "auto";
    const outer = document.createElement("div");
    $(outer).css({ overflow: overflowScrollCssValue, visibility: "hidden" });
    document.body.appendChild(outer);

    const inner = document.createElement("div");
    outer.appendChild(inner);

    const scrollbarWidth = outer.offsetWidth - inner.offsetWidth;
    outer.parentNode.removeChild(outer);

    return scrollbarWidth;
  }
});
