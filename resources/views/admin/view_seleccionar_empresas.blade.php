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
            <?php
            if (config('data.empresas') != null) {
                foreach (config('data.empresas') as $empresa) {
                    $estado = '<span class="badge bg-primary/10 text-danger">Inactivo&nbsp;&nbsp;<i class="bi bi-hand-thumbs-down-fill" style="color:red;"></i></span>';
                    if ($empresa->estado == 1) {
                        $estado = '<span class="badge bg-primary/10 text-success">Activo&nbsp;&nbsp;<i class="bi bi-hand-thumbs-up-fill" style="color:green;"></i></span>';
                    }
                    $verificado = '<span class="badge bg-danger/10 text-danger">Sin verificado&nbsp;&nbsp;<i class="bi bi-x-circle-fill" style="color:red;"></i></span>';
                    if ($empresa->verificado == 1) {
                        $verificado = '<span class="badge bg-warning/10 text-warning">Verificado&nbsp;&nbsp;<i class="bi bi-check-circle-fill" style="color: #28a745;"></i></span>';
                    }
                    echo '<div class="xl:col-span-3 col-span-12">
                            <div class="box border border-primary !rounded-md">
                            <a href="javascript:;" onclick="seleccionarEmpresa(\'' . $empresa->id_empresa . '\');">
                                <div class="box-body">
                                    <p class="text-[.875rem] font-semibold mb-2 leading-none">' . $empresa->razon_social . '
                                        <a aria-label="anchor" href="javascript:;" onclick="seleccionarEmpresa(\'' . $empresa->id_empresa . '\');"><span class="ltr:float-right rtl:float-left text-danger text-[1.125rem]"># ' . $empresa->id_empresa . '</span></a>
                                    </p>
                                    <div class="flex flex-wrap gap-2 mb-4">
                                    ' . $estado . '
                                        ' . $verificado . '
                                    </div>
                                    <div class="avatar-list-stacked">
                                        <span class="avatar avatar-sm avatar-rounded">
                                            <img src="https://laravelui.spruko.com/tailwind/ynex/build/assets/images/faces/15.jpg" alt="img">
                                        </span>&nbsp;&nbsp;&nbsp;
                                        <a href="javascript:;" onclick="seleccionarEmpresa(\'' . $empresa->id_empresa . '\');"><span class="badge bg-info/10 text-info">' . $empresa->nombre_comercial . '</span></a>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>';
                }
            }
            ?>
        </div>
    </div>
</div>