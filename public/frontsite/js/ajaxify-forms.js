/**
* Author: Kim Maravila Pogi
*/

$(function(){

    function loadingButton($button){
       $button.each(function() {
           var $this = $(this);
           if($this.attr('data-orig-text')) {
               var text = $this.text();
               $this.html('Processing ...');
               $this.val('Processing ...');
           }
       });
    }

    function revertButton($button){
        $button.each(function(){
            var $this = $(this);
            if($this.attr('data-orig-text')) {
                $this.html($this.attr('data-orig-text'));
                $this.val($this.attr('data-orig-text'));
            }
        });
    }

    var fields_not_to_clear = ['_method','_token'];

    $.fn.clearForm = function(options){
        var settings = $.extend({
            exemptedFields: ['']
        },options);
        return this.each(function(){
            var $form = $(this);
                $form.find('input,textarea,select').each(function(){
                    var $input = $(this),
                        name = $input.attr('name');
                        if($input.is($('.select2autosuggest'))){
                            $input.val('');
                            $input.trigger('change');
                        }else if($input.is('[type="checkbox"],[type="radio"]')){
                            $input.prop('checked', false);
                            $input.trigger('change');
                        }else if(fields_not_to_clear.indexOf(name) > -1){ 
                            //   
                        }else{
                            $input.val('');
                        }
                });
        });
    }

    $.fn.ajaxifyForm = function(){
        return this.each(function(){
            var $form = $(this),
                $inputs = $form.find('input,select,textarea,button'),
                $submitButtons = $form.find('button,input[type="submit"],input[type="button"]'),
                serializeData = [];

                $form.submit(function(e){

                    // if(toastr){
                    //     toastr.clear();
                    // }

                    if(!$form.valid()){
                        return false;
                    }

                    var data = new FormData(this);
                        if($form.attr('method') == 'GET'){
                            data = $form.serialize();
                        }

                        if($form.find('[name="_method"]').val() == 'DELETE'){
                            var conf = confirm('Are you sure you want to do this ?');
                                if(!conf){
                                    return false;
                                }
                        }

                    $.ajax({
                        url: $form.attr('action'),
                        type: $form.attr('method'),
                        dataType: 'JSON',
                        // data: $form.serializeArray(),
                        data: data,
                        processData: false,
                        contentType: false,
                        beforeSend: function(xhr){
                            // xhr.setRequestHeader("Authorization", "Basic " + btoa("opprivateuser:*SvE{XI(mfAO"));
                            loadingButton($submitButtons)
                            $inputs.prop('disabled', true);
                        }
                    }).done(function(resp) {
                        var messages = resp.messages.join("<br>");
                        if(resp.messages.length > 0) {
                            showToaster(resp.type||'success',messages);
                            // alert(messages);
                        }
                        if(resp.success){
                            if(resp.clear_form){
                                // $form[0].reset();
                                $form.clearForm();
                                if(typeof grecaptcha != 'undefined'){
                                    grecaptcha.reset();
                                }
                            }

                            if(resp.redirect_to) {
                                if(resp.timeOut) {
                                    setTimeout(function() {
                                        window.location.href = resp.redirect_to;
                                    },resp.timeOut);
                                }else{
                                    window.location.href = resp.redirect_to;
                                }
                            }
                        }
                    }).always(function(resp){
                        $inputs.prop('disabled', false);
                        revertButton($submitButtons);
                    });

                    return false;
                }).validate({
                    rules: $.extend({
                        hidden_recaptcha : {
                            required: function() {
                                if(typeof grecaptcha == 'undefined'){
                                    return false;
                                }

                                return grecaptcha && grecaptcha.getResponse() == '';
                            }
                        }
                    },window[$form.attr('data-validation-rules')]),
                    errorPlacement : function(error, element){
                        if(element.is($('.select2autosuggest'))){
                            error.insertAfter(element.closest('li').find('.select2'));
                            return false;
                        }

                        if(element.is($('[type="checkbox"]'))){
                            element.closest('.agreement').append(error);
                            return false;
                        }

                        // default
                        error.insertAfter(element);
                    }
                });
        });
    }

});
