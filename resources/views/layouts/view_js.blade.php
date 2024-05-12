<script src="/build/assets/libs/preline/preline.js"></script>
<script src="/build/assets/libs/@popperjs/core/umd/popper.min.js"></script>
<script src="/build/assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>
<link rel="modulepreload" href="/build/assets/switch-8d0a5268.js" />
<script type="module" src="/build/assets/switch-8d0a5268.js"></script>
<script src="/build/assets/libs/simplebar/simplebar.min.js"></script>

<?php
echo '<script src="/build/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>';
if (config('data.controlador') == 'configuraciones' && config('data.submodulo') == 'usuario') {
    echo '<link rel="modulepreload" href="/build/assets/mail-settings-2415ce7c.js" />
    <script type="module" src="/build/assets/mail-settings-2415ce7c.js"></script>';
}
?>

<script src="/build/assets/sticky.js"></script>
<link rel="modulepreload" href="/build/assets/app-cff42aa7.js" />
<script type="module" src="/build/assets/app-cff42aa7.js"></script>
<link rel="modulepreload" href="/build/assets/custom-switcher-508a7845.js" />
<script type="module" src="/build/assets/custom-switcher-508a7845.js"></script>


<script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.6/js/dataTables.bootstrap4.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="modulepreload" href="/build/assets/select2-fce7f173.js" />
<script type="module" src="/build/assets/select2-fce7f173.js"></script>

<link rel="modulepreload" href="/build/assets/custom-switcher-508a7845.js" />
<script type="module" src="/build/assets/custom-switcher-508a7845.js"></script>

<!--<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.9/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.9/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.9/js/buttons.print.min.js"></script>-->

<script src="/js/functions.js"></script>
<script async src="/js/sistema/functions_{{ config('data.controlador') }}.js"></script>