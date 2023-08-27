$(document).ready(function() {
    $("#sendRequest").on('submit', function (e) {
        e.preventDefault();

        $('input').attr('style', '');

        var form = $(this);
        var actionUrl = "/api/requests";

        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(),
            success: function (data) {
                if(data.success == false) {
                    Object.keys(data.errors).forEach(k => {
                        $('input[name=' + k + ']').css('border-color', 'red');
                    });
                } else {
                    $(form).hide();
                    $('.vertical-center').append('<h1 style="text-align:center">Заявка успешно отправлена! Ваш ID заявки: ' + data.id + '</h1>');
                }
            }
        });
    });

    $(".form-answer").on('submit', function (e) {
        e.preventDefault();

        var form = $(this);
        var actionUrl = "/api" + window.location.pathname.replace('requests/', 'requests/' + $(this).find('.request-id').val() + '/');

        $.ajax({
            type: "PUT",
            url: actionUrl,
            data: form.serialize(),
            success: function (data) {
                $(form).parent().parent().hide();
            }
        });
    });

    $("#useToken").on('submit', function (e) {
        e.preventDefault();

        window.location.href = '/requests/' + $(this).find('#token').val();
    });
});