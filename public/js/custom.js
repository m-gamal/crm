
$(document).ready(function() {

    var areas_list          =   $('#areas_list');
    var territories_list    =   $('#territories_list');
    var products_list       =   $('#products_list');

    /* Get all areas based on line Id */
    $('#lines_list').change(function () {
        $.ajax({
            url: "ajax-areas/",
            method : 'GET',
            data:   { lineId: $(this).val() },
            success: function (response) {
                areas_list.empty();
                areas_list.chosen();
                areas_list.append(
                    $("<option></option>")
                        .text('Select Area')
                        .val('')
                );
                $.each(response, function(id, name) {
                    areas_list.append(
                        $("<option></option>")
                            .text(name)
                            .val(id)
                    );
                });
                areas_list.trigger('chosen:updated');
            },
            error: function (msg) {
                console.log(msg.responseText);
            }
        });

        $.ajax({
            url: "ajax-products/",
            method : 'GET',
            data:   { lineId: $(this).val()},
            success: function (response) {
                products_list.empty();
                products_list.chosen();
                products_list.append(
                    $("<option></option>")
                        .text('Select Products')
                        .val('')
                );
                $.each(response, function(id, name) {
                    products_list.append(
                        $("<option></option>")
                            .text(name)
                            .val(id)
                    );
                });
                products_list.trigger('chosen:updated');
            },
            error: function (msg) {
                console.log(msg.responseText);
            }
        });
    });

    /* Get all territories based on area Id */
    $('#areas_list').change(function () {
        $.ajax({
            url: "ajax-territories/",
            method : 'GET',
            data:   { areaId: $(this).val() },
            success: function (response) {
                territories_list.empty();
                territories_list.chosen();
                territories_list.append(
                    $("<option></option>")
                        .text('Select Territory')
                        .val('')
                );
                $.each(response, function(id, name) {
                    territories_list.append(
                        $("<option></option>")
                            .text(name)
                            .val(id)
                    );
                });
                territories_list.trigger('chosen:updated');
            },
            error: function (msg) {
                console.log(msg.responseText);
            }
        });
    });

    // Get units of products based on percentage

    var original            =   0;
    var percentageQuantity  =   0;


    $('#percentage').blur(function() {
        if ($(this).val() < 1 ) {
            percentageQuantity = Math.abs(Number(original * $(this).val()));
            $('#percentage_quantity').text(percentageQuantity);
        }
    });
});