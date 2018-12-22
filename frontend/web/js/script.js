$(window).on('load', function () {
    $('.form-control').on('change', function () {
        let thisSelect = $(this);

        let allnext = thisSelect.closest('.form-group').nextAll();
        allnext.each(function () {
            let formControl = $(this).find('.form-control')
            formControl.find('option').remove();
            formControl.prop("disabled", true);
        });

        let data = {
            OfferSearch:{
                length : $('#offersearch-length').val(),
                width : $('#offersearch-width').val(),
                height : $('#offersearch-height').val(),
                product_id : $('#offersearch-product_id').val()
            }
        };

        $.get('/site/ajax-filter', data, function (response) {
            let nextSelect = thisSelect.closest('.form-group').next().find('.form-control');
            if (nextSelect.length > 0 ) {
                nextSelect.append($("<option></option>").attr("value",'').text('Select'));

                for (key in response[nextSelect.prop('id')]){
                    nextSelect.append($("<option></option>").attr("value",key).text(key));
                }
                nextSelect.prop("disabled", false);
            }
        })
    })
});