$('#description_name').change(function () {
    var doctors_list          =   $('#doctors_list');
    $.ajax({
        url: "ajax-doctors",
        method : 'GET',
        data:   { descriptionName: $(this).val() },
        success: function (response) {
            doctors_list.empty();
            doctors_list.chosen();
            doctors_list.append(
                $("<option></option>")
                    .text('Select Doctor')
                    .val('')
            );
            $.each(response, function(id, name) {
                doctors_list.append(
                    $("<option></option>")
                        .text(name)
                        .val(id)
                );
            });
            doctors_list.trigger('chosen:updated');
        },
        error: function (msg) {
            console.log(msg.responseText);
        }
    });
});