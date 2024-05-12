$(document).ready(function () {
    try {
        $('#tableCatalogo').DataTable({
            language: {
                "decimal": "",
                "emptyTable": $('#emptyTable').val(),
                "info": $('#mostrando').val() + " _START_ " + $('#a').val() + " _END_ " + $('#de').val() + " _TOTAL_ " + $('#entradas').val(),
                "infoEmpty": $('#mostrando').val() + " 0 " + $('#a').val() + " 0 " + $('#de').val() + " 0 " + $('#entradas').val(),
                "infoFiltered": "(" + $('#filtrado').val() + " " + $('#de').val() + " _MAX_ total " + $('#entradas').val() + ")",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": $('#mostrar').val() + " _MENU_ " + $('#entradas').val(),
                "loadingRecords": $('#loadingRecords').val() + "...",
                "processing": $('#processing').val() + "...",
                "search": $('#search').val(),
                "zeroRecords": $('#zeroRecords').val(),
                "paginate": {
                    "first": $('#first').val(),
                    "last": $('#last').val(),
                    "next": $('#next').val(),
                    "previous": $('#previous').val()
                }
            },
            responsive: true,
            lengthChange: true,
            autoWidth: true,
            iDisplayLength: 50,
            ajax: {
                url: "utilidades/getCatalogo",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('#token').val()
                },
            }, columns: [{
                className: 'text-center',
                data: 'id'
            }, {
                className: 'text-center',
                data: 'nombre'
            }, {
                className: 'text-center',
                data: 'orden'
            }, {
                className: 'text-center',
                data: 'codigo'
            }, {
                className: 'text-center',
                data: 'valor'
            }, {
                className: 'text-center',
                data: 'created_at',
                render: function (data, type, row) {
                    return getFecha(row.created_at, null, '-');
                }
            }, {
                className: 'text-center',
                data: 'usuario_creacion'
            }, {
                className: 'text-center',
                data: 'updated_at',
                render: function (data, type, row) {
                    return getFecha(row.updated_at, null, '-');
                }
            }, {
                className: 'text-center',
                data: 'usuario_modificacion'
            },
            {
                className: 'text-center',
                data: 'id',
                render: function (data, type, row) {
                    return '<div class="ti-btn-group"><div class="hs-dropdown ti-dropdown"><button class="ti-btn ti-btn-info-full !py-1 !px-4 !text-[0.75rem] ti-dropdown-toggle" type="button" id="dropdownMenuButton1" aria-expanded="false"><i class="ri-list-settings-line"></i><i class="ri-arrow-down-s-line align-middle ms-1 inline-block"></i></button><ul class="hs-dropdown-menu ti-dropdown-menu hidden"aria-labelledby="dropdownMenuButton1"><li><a class="ti-dropdown-item" href="javascript:void(0);"><i class="bi bi-eye-fill" style="color:blue;"></i> Resumen</a></li><li><a class="ti-dropdown-item" href="javascript:void(0);"><i class="bi bi-node-plus-fill" style="color:green;"></i> Añadir</a></li> <li><hr class="dropdown-divider"></li><li><a class="ti-dropdown-item" href="javascript:void(0);"><i class="bi bi-x-circle" style="color:red;"></i> Desactivar</a></li></ul></div></div>';
                }
            }],
        });
        $('#tableMenu').DataTable({
            language: {
                decimal: "",
                emptyTable: $('#emptyTable').val(),
                info: $('#mostrando').val() + " _START_ " + $('#a').val() + " _END_ " + $('#de').val() + " _TOTAL_ " + $('#entradas').val(),
                infoEmpty: $('#mostrando').val() + " 0 " + $('#a').val() + " 0 " + $('#de').val() + " 0 " + $('#entradas').val(),
                infoFiltered: "(" + $('#filtrado').val() + " " + $('#de').val() + " _MAX_ total " + $('#entradas').val() + ")",
                infoPostFix: "",
                thousands: ",",
                lengthMenu: $('#mostrar').val() + " _MENU_ " + $('#entradas').val(),
                loadingRecords: $('#loadingRecords').val() + "...",
                processing: $('#processing').val() + "...",
                search: $('#search').val(),
                zeroRecords: $('#zeroRecords').val(),
                paginate: {
                    first: $('#first').val(),
                    last: $('#last').val(),
                    next: $('#next').val(),
                    previous: $('#previous').val()
                }
            },
            pageLength: 50,
            ajax: {
                url: "utilidades/getMenu",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('#token').val()
                },
            }, columnDefs: [
                { targets: [3], className: 'text-center' },
                { targets: [4], className: 'text-center' },
                { targets: [5], className: 'text-center' },
                { targets: [7], className: 'text-center' },
                { targets: [8], className: 'text-center' },
                { targets: [9], className: 'text-center' },
                { targets: [10], className: 'text-center' },
            ], columns: [{
                data: 'id_menu'
            }, {
                data: 'nombre'
            }, {
                data: 'controlador'
            }, {
                data: 'icono',
                render: function (data, type, row) {
                    return '<i class="' + row.icono + '"></i>';
                }
            }, {
                data: 'orden'
            }, {
                data: 'estado',
                render: function (data, type, row) {
                    var estado = '<div class="alert alert-success !border-success/10 text-center" role="alert">' + $('#activo').val() + '</div>';
                    if (row.estado == 0) {
                        estado = '<div class="alert alert-danger !border-danger/10 text-center" role="alert">' + $('#inactivo').val() + '</div>';
                    }
                    return estado;
                }
            }, {
                data: 'usuario_creacion'
            }, {
                data: 'created_at',
                render: function (data, type, row) {
                    return getFecha(row.created_at, null, '-');
                }
            }, {
                data: 'usuario_modificacion'
            }, {
                data: 'updated_at',
                render: function (data, type, row) {
                    return getFecha(row.updated_at, null, '-');
                }
            }, {
                data: 'id_menu',
                render: function (data, type, row) {
                    var accion = '<li><a class="ti-dropdown-item" href="javascript:void(0);" onclick="setEstado(\'' + row.estado + '\',\'' + row.id_menu + '\',\'Menu\')" data-hs-overlay="#hs-small-modal-status"><i class="bi bi-check-circle-fill" style="color:green;"></i> ' + $('#activar').val() + '</a></li>';
                    if (row.estado == 1) {
                        accion = '<li><a class="ti-dropdown-item" href="javascript:void(0);" onclick="setEstado(\'' + row.estado + '\',\'' + row.id_menu + '\',\'Menu\')" data-hs-overlay="#hs-small-modal-status"><i class="bi bi-x-circle-fill" style="color:red;"></i> ' + $('#desactivar').val() + '</a></li>';
                    }
                    return '<div class="ti-btn-group"><div class="hs-dropdown ti-dropdown"><button class="ti-btn ti-btn-info-full !py-1 !px-4 !text-[0.75rem] ti-dropdown-toggle" type="button" id="dropdownMenuButton1" aria-expanded="false"><i class="ri-list-settings-line"></i><i class="ri-arrow-down-s-line align-middle ms-1 inline-block"></i></button><ul class="hs-dropdown-menu ti-dropdown-menu hidden"aria-labelledby="dropdownMenuButton1"><li><a class="ti-dropdown-item" href="javascript:void(0);"><i class="bi bi-eye-fill" style="color:blue;"></i> Visualizar</a></li><li><a class="ti-dropdown-item" href="javascript:agregarSubmenu(\'' + row.id_menu + '\');"><i class="bi bi-node-plus-fill" style="color:green;"></i> ' + $('#agregar').val() + '</a></li> <li><hr class="dropdown-divider"></li>' + accion + '</ul></div></div>';
                }
            }],
        });
        $('#tableSubMenu').DataTable({
            language: {
                decimal: "",
                emptyTable: $('#emptyTable').val(),
                info: $('#mostrando').val() + " _START_ " + $('#a').val() + " _END_ " + $('#de').val() + " _TOTAL_ " + $('#entradas').val(),
                infoEmpty: $('#mostrando').val() + " 0 " + $('#a').val() + " 0 " + $('#de').val() + " 0 " + $('#entradas').val(),
                infoFiltered: "(" + $('#filtrado').val() + " " + $('#de').val() + " _MAX_ total " + $('#entradas').val() + ")",
                infoPostFix: "",
                thousands: ",",
                lengthMenu: $('#mostrar').val() + " _MENU_ " + $('#entradas').val(),
                loadingRecords: $('#loadingRecords').val() + "...",
                processing: $('#processing').val() + "...",
                search: $('#search').val(),
                zeroRecords: $('#zeroRecords').val(),
                paginate: {
                    first: $('#first').val(),
                    last: $('#last').val(),
                    next: $('#next').val(),
                    previous: $('#previous').val()
                }
            },
            pageLength: 50,
            ajax: {
                url: "utilidades/getSubMenu",
                type: "POST",
                data: {
                    id: $('#idMenu').val()
                },
                headers: {
                    'X-CSRF-TOKEN': $('#token').val()
                },
            }, columnDefs: [
                { targets: [3], className: 'text-center' },
                { targets: [4], className: 'text-center' },
                { targets: [5], className: 'text-center' },
                { targets: [7], className: 'text-center' },
                { targets: [8], className: 'text-center' },
                { targets: [9], className: 'text-center' },
                { targets: [10], className: 'text-center' },
            ], columns: [{
                data: 'id_menu'
            }, {
                data: 'nombre'
            }, {
                data: 'nombre'
            }, {
                data: 'controlador'
            }, {
                data: 'icono',
                render: function (data, type, row) {
                    return '<i class="' + row.icono + '"></i>';
                }
            }, {
                data: 'orden'
            }, {
                data: 'estado',
                render: function (data, type, row) {
                    var estado = '<div class="alert alert-success !border-success/10 text-center" role="alert">' + $('#activo').val() + '</div>';
                    if (row.estado == 0) {
                        estado = '<div class="alert alert-danger !border-danger/10 text-center" role="alert">' + $('#inactivo').val() + '</div>';
                    }
                    return estado;
                }
            }, {
                data: 'usuario_creacion'
            }, {
                data: 'created_at',
                render: function (data, type, row) {
                    return getFecha(row.created_at, null, '-');
                }
            }, {
                data: 'usuario_modificacion'
            }, {
                data: 'updated_at',
                render: function (data, type, row) {
                    return getFecha(row.updated_at, null, '-');
                }
            }, {
                data: 'id_menu',
                render: function (data, type, row) {
                    var accion = '<li><a class="ti-dropdown-item" href="javascript:void(0);" onclick="setEstado(\'' + row.estado + '\',\'' + row.id_menu + '\',\'Menu\')" data-hs-overlay="#hs-small-modal-status"><i class="bi bi-check-circle-fill" style="color:green;"></i> ' + $('#activar').val() + '</a></li>';
                    if (row.estado == 1) {
                        accion = '<li><a class="ti-dropdown-item" href="javascript:void(0);" onclick="setEstado(\'' + row.estado + '\',\'' + row.id_menu + '\',\'Menu\')" data-hs-overlay="#hs-small-modal-status"><i class="bi bi-x-circle-fill" style="color:red;"></i> ' + $('#desactivar').val() + '</a></li>';
                    }
                    return '<div class="ti-btn-group"><div class="hs-dropdown ti-dropdown"><button class="ti-btn ti-btn-info-full !py-1 !px-4 !text-[0.75rem] ti-dropdown-toggle" type="button" id="dropdownMenuButton1" aria-expanded="false"><i class="ri-list-settings-line"></i><i class="ri-arrow-down-s-line align-middle ms-1 inline-block"></i></button><ul class="hs-dropdown-menu ti-dropdown-menu hidden"aria-labelledby="dropdownMenuButton1"><li><a class="ti-dropdown-item" href="javascript:void(0);"><i class="bi bi-eye-fill" style="color:blue;"></i> Visualizar</a></li><li><a class="ti-dropdown-item" href="javascript:agregarSubmenu(\'' + row.id_menu + '\');"><i class="bi bi-node-plus-fill" style="color:green;"></i> ' + $('#agregar').val() + '</a></li> <li><hr class="dropdown-divider"></li>' + accion + '</ul></div></div>';
                }
            }],
        });
    } catch (error) { }
    $('.Icon_icon_select__tLN6i').hover(
        function () {
            $(this).find('.Icon_icon__I3Lry').toggleClass('icon-hover');
        },
        function () {
            $(this).find('.Icon_icon__I3Lry').toggleClass('icon-hover');
        }
    );
    $('#btnGuardarMenu').click(function () {
        if ($('#nombre').val() == '') {
            return mensajes('info', 'Ingrese un nombre');
        } else if ($('#nombre_controlador').val() == '') {
            return mensajes('info', 'Ingrese el controlador');
        } else if ($('#icono').val() == '') {
            return mensajes('info', 'Ingrese un icono');
        } else if ($('#orden').val() == '') {
            return mensajes('info', 'Ingrese el orden');
        } else {
            mensajes('question', '¿Esta seguro de guardar la informacón?');
        }
    });
});
function agregarSubmenu(id) {
    window.location.href = $('#controlador').val() + '/agregarSubmenu/' + id;
}
function verificarNombreMenu(obj) {
    if (obj.value.length > 0) {
        var data = {
            nombre: obj.value
        };
        var json = ajax($('#controlador').val() + '/verificarNombreMenu', data, 'json');
        if (json.responseJSON !== null) {
            json = json.responseJSON;
            if (json.status != 'success') {
                mensajes(json.status, json.message);
            }
        }
    }
}
function filtrarIconos() {
    var valorBusqueda = $('#buscador').val().toLowerCase();
    $('.Icon_icon_select__tLN6i').each(function () {
        var textoIcono = $(this).find('.Icon_icon_name__XWqpO').text().toLowerCase();
        if (textoIcono.includes(valorBusqueda)) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}
$('#limpiarBuscador').on('click', function () {
    $('#buscador').val('');
    $('.Icon_icon_select__tLN6i').show();
});
$('#buscador').on('input', function () {
    filtrarIconos();
});
function agregarMenu() {
    limpiarModal('frm_');
}
function agregarIcono(icon) {
    var iconoPrincipal = icon.querySelector('.Icon_icon__I3Lry i').classList; // Obtener las clases del icono principal
    var primeraClase = iconoPrincipal[0] + ' ' + iconoPrincipal[1];
    $('#icono').val(primeraClase);
}