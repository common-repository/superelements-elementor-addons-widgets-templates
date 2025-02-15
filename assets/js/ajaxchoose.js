jQuery( window ).on( 'elementor:init', function() {
 "use strict";
 
   var ControlAjaxselect2ItemView = elementor.modules.controls.BaseData.extend( {
       onReady: function() {
               console.log(this.ui.select);
                var self = this;
                var el = self.ui.select;
                var url = el.attr('data-ajax-url');
                var nonce = window.wpApiSettings.nonce;
           el.select2({
                ajax: {
                    url: url,
                    dataType: 'json',
                    headers: {
                    'X-WP-Nonce': nonce
                    },
                    data: function (params) {
                    var query = {
                        s: params.term,
                    }
                    return query;
                    }
                 },
       cache: true
     });

     var ids = (typeof self.getControlValue() !== 'undefined') ? self.getControlValue() : '';
     if(ids.isArray){
       ids = self.getControlValue().join();
     }
     
     jQuery.ajax({
       url: url,
       dataType: 'json',
       headers: {
         'X-WP-Nonce': nonce
       },
       data: {
         ids: String(ids)
       }
     }).then(function (data) {
       
       if(data !== null && data.results.length > 0){
         jQuery.each(data.results, function(i, v){
           var option = new Option(v.text, v.id, true, true);
           el.append(option).trigger('change');
         });
         el.trigger({
             type: 'select2:select',
             params: {
                 data: data
             }
         });
       }
     });

   },
   onBeforeDestroy: function onBeforeDestroy() {
     if (this.ui.select.data('select2')) {
       this.ui.select.select2('destroy');
     }
     this.el.remove();
   }  
   });
   elementor.addControlView( 'ajaxselect2', ControlAjaxselect2ItemView );
});