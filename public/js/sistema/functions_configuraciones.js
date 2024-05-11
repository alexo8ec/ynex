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
        });
    } catch (error) { }
});