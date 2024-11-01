(function ($) {
  "use strict";

  var videoModal = $(".se-pop-up-wrapper");

  videoModal.each(function (index, item) {
    useModal(item);
  });

  function useModal(modalWrapper) {
    var handler = $(modalWrapper).find($(".se-modal-handler"));
    var popupContainer = $(modalWrapper).find($(".se-modal-container"));
    var popupModal = $(modalWrapper).find($(".se-modal"));
    var closePopUp = $(modalWrapper).find($(".se-close-modal"));

    // show modal handler click
    handler.click(function () {
      showModal();
    });

    // close modal handler click
    closePopUp.click(function (e) {
      e.stopPropagation();
      hideModal();
    });

    // prevent modal to close any where click on modal content
    popupModal.click(function (e) {
      e.stopPropagation();
    });

    // click blur area to close modal
    popupContainer.click(function () {
      hideModal();
    });

    function showModal() {
      useFreezeBodyScroll(true);
      popupContainer.addClass("active");
    }

    function hideModal() {
      popupContainer.removeClass("active");
      useFreezeBodyScroll(false);
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
})(jQuery, window);
