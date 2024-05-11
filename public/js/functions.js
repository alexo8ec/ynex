$(document).ready(function () {
    $('#max-login-attempts').change(function () {
        var data = {
            max_attempts: $('#max-login-attempts').val()
        };
        ajax('utilidades/saveIntentosLogin', data, 'json');
    });
    $('#account-freeze-time-format').change(function () {
        var data = {
            decay_minutes: $('#account-freeze-time-format').val()
        };
        ajax('utilidades/saveTiempoLogin', data, 'json');
    });

});
function ajax(url, data, dataType) {
    return $.ajax({
        url: url,
        type: "post",
        headers: {
            "X-CSRF-TOKEN": $('input[name=_token]').val(),
        },
        data: data,
        async: false,
        dataType: dataType,
        success: function (data) {
            return data;
        }, error(error) {
            return error.message;
        }
    });
}
function getFecha(fecha, horas = null, separadores = '.') {
    if (fecha != '') {
        var f = new Date(fecha);
        var dia = f.getDate();
        if (dia < 10)
            dia = '0' + dia;
        var mes = parseFloat(f.getMonth()) + 1;
        if (mes < 10)
            mes = '0' + mes;
        var anio = f.getFullYear();
        var hora = '';
        var hora_ = f.getHours();
        if (hora_ < 10)
            hora_ = '0' + hora_;
        var minuto = f.getMinutes();
        if (minuto < 10)
            minuto = '0' + minuto;
        var segundos = f.getSeconds();
        if (segundos < 10)
            segundos = '0' + segundos;
        hora = hora_ + ':' + minuto + ':' + segundos + ' ' + hora;
        fecha = anio + separadores + mes + separadores + dia;
        if (horas != null)
            fecha = anio + separadores + mes + separadores + dia + ' ' + hora;
        return fecha;
    } else {
        return '';
    }
}