$(document).ready(function () {

    $('#clientState').change(function () {
        
        $('#clientCity').html('');
        $('#clientCity').append('<option value="">Escolha a cidade</option>');

        if ($.isNumeric($(this).val())) {

            $.get('/api/states/cities/' + $(this).val(), function (data) {
                data.forEach(city => {
                    html = '<option value="' + city.id + '">' + city.name + '</option>';
                    $('#clientCity').append(html);
                });

                $('#clientCity').prop('disabled', false);
            });
        } else {
            $('#clientCity').prop('disabled', true);
        }
    });

    $('#newClientForm').submit(function (event) {
        event.preventDefault();
        data = $(this).serialize();

        $.post('/api/clients', data, function () {
            window.location.href='/';
        });
    });

    $('#editClientForm').submit('submit', function (event) {
        event.preventDefault();
        data = $(this).serialize();
        
        $.ajax({
            url: '/api/clients/' + $('#clientId').val(),
            type: 'PUT',
            data: data,
            success: function () {
                window.location.href = '/';
            }
        });
    });

    var clientId;

    $('table#clients').find('.btn-danger').click(function () {

        btn = $(this);
        clientId = (btn.parents('tr').find('th').text());

        $('#confirm').modal({
            backdrop: 'static',
            keyboard: false
        });
    });

    $('#confirm').find('.btn-danger').click(function () {
        $.ajax({
            url: '/api/clients/' + clientId,
            type: 'DELETE',
            success: function () {
                window.location.href = '/';
            }
        });
    });
});