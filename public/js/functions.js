var varEstado = 0;
var varIdMenu = 0;
var varTipo = '';
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
    $('#btnSi').click(function () {
        cambiarEstado(varEstado, varIdMenu, varTipo);
    });
});
function setEstado(estado, id, tipo) {
    varEstado = estado;
    varIdMenu = id;
    varTipo = tipo;
}
function cambiarEstado(estado, id, tipo) {
    var data = {
        estado: estado,
        id: id,
    };
    var json = ajax('utilidades/cambiarEstado' + tipo, data, 'json');
    if (json.responseJSON !== null) {
        json = json.responseJSON;
        if (json.status == 'success') {
            $('.tablaDatos').DataTable().ajax.reload();
        }
        else {
            alert(json.message);
        }
    }
}
function seleccionarEmpresa(id) {
    window.location.href = 'admin/setEmpresa?i=' + id;
}
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