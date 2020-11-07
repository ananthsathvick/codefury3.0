function check_lead_avaliability() {
    email_valid = $("#custom_lead_form").validate().element("#lead_email");
    contact_valid = $("#custom_lead_form").validate().element("#lead_contact_no");
    if (email_valid && contact_valid) {
        email = $('#lead_email').val();
        lead_id = $('#lead_id').val();
        category_id = $('#lead_cat_id').val();
        contact = $('#lead_contact_no').val();
        $.post(lead_check_url, {
            email: email,
            lead_id: lead_id,
            category_id: category_id,
            contact: contact
        }, function(data) {
            data = $.parseJSON(data);
            if (typeof data.error != 'undefined') {
                var validator = $("#custom_lead_form").validate();
                if (typeof data.email != "undefined") {
                    validator.showErrors({
                        "email": "Already Registered",
                    });
                }
                if (typeof data.contact_no != "undefined") {
                    validator.showErrors({
                        "contact_no": "Already Registered",
                    });
                }
                return false;
            } else {
                return true;
            }
        });
    }
}

function set_cust_lead_pro($vat) {
    cat_id = $vat.val();
    lead_id = $('#lead_id').val();
    $('.lead_data_cls').show();
    $('#custom_lead_data').html('');
    $.post(get_category_products, {
        cat_id: cat_id,
        lead_id: lead_id
    }, function(data) {
        if(cat_id ==5){
            $('#Cat_pro').prev('label').text('Cards');
        }else{
            $('#Cat_pro').prev('label').text('Category Banks');
        }
        $('#Cat_pro').html(data)
    });
    $('.pre-loader').show();
    $.post(fetch_cat_form_list_ajax, {
        category_id: cat_id,
        lead_id: lead_id
    }, function(data) {
        $('.lead_data_cls').show();
        $('#custom_lead_data').html(data);
        fetch_external();
        $('.has_depend_child_select').each(function() {
            depend_opt_select_fields($(this));
        });
        $('.has_depend_child_radio').each(function() {
            depend_opt_fields($(this));
        });
        setTimeout(function(){ change_city(); }, 3000);
        $('.pre-loader').hide();
    });
}

function fetch_external() {
    $('.external_sel_a').each(function() {
        var art_v = $(this);
        var external_fields = $(this).data('external_field');
        var field_id = $(this).data('field_id');
        if (external_fields != '') {
            $.post(fetch_external_fields_url, {
                external_field: $(this).data('external_field'),
                bank_id: $('#Cat_pro').find(':selected').attr('data-bank_id'),
                category_id: $('#lead_cat_id').val(),
                lead_id: $('#lead_id').val(),
                field_id: field_id,
            }, function(data) {
                data = $.parseJSON(data);
                if (typeof data.select_option != 'undefined') {
                    art_v.html('');
                    art_v.append(data.select_option);
                }
            });
        }
    });
}

function change_city() {
    state_id = $('#custom_lead_data .state_field ').val();
    art_v = $('#custom_lead_data .city');
    var field_id = art_v.data('field_id');
    if (state_id) {
        $.post(fetch_city_url, { state_id: state_id, field_id: field_id, lead_id: $('#lead_id').val() }, function(data) {
            data = $.parseJSON(data);
            if (typeof data.select_option != 'undefined') {
                art_v.html('');
                art_v.append(data.select_option);
            }
        });
    }
}


function depend_opt_fields(ar) {
    if (ar != '') {
        var checked = ar.is(':checked') ? true : false;
        if (checked) {
            set1 = ar.data('depend_child').split(',');
            parent_id = ar.data('parent_id');
            $('.parent_' + parent_id).hide();
            $.each(set1, function(index, value) {
                if (value) {
                    $('#f_list-' + value).show();
                }
            });
        }
    }
}

function depend_opt_select_fields(ar) {
    var selected = ar.find('option:selected');
    parent_id = ar.data('parent_id');
    field_n = ar.data('field_id');
    $('#' + field_n + '_other').remove();
    $('.parent_' + parent_id).hide();
    if (selected.val() != '') {
        set1 = selected.data('depend_child').split(',');
        $.each(set1, function(index, value) {
            if (value) {
                $('#f_list-' + value).show();
            }
        });
        has_other = selected.data('has_other');
        if (has_other) {
            ar.parent().append('<input type="text" id="' + field_n + '_other" name="' + field_n + '_other" class="form-control mt-20 has_other static" required> ');
        }
    }
}

$(document).ready(function() {
    $('body').on('change', '#lead_cat_id', function() {
        if ($('#lead_cat_id').val() != '') {
            $('.basic_contact').show();
        } else {
            $('.basic_contact').hide();
        }
        set_cust_lead_pro($(this));
    });
    var $validator = $("#custom_lead_form").validate({
        errorPlacement: function(error, element) {
            if (element.is(":radio")) {
                error.prependTo(element.closest('.radio-list'));
            } else {
                error.insertAfter(element);
            }
        }
    });
    $.validator.addClassRules({
        numeric: {
            number: true
        }
    });
    $('input.typeahead').typeahead({
        source: function(query, process) {
            return $.get(fetch_pincode_autocompete, { query: query }, function(data) {
                data = $.parseJSON(data);
                return process(data);
            });
        }
    });
    $('input.typeahead').change(function() {
        var current = $('input.typeahead').typeahead("getActive");
        if (current) {
            if (current == $('input.typeahead').val()) {} else {
                $('input.typeahead').val('');
            }
        }
    });


    $('body').on('submit', '#custom_lead_form', function(e) {
        check_lead_avaliability();
        e.preventDefault();
        lead_id = $('#lead_id').val();
        oprt_t = $('#lead_optr').val();
        first_name = $('#lead_firstname').val();
        last_name = $('#lead_lastname').val();
        email = $('#lead_email').val();
        pincode = $('#lead_pincode').val();
        contact = $('#lead_contact_no').val();
        tracking_id = $('#tracking_id').val();
        category_id = $('#lead_cat_id').val();
        lead_source = $('#lead_source').val();
        product_id = $('#Cat_pro').val();
        bank_id = $('#Cat_pro').find(':selected').attr('data-bank_id');
        jsonObj = [];
        $('#custom_lead_form input[type=text]:not(.static),#custom_lead_form input[type=tel]:not(.static),#custom_lead_form input[type=email]:not(.static),#custom_lead_form input[type=date],#custom_lead_form select:not(.static), #custom_lead_form input[type=radio]:checked, #custom_lead_form input[type=checkbox]:checked').each(function() {
            item = {};
            id = $(this).data('field_id');
            if ($('#f_list-' + id).css('display') !== 'none') {
                item['field_name'] = $(this).attr('name');
                item['field_id'] = $(this).data('field_id');
                item['value'] = $(this).val();
                if ($(this).prop('nodeName') == 'SELECT') {
                    item['value'] = $(this).children("option:selected").val();
                    item['other_value'] = $('#' + item['field_id'] + '_other').val();
                }
                item['field_type'] = $(this).prop('nodeName');
                item['display_name'] = $(this).data('display_name');
                item['tab_id'] = $(this).data('tab_detail');
                jsonObj.push(item);
            }
        });
        $.post(save_lead_form_url, {
            bank_id: bank_id,
            id: lead_id,
            oprt_t: oprt_t,
            tracking_id: tracking_id,
            category_id: category_id,
            product_id: product_id,
            first_name: first_name,
            last_name: last_name,
            lead_source: lead_source,
            email: email,
            pincode: pincode,
            contact: contact,
            lead_data: JSON.stringify(jsonObj)
        }, function(data) {
            data = $.parseJSON(data);
            if (typeof data.message !== 'undefined') {
                $.toast({
                    heading: '',
                    text: 'Lead Details Added/Updated!',
                    position: 'top-right',
                    loaderBg: '#0eff1a',
                    icon: 'success',
                    hideAfter: 35000000
                });
                setTimeout(function() {
                    window.location.href = lead_form_url + data.id;
                }, 3000);
            }else if(typeof data.error !== 'undefined'){
                $.toast({
                    heading: '',
                    text: data.error,
                    position: 'top-right',
                    loaderBg: '#FF1A24',
                    icon: 'error',
                    hideAfter: 35000000
                });
            }
        });
    });
});