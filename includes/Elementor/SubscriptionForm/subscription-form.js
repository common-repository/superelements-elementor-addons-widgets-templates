(function ($, elementor) {
    "use strict";
    var $window = $(elementor);
    var seElementor = {
      onInit: function () {
        var E_FRONT = elementorFrontend;

         E_FRONT.hooks.addAction("frontend/element_ready/se_subscription_form.default", function($scope){
            $('.se-subscription').on('submit', function(e){
                e.preventDefault();
                var data = {
                    'action': 'se_subscription_form',
                    'data' : $(this).serialize(),
                    '_nonce': se_object.nonce
                };
                jQuery.post(se_object.ajax_url, data, function(response) {
                    if(response !== ''){
                         $('.se-alert').html(response.data.message);
                         $('.se-alert').addClass(response.data.error);
                         console.log(typeof response.data.message);
                    }
                });
             });
         });
      },
    };
    $window.on("elementor/frontend/init", seElementor.onInit);
  })(jQuery, window);
  