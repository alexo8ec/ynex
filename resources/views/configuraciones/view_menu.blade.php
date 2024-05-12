<style>
    .iconos-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
        gap: 10px;
    }

    .Icon_icon_select__tLN6i {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border: 1px solid #ccc;
        padding: 15px;
        transition: box-shadow 0.3s;
        cursor: pointer;
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 15px;
        transition: box-shadow 0.3s;
    }

    .Icon_icon_select__tLN6i:hover {
        box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
    }

    .Icon_icon__I3Lry i {
        font-size: 30px;
        margin-bottom: 5px;
    }

    .Icon_icon_extra {
        position: absolute;
        top: 5px;
        right: 5px;
        display: none;
    }

    .Icon_icon_select__tLN6i:hover .Icon_icon_extra {
        display: block;
    }

    .input-group-text {
        background-color: #fff;
        border: none;
    }

    .input-group-text i {
        font-size: 20px;
        color: #888;
    }

    .form-control {
        border-radius: 10px;
    }
</style>
<div class="content">
    <div class="main-content">
        <div class="block justify-between page-header md:flex">
            <div>
                <h3 class="!text-defaulttextcolor dark:!text-defaulttextcolor/70 dark:text-white dark:hover:text-white text-[1.125rem] font-semibold">{{trans('submodulos.'.config('data.submodulo'))}}</h3>
            </div>
            <ol class="flex items-center whitespace-nowrap min-w-0">
                <li class="text-[0.813rem] ps-[0.5rem]">
                    <a class="flex items-center text-primary hover:text-primary dark:text-primary truncate" href="javascript:void(0);">{{trans('submodulos.'.config('data.submodulo'))}}<i class="ti ti-chevrons-right flex-shrink-0 text-[#8c9097] dark:text-white/50 px-[0.5rem] overflow-visible rtl:rotate-180"></i>
                    </a>
                </li>
                <li class="text-[0.813rem] text-defaulttextcolor font-semibold hover:text-primary dark:text-[#8c9097] dark:text-white/50 " aria-current="page">{{trans('modulos.'.config('data.controlador'))}}</li>
            </ol>
        </div>
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12">
                <div class="box">
                    <div class="box-header">
                        <h5 class="box-title">{{config('data.titulotabla')}}</h5>
                        <div>
                            <div style="position: absolute; right: 10px;top:12px">
                                <a href="javascript:;" class="ti-btn ti-btn-primary-full !py-1 !px-2 ti-btn-wave" data-hs-overlay="#myModal" onclick="agregarMenu();"><i class="bi bi-plus-circle-fill"></i> <span class="botones">{{ trans('tabla.agregar') }}</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="box-body space-y-3">
                        <table id="tableMenu" class="table table-striped tablaDatos" width="100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Controlador</th>
                                    <th>Icono</th>
                                    <th>Orden</th>
                                    <th>Estado</th>
                                    <th>Creado</th>
                                    <th>F. creación</th>
                                    <th>Modificado</th>
                                    <th>F. modificación</th>
                                    <th>...</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Controlador</th>
                                    <th>Icono</th>
                                    <th>Orden</th>
                                    <th>Estado</th>
                                    <th>Creado</th>
                                    <th>F. creación</th>
                                    <th>Modificado</th>
                                    <th>F. modificación</th>
                                    <th>...</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="myModal" class="hs-overlay hidden ti-modal">
    <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out md:!max-w-2xl md:w-full m-3 md:mx-auto">
        <div class="ti-modal-content">
            <div class="ti-modal-header">
                <h6 class="ti-modal-title">
                    Modal title
                </h6>
                <button type="button" class="hs-dropdown-toggle ti-modal-close-btn" data-hs-overlay="#myModal">
                    <span class="sr-only">Close</span>
                    <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z" fill="currentColor" />
                    </svg>
                </button>
            </div>
            <div class="ti-modal-body">
                <p class="mt-1 text-gray-800 dark:text-[#8c9097] dark:text-white/50">
                <form id="frm_">
                    @csrf
                    <input type="hidden" id="action" value="<?= url('/configuraciones/saveMenu'); ?>" />
                    <input type="hidden" id="id_menu" name="id_menu" value="" />
                    <input type="hidden" id="estado" name="estado" value="1" />
                    <div class="grid grid-cols-12 sm:gap-x-6 sm:gap-y-4">
                        <div class="md:col-span-6 col-span-12 mb-4">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" aria-label="Nombre">
                        </div>
                        <div class="md:col-span-6 col-span-12 mb-4">
                            <label class="form-label">Controlador</label>
                            <input type="text" class="form-control" id="controlador" name="controlador" placeholder="Controlador" aria-label="Controlador">
                        </div>
                        <div class="md:col-span-6 col-span-12 mb-4">
                            <label class="form-label">Icono</label> <a href="javascript:;" data-hs-overlay="#myModalIcon"><i class="ri-file-list-3-fill ri-1x text-info" style="cursor: pointer;"></i></a>
                            <input type="text" class="form-control" id="icono" name="icono" placeholder="Icono" aria-label="Icono">
                        </div>
                        <div class="md:col-span-6 col-span-12 mb-4">
                            <label class="form-label">Orden</label>
                            <input type="text" class="form-control" id="orden" name="orden" placeholder="Orden" aria-label="Orden">
                        </div>
                        <div class="md:col-span-12 col-span-12 mb-4 sm:mb-0">
                            <div class="form-check mb-4">
                                <div class="flex items-center form-check-md">
                                    <input type="checkbox" id="cheestado" class="ti-switch" checked>
                                    <label for="cheestado" class="text-sm text-gray-500 ms-3 dark:text-[#8c9097] dark:text-white/50" id="lblestado">Activo</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ti-modal-footer">
                        <button type="button" class="hs-dropdown-toggle ti-btn ti-btn-secondary-full align-middle" data-hs-overlay="#myModal">Cerrar</button>
                        <button type="button" class="ti-btn bg-primary text-white !font-medium" id="btnGuardarMenu">Guardar</button>
                    </div>
                </form>
                </p>
            </div>
        </div>
    </div>
</div>

<div id="myModalIcon" class="hs-overlay hidden ti-modal">
    <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out md:!max-w-2xl md:w-full m-3 md:mx-auto">
        <div class="ti-modal-content">
            <div class="ti-modal-header">
                <h6 class="ti-modal-title">
                    Modal title
                </h6>
                <button type="button" class="hs-dropdown-toggle ti-modal-close-btn" data-hs-overlay="#myModal">
                    <span class="sr-only">Close</span>
                    <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z" fill="currentColor" />
                    </svg>
                </button>
            </div>
            <div class="ti-modal-body">
                <p class="mt-1 text-gray-800 dark:text-[#8c9097] dark:text-white/50">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="buscador" placeholder="Buscar icono...">
                    <div class="input-group-append">
                        <span class="input-group-text" id="limpiarBuscador" style="cursor: pointer;"><i class="bx bx-x"></i></span>
                    </div>
                </div>
                <div class="iconos-container">
                    <div class="Icon_icon_select__tLN6i" onclick="agregarIcono(this)" data-hs-overlay="#myModal">
                        <div class="Icon_icon__I3Lry"><i class="bx bx-child"></i></div>
                        <div class="Icon_icon_name__XWqpO">child</div>
                        <div class="Icon_icon_extra"><i class="bx bx-plus-circle"></i></div>
                    </div>
                    <div class="Icon_icon_select__tLN6i" onclick="agregarIcono(this)" data-hs-overlay="#myModal">
                        <div class="Icon_icon__I3Lry"><i class='bx bxs-balloon'></i></div>
                        <div class="Icon_icon_name__XWqpO">balloon</div>
                        <div class="Icon_icon_extra"><i class="bx bx-plus-circle"></i></div>
                    </div>
                    <div class="Icon_icon_select__tLN6i" onclick="agregarIcono(this)" data-hs-overlay="#myModal">
                        <div class="Icon_icon__I3Lry"><i class='bx bxs-coffee-bean'></i></div>
                        <div class="Icon_icon_name__XWqpO">coffee-bean</div>
                        <div class="Icon_icon_extra"><i class="bx bx-plus-circle"></i></div>
                    </div>
                    <div class="Icon_icon_select__tLN6i" onclick="agregarIcono(this)" data-hs-overlay="#myModal">
                        <div class="Icon_icon__I3Lry"><i class='bx bxs-pear'></i></div>
                        <div class="Icon_icon_name__XWqpO">pear</div>
                        <div class="Icon_icon_extra"><i class="bx bx-plus-circle"></i></div>
                    </div>
                    <div class="Icon_icon_select__tLN6i" onclick="agregarIcono(this)" data-hs-overlay="#myModal">
                        <div class="Icon_icon__I3Lry"><i class='bx bxs-sushi'></i></div>
                        <div class="Icon_icon_name__XWqpO">sushi</div>
                        <div class="Icon_icon_extra"><i class="bx bx-plus-circle"></i></div>
                    </div>
                    <div class="Icon_icon_select__tLN6i" onclick="agregarIcono(this)" data-hs-overlay="#myModal">
                        <div class="Icon_icon__I3Lry"><i class='bx bx-sushi'></i></div>
                        <div class="Icon_icon_name__XWqpO">sushi</div>
                        <div class="Icon_icon_extra"><i class="bx bx-plus-circle"></i></div>
                    </div>
                    <div class="Icon_icon_select__tLN6i" onclick="agregarIcono(this)" data-hs-overlay="#myModal">
                        <div class="Icon_icon__I3Lry"><i class='bx bxs-shower'></i></div>
                        <div class="Icon_icon_name__XWqpO">shower</div>
                        <div class="Icon_icon_extra"><i class="bx bx-plus-circle"></i></div>
                    </div>
                    <div class="Icon_icon_select__tLN6i" onclick="agregarIcono(this)" data-hs-overlay="#myModal">
                        <div class="Icon_icon__I3Lry"><i class='bx bx-shower'></i></div>
                        <div class="Icon_icon_name__XWqpO">shower</div>
                        <div class="Icon_icon_extra"><i class="bx bx-plus-circle"></i></div>
                    </div>
                    <div class="Icon_icon_select__tLN6i" onclick="agregarIcono(this)" data-hs-overlay="#myModal">
                        <div class="Icon_icon__I3Lry"><i class='bx bxl-typescript'></i></div>
                        <div class="Icon_icon_name__XWqpO">typescript</div>
                        <div class="Icon_icon_extra"><i class="bx bx-plus-circle"></i></div>
                    </div>
                    <div class="Icon_icon_select__tLN6i" onclick="agregarIcono(this)" data-hs-overlay="#myModal">
                        <div class="Icon_icon__I3Lry"><i class='bx bxl-graphql'></i></div>
                        <div class="Icon_icon_name__XWqpO">graphql</div>
                        <div class="Icon_icon_extra"><i class="bx bx-plus-circle"></i></div>
                    </div>
                    <div class="Icon_icon_select__tLN6i" onclick="agregarIcono(this)" data-hs-overlay="#myModal">
                        <div class="Icon_icon__I3Lry"><i class='bx bx-rfid'></i></div>
                        <div class="Icon_icon_name__XWqpO">rfid</div>
                        <div class="Icon_icon_extra"><i class="bx bx-plus-circle"></i></div>
                    </div>
                    <div class="Icon_icon_select__tLN6i" onclick="agregarIcono(this)" data-hs-overlay="#myModal">
                        <div class="Icon_icon__I3Lry"><i class='bx bxs-universal-access'></i></div>
                        <div class="Icon_icon_name__XWqpO">universal-access</div>
                        <div class="Icon_icon_extra"><i class="bx bx-plus-circle"></i></div>
                    </div>
                    <div class="Icon_icon_select__tLN6i" onclick="agregarIcono(this)" data-hs-overlay="#myModal">
                        <div class="Icon_icon__I3Lry"><i class='bx bx-universal-access'></i></div>
                        <div class="Icon_icon_name__XWqpO">universal-access</div>
                        <div class="Icon_icon_extra"><i class="bx bx-plus-circle"></i></div>
                    </div>
                    <div class="Icon_icon_select__tLN6i" onclick="agregarIcono(this)" data-hs-overlay="#myModal">
                        <div class="Icon_icon__I3Lry"><i class='bx bxs-castle'></i></div>
                        <div class="Icon_icon_name__XWqpO">castle</div>
                        <div class="Icon_icon_extra"><i class="bx bx-plus-circle"></i></div>
                    </div>
                    <div class="Icon_icon_select__tLN6i" onclick="agregarIcono(this)" data-hs-overlay="#myModal">
                        <div class="Icon_icon__I3Lry"><i class='bx bxs-shield-minus'></i></div>
                        <div class="Icon_icon_name__XWqpO">shield-minus</div>
                        <div class="Icon_icon_extra"><i class="bx bx-plus-circle"></i></div>
                    </div>
                    <div class="Icon_icon_select__tLN6i" onclick="agregarIcono(this)" data-hs-overlay="#myModal">
                        <div class="Icon_icon__I3Lry"><i class='bx bxs-shield-minus'></i></div>
                        <div class="Icon_icon_name__XWqpO">shield-minus</div>
                        <div class="Icon_icon_extra"><i class="bx bx-plus-circle"></i></div>
                    </div>
                    <div class="Icon_icon_select__tLN6i" onclick="agregarIcono(this)" data-hs-overlay="#myModal">
                        <div class="Icon_icon__I3Lry"><i class='bx bxs-shield-plus'></i></div>
                        <div class="Icon_icon_name__XWqpO">shield-plus</div>
                        <div class="Icon_icon_extra"><i class="bx bx-plus-circle"></i></div>
                    </div>
                    <div class="Icon_icon_select__tLN6i" onclick="agregarIcono(this)" data-hs-overlay="#myModal">
                        <div class="Icon_icon__I3Lry"><i class='bx bx-shield-plus'></i></div>
                        <div class="Icon_icon_name__XWqpO">shield-plus</div>
                        <div class="Icon_icon_extra"><i class="bx bx-plus-circle"></i></div>
                    </div>
                    <div class="Icon_icon_select__tLN6i" onclick="agregarIcono(this)" data-hs-overlay="#myModal">
                        <div class="Icon_icon__I3Lry"><i class='bx bx-vertical-bottom'></i></div>
                        <div class="Icon_icon_name__XWqpO">vertical-bottom</div>
                        <div class="Icon_icon_extra"><i class="bx bx-plus-circle"></i></div>
                    </div>
                    <div class="Icon_icon_select__tLN6i" onclick="agregarIcono(this)" data-hs-overlay="#myModal">
                        <div class="Icon_icon__I3Lry"><i class='bx bx-vertical-top'></i></div>
                        <div class="Icon_icon_name__XWqpO">vertical-top</div>
                        <div class="Icon_icon_extra"><i class="bx bx-plus-circle"></i></div>
                    </div>
                    <div class="Icon_icon_select__tLN6i" onclick="agregarIcono(this)" data-hs-overlay="#myModal">
                        <div class="Icon_icon__I3Lry"><i class='bx bx-horizontal-right'></i></div>
                        <div class="Icon_icon_name__XWqpO">horizontal-right</div>
                        <div class="Icon_icon_extra"><i class="bx bx-plus-circle"></i></div>
                    </div>

                </div>
                <div class="ti-modal-footer">
                    <button type="button" class="hs-dropdown-toggle ti-btn ti-btn-secondary-full align-middle" data-hs-overlay="#myModal">Cerrar</button>
                </div>
                </p>
            </div>
        </div>
    </div>
</div>

@include('utilidades.view_modal_pregunta')