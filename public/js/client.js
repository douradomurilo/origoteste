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

        $.post('/api/clients', data, function (data) {

            let message;
            message = ('error' in data) ? data.error : data.message;

            $('#message').find('#text').html(message);

            $('#message').modal({
                backdrop: 'static',
                keyboard: false
            });

            if (!('error' in data)) {
                setTimeout(function () {
                    window.location.href = '/';
                }, 2000);
            }
        });
    });

    $('#editClientForm').submit('submit', function (event) {
        event.preventDefault();
        data = $(this).serialize();
        
        $.ajax({
            url: '/api/clients/' + $('#clientId').val(),
            type: 'PUT',
            data: data,
            success: function (data) {

                let message;
                message = ('error' in data) ? data.error : data.message;

                $('#message').find('#text').html(message);

                $('#message').modal({
                    backdrop: 'static',
                    keyboard: false
                });

                if (!('error' in data)) {
                    setTimeout(function () {
                        window.location.href = '/';
                    }, 2000);
                }
            }
        });
    });

    var clientId;

    $('table#clients').find('.btn-danger').click(function () {

        btn = $(this);
        clientId = (btn.parents('tr').data('id'));

        $('#confirm').modal({
            backdrop: 'static',
            keyboard: false
        });
    });

    $('#confirm').find('.btn-danger').click(function () {
        $.ajax({
            url: '/api/clients/' + clientId,
            type: 'DELETE',
            success: function (data) {

                $('#confirm').modal('hide');

                let message;
                message = ('error' in data) ? data.error : data.message;

                $('#message').find('#text').html(message);

                $('#message').modal({
                    backdrop: 'static',
                    keyboard: false
                });

                if (!('error' in data)) {
                    $('tr[data-id="' + clientId + '"]').remove();

                    setTimeout(function () {
                        $('#message').modal('hide');
                    }, 2000);
                }
            }
        });
    });
});