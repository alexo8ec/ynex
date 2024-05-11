<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" class="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Description" content="Ynex - Laravel Tailwind CSS Responsive Admin Web Dashboard Template">
    <meta name="keywords" content="admin panel in laravel, tailwind, tailwind template admin, laravel admin panel, tailwind css dashboard, admin dashboard template, admin template, tailwind laravel, template dashboard, admin panel tailwind, tailwind css admin template, laravel tailwind template, laravel tailwind, tailwind admin dashboard">
    <title> YNEX - Laravel Tailwind CSS Admin & Dashboard Template </title>
    <link rel="icon" href="/build/assets/images/brand-logos/favicon.ico" type="image/x-icon">
    <link href="/build/assets/iconfonts/icons.css" rel="stylesheet">
    <link rel="preload" as="style" href="/build/assets/app-6b44ca98.css" />
    <link rel="stylesheet" href="/build/assets/app-6b44ca98.css" />
    <script src="/build/assets/authentication-main.js"></script>
    <link rel="stylesheet" href="/build/assets/libs/swiper/swiper-bundle.min.css">
</head>

<body class="bg-white dark:!bg-bodybg">
    <div class="grid grid-cols-12 authentication mx-0 text-defaulttextcolor text-defaultsize">
        <div class="xxl:col-span-7 xl:col-span-7 lg:col-span-12 col-span-12">
            <div class="flex justify-center items-center h-full">
                <div class="xxl:col-span-3 xl:col-span-3 lg:col-span-3 md:col-span-3 sm:col-span-2"></div>
                <div class="xxl:col-span-6 xl:col-span-6 lg:col-span-6 md:col-span-6 sm:col-span-8 col-span-12">
                    <div class="p-[3rem]">
                        <div class="mb-4">
                            <a aria-label="anchor" href="/index">
                                <img src="/build/assets/images/brand-logos/desktop-logo.png" alt="" class="authentication-brand desktop-logo">
                                <img src="/build/assets/images/brand-logos/desktop-dark.png" alt="" class="authentication-brand desktop-dark">
                            </a>
                        </div>
                        <p class="h5 font-semibold mb-2">Bienvenido</p>
                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="grid grid-cols-12 gap-y-4">
                                <div class="xl:col-span-12 col-span-12 mt-0">
                                    <label for="usuario" class="form-label text-default">Usuario</label>
                                    <input type="email" class="form-control form-control-lg w-full !rounded-md" id="email" name="email" autocomplete="off" placeholder="usuario@dominio.com" required>
                                </div>
                                <div class="xl:col-span-12 col-span-12 mb-4">
                                    <label for="password" class="form-label text-default block">Contraseña<a href="/resetpassword" class="ltr:float-right rtl:float-left text-danger">Olvido su contraseña ?</a></label>
                                    <div class="input-group">
                                        <input type="password" class="form-control form-control-lg !rounded-e-none" id="password" name="password" autocomplete="off" placeholder="Contraseña" required>
                                        <button aria-label="button" type="button" class="ti-btn ti-btn-light !rounded-s-none !mb-0" onclick="createpassword('password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="xl:col-span-12 col-span-12 grid mt-2">

                                    <button class="ti-btn ti-btn-lg bg-primary text-white !font-medium dark:border-defaultborder/10" type="submit">signin</button>

                                </div>
                            </div>
                        </form>
                        @if(Session::has('message'))
                        <div class="alert alert-danger" role="alert">
                            <center>
                                {{ Session::get('message') }}
                            </center>
                        </div>
                        @endif
                        @if ($errors->has('two_factor'))
                        <div class="alert alert-danger" role="alert">
                            <center>
                                {{ $errors->first('two_factor') }}
                            </center>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="xxl:col-span-3 xl:col-span-3 lg:col-span-3 md:col-span-3 sm:col-span-2"></div>
            </div>
        </div>
        <div class="xxl:col-span-5 xl:col-span-5 lg:col-span-5 col-span-12 xl:block hidden px-0">
            <div class="authentication-cover">
                <div class="aunthentication-cover-content rounded">
                    <div class="swiper keyboard-control">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="text-white text-center p-[3rem] flex items-center justify-center">
                                    <div>
                                        <div class="mb-[3rem]">
                                            <img src="/build/assets/images/authentication/2.png" class="authentication-image" alt="">
                                        </div>
                                        <h6 class="font-semibold text-[1rem]">Sign In</h6>
                                        <p class="font-normal text-[.875rem] opacity-[0.7]"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa eligendi expedita aliquam quaerat nulla voluptas facilis. Porro rem voluptates possimus, ad, autem quae culpa architecto, quam labore blanditiis at ratione.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-white text-center p-[3rem] flex items-center justify-center">
                                    <div>
                                        <div class="mb-[3rem]">
                                            <img src="/build/assets/images/authentication/3.png" class="authentication-image" alt="">
                                        </div>
                                        <h6 class="font-semibold text-[1rem]">Sign In</h6>
                                        <p class="font-normal text-[.875rem] opacity-[0.7]"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa eligendi expedita aliquam quaerat nulla voluptas facilis. Porro rem voluptates possimus, ad, autem quae culpa architecto, quam labore blanditiis at ratione.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-white text-center p-[3rem] flex items-center justify-center">
                                    <div>
                                        <div class="mb-[3rem]">
                                            <img src="/build/assets/images/authentication/2.png" class="authentication-image" alt="">
                                        </div>
                                        <h6 class="font-semibold text-[1rem]">Sign In</h6>
                                        <p class="font-normal text-[.875rem] opacity-[0.7]"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa eligendi expedita aliquam quaerat nulla voluptas facilis. Porro rem voluptates possimus, ad, autem quae culpa architecto, quam labore blanditiis at ratione.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/build/assets/libs/swiper/swiper-bundle.min.js"></script>
    <link rel="modulepreload" href="/build/assets/authentication-fa6f6b78.js" />
    <script type="module" src="/build/assets/authentication-fa6f6b78.js"></script>
    <script src="/build/assets/show-password.js"></script>
</body>

</html>