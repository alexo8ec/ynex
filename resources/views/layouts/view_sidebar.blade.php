<aside class="app-sidebar" id="sidebar">
    <div class="main-sidebar-header">
        <a href="/index" class="header-logo">
            <img src="/build/assets/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo">
            <img src="/build/assets/images/brand-logos/toggle-logo.png" alt="logo" class="toggle-logo">
            <img src="/build/assets/images/brand-logos/desktop-dark.png" alt="logo" class="desktop-dark">
            <img src="/build/assets/images/brand-logos/toggle-dark.png" alt="logo" class="toggle-dark">
            <img src="/build/assets/images/brand-logos/desktop-white.png" alt="logo" class="desktop-white">
            <img src="/build/assets/images/brand-logos/toggle-white.png" alt="logo" class="toggle-white">
        </a>
    </div>
    <div class="main-sidebar" id="sidebar-scroll">
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg></div>
            <ul class="main-menu">
                <li class="slide has-sub">
                    <a href="/admin" class="side-menu__item"><i class="bx bx-home side-menu__icon"></i><span class="side-menu__label">Inicio</span></a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Inicio</a>
                        </li>
                    </ul>
                </li>
                <?php
                if (session('idEmpresa') != '') {
                    $menu = '';
                    if (config('data.menu') != null && count(config('data.menu')) > 0) {
                        foreach (config('data.menu') as $row) {
                            $menuOpen = '';
                            $menuActive = '';
                            if ($row['controlador'] == config('data.controlador')) {
                                $menuActive = 'active';
                                $menuOpen = 'open';
                            }
                            $menu .= '<li class="slide has-sub ' . $menuActive . ' ' . $menuOpen . '">
                                <a href="javascript:void(0);" class="side-menu__item ' . $menuActive . '">
                                <i class="' . $row['icono_menu'] . ' side-menu__icon"></i>
                                <span class="side-menu__label">' . $row['nombre_menu'] . '</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1"><a href="javascript:void(0)">' . $row['nombre_menu'] . '</a></li>';
                            if (count($row['submodulos']) > 0) {
                                foreach ($row['submodulos'] as $submodulo) {
                                    $menuActive = '';
                                    if ($submodulo['funcion'] == config('data.submodulo')) {
                                        $menuActive = 'active';
                                    }
                                    $menu .= '<li class="slide ' . $menuActive . '"><a href="' . $row['controlador'] . '/' . $submodulo['funcion'] . '" class="side-menu__item ' . $menuActive . '">' . $submodulo['nombre_submenu'] . '</a></li>';
                                }
                            }
                            $menu .= '</ul>
                        </li>';
                        }
                    }
                    echo $menu;
                }
                ?>
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg>
            </div>
        </nav>
    </div>
</aside>