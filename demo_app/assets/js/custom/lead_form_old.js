$(function(){
    "use strict";
    var lead_form = $("#custom_lead_form").show();
    var check_lead = false;
    lead_form.steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "fade",
        autoFocus: true,
        titleTemplate: '<span class="number">#index#</span> #title#',
        onStepChanging: function (event, currentIndex, newIndex)
        {
            // Allways allow previous action even if the current form is not valid!
            if (currentIndex > newIndex)
            {
                return true;
            }

            if(currentIndex ===0){
                var val_d =lead_form.valid();
                if(val_d){
                    var email       = $('#lead_email').val();
                    var contact     = $('#lead_contact_no').val();
                    var category_id = $('#lead_cat_id').val();
                    $.post(lead_check_url, {email: email, contact: contact, category_id: category_id}, function (data) {
                        data = $.parseJSON(data);
                        if (typeof data.error != 'undefined') {
                            $.toast({heading: '',text: data.error,position: 'top-right',loaderBg: '#ff6849',icon: 'error',hideAfter: 35000000});
                            lead_form.steps('previous');
                        } else if (typeof data.success != 'undefined') {

                        }
                    });
                }
            }
            // Needed in some cases if the user went back (clean up)
            if (currentIndex < newIndex)
            {
                // To remove error styles
                lead_form.find(".body:eq(" + newIndex + ") label.error").remove();
                lead_form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
            }
            lead_form.validate().settings.ignore = ":disabled,:hidden";
            return lead_form.valid();
        },
        onStepChanged: function (event, currentIndex, priorIndex)
        {

        },
        onFinishing: function (event, currentIndex)
        {
            lead_form.validate().settings.ignore = ":not(:visible)";
            return lead_form.valid();
        },
        onFinished: function (event, currentIndex)
        {
            $('#custom_lead_form').submit();
        }
    }).validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); }

    });

    $('input.typeahead').typeahead({
        source: function (query, process) {
            return $.get(fetch_pincode_autocompete, {query: query}, function (data) {
                data = $.parseJSON(data);
                return process(data);
            });
        }
    });
    $('input.typeahead').change(function () {
        var current = $('input.typeahead').typeahead("getActive");
        if (current) {
            // Some item from your model is active!
            if (current == $('input.typeahead').val()) {
                // This means the exact match is found. Use toLowerCase() if you want case insensitive match.
            } else {
                $('input.typeahead').val('');
                // This means it is only a partial match, you can either add a new item
                // or take the active if you don't want new items
            }
        } else {
            // Nothing is active so it is a new value (or maybe empty value)
        }
    });
    $.validator.addClassRules({
        numeric: {
            number: true
        }
    });
    $('.external_sel_a').each(function () {
        var art_v = $(this);
        if ($(this).data('external_field' != '')) {
            $.post(fetch_external_fields_url, {
                external_field: $(this).data('external_field'),
                bank_id: bank_id,
                category_id: $('#lead_cat_id').val()
            }, function (data) {
                data = $.parseJSON(data);
                if (typeof data.select_option != 'undefined') {
                    art_v.append(data.select_option);
                }

            });
        }
    });
});
