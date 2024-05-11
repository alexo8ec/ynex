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
                <div class="p-[3rem]">
                    <div class="mb-4">
                        <a aria-label="anchor" href="/index">
                            <img src="/build/assets/images/brand-logos/desktop-logo.png" alt="" class="authentication-brand desktop-logo">
                            <img src="/build/assets/images/brand-logos/desktop-dark.png" alt="" class="authentication-brand desktop-dark">
                        </a>
                    </div>
                    <p class="h5 font-semibold mb-2">Reset Password</p>
                    <p class="mb-4 text-[#8c9097] dark:text-white/50 opacity-[0.7] font-normal">Hello Jhon !</p>
                    <div class="grid grid-cols-12 gap-y-4">
                        <div class="xl:col-span-12 col-span-12 mt-0">
                            <label for="reset-password" class="form-label text-default">Current Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control form-control-lg !rounded-e-none" id="reset-password" placeholder="current password">
                                <button aria-label="button" class="ti-btn ti-btn-light !rounded-s-none !mb-0" onclick="createpassword('reset-password',this)" type="button" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                            </div>
                        </div>
                        <div class="xl:col-span-12 col-span-12">
                            <label for="reset-newpassword" class="form-label text-default">New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control form-control-lg !rounded-e-none" id="reset-newpassword" placeholder="new password">
                                <button aria-label="button" class="ti-btn ti-btn-light !mb-0 !rounded-s-none" onclick="createpassword('reset-newpassword',this)" type="button" id="button-addon21"><i class="ri-eye-off-line align-middle"></i></button>
                            </div>
                        </div>
                        <div class="xl:col-span-12 col-span-12 mb-4">
                            <label for="reset-confirmpassword" class="form-label text-default">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control form-control-lg !rounded-e-none" id="reset-confirmpassword" placeholder="confirm password">
                                <button aria-label="button" class="ti-btn ti-btn-light !mb-0 !rounded-s-none" onclick="createpassword('reset-confirmpassword',this)" type="button" id="button-addon22"><i class="ri-eye-off-line align-middle"></i></button>
                            </div>
                        </div>
                        <div class="xl:col-span-12 col-span-12 grid mt-2">
                            <a href="/reset" class="ti-btn ti-btn-lg bg-primary text-white !font-medium dark:border-defaultborder/10">Enviar</a>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="text-[0.75rem] text-[#8c9097] dark:text-white/50 mt-4">Already have an account? <a href="/login" class="text-primary">Sign In</a></p>
                    </div>
                </div>
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
                                        <h6 class="font-semibold text-[1rem]">Reset Password</h6>
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
                                        <h6 class="font-semibold text-[1rem]">Reset Password</h6>
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
                                        <h6 class="font-semibold text-[1rem]">Reset Password</h6>
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