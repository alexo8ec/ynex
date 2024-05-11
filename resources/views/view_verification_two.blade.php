<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" class="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Author" connt="Spruko Technologies Private Limited">
    <meta name="Description" content="Ynex –Laravel Tailwind CSS Responsive Admin Web Dashboard Template">
    <meta name="keywords" content="admin panel in laravel, tailwind, tailwind template admin, laravel admin panel, tailwind css dashboard, admin dashboard template, admin template, tailwind laravel, template dashboard, admin panel tailwind, tailwind css admin template, laravel tailwind template, laravel tailwind, tailwind admin dashboard">
    <title> YNEX - Laravel Tailwind CSS Admin & Dashboard Template </title>
    <link rel="icon" href="/build/assets/images/brand-logos/favicon.ico" type="image/x-icon">
    <link href="/build/assets/iconfonts/icons.css" rel="stylesheet">
    <link rel="preload" as="style" href="/build/assets/app-6b44ca98.css" />
    <link rel="stylesheet" href="/build/assets/app-6b44ca98.css" />
    <script src="/build/assets/authentication-main.js"></script>
</head>

<body>
    <div class="container">
        <div class="flex justify-center authentication authentication-basic items-center h-full text-defaultsize text-defaulttextcolor">
            <div class="grid grid-cols-12">
                <div class="xxl:col-span-4 xl:col-span-4 lg:col-span-4 md:col-span-3 sm:col-span-2"></div>
                <div class="xxl:col-span-4 xl:col-span-4 lg:col-span-4 md:col-span-6 sm:col-span-8 col-span-12 flex flex-col">
                    <div class="my-[3rem] flex justify-center">
                        <a href="/index">
                            <img src="/build/assets/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo">
                            <img src="/build/assets/images/brand-logos/desktop-dark.png" alt="logo" class="desktop-dark">
                        </a>
                    </div>
                    <div class="box">
                        <div class="box-body sm:!p-[3rem]">
                            <p class="font-semibold mb-2 text-center text-xl">Verifique su cuenta</p>
                            <p class="mb-4 text-[#8c9097] dark:text-white/50 opacity-[0.7] font-normal text-center">{{ $message }}</p>
                            <center>
                                {{ $qr }}
                                <br />
                            </center>
                            <form method="post" action="{{route('verifyTwoFactor')}}">
                                @csrf
                                <div class="grid grid-cols-12 gap-y-4">
                                    <div class="xl:col-span-12 col-span-12 mb-2">
                                        <div class="grid grid-cols-12 gap-4">
                                            <div class="col-span-2 px-1">
                                                <input type="text" class="!px-0 form-control w-full !rounded-md form-control-lg text-center !text-[1rem]" id="one" name="one" maxlength="1" onkeyup="clickEvent(this,'two')">
                                            </div>
                                            <div class="col-span-2 px-1">
                                                <input type="text" class="!px-0 form-control w-full !rounded-md form-control-lg text-center !text-[1rem]" id="two" name="two" maxlength="1" onkeyup="clickEvent(this,'three')">
                                            </div>
                                            <div class="col-span-2 px-1">
                                                <input type="text" class="!px-0 form-control w-full !rounded-md form-control-lg text-center !text-[1rem]" id="three" name="three" maxlength="1" onkeyup="clickEvent(this,'four')">
                                            </div>
                                            <div class="col-span-2 px-1">
                                                <input type="text" class="!px-0 form-control w-full !rounded-md form-control-lg text-center !text-[1rem]" id="four" name="four" maxlength="1" onkeyup="clickEvent(this,'five')">
                                            </div>
                                            <div class="col-span-2 px-1">
                                                <input type="text" class="!px-0 form-control w-full !rounded-md form-control-lg text-center !text-[1rem]" id="five" name="five" maxlength="1" onkeyup="clickEvent(this,'six')">
                                            </div>
                                            <div class="col-span-2 px-1">
                                                <input type="text" class="!px-0 form-control w-full !rounded-md form-control-lg text-center !text-[1rem]" id="six" name="six" maxlength="1">
                                            </div>
                                        </div>
                                        <br />
                                        <div clas"form-check mt-2 mb-0 !ps-0">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                El código caducó ?<a href="{{route('admin')}}" class="text-primary ms-2 inline-block">Generar</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="xl:col-span-12 col-span-12 grid mt-2">
                                        <button type="submit" class="ti-btn ti-btn-lg bg-primary text-white !font-medium dark:border-defaultborder/10">Verificar</button>
                                    </div>
                                </div>
                            </form>
                            @if ($errors->has('code'))
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('code') }}
                            </div>
                            @endif
                            <div class="text-center">
                                <p class="text-[0.75rem] text-[#8c9097] dark:text-white/50 mt-4 text-danger"><sup><i class="ri-asterisk"></i></sup>No compartas el código de verificación con cualquier persona!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="xxl:col-span-4 xl:col-span-4 lg:col-span-4 md:col-span-3 sm:col-span-2"></div>
            </div>
        </div>
    </div>
    <script src="/build/assets/two-step-verification.js"></script>
</body>

</html>