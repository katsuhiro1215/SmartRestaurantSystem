<!DOCTYPE html>
<html {{ str_replace('_', '-', app()->getLocale()) }}>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Smart Restaurant Order System</title>
    
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="l-wrapper">
        <header id="l-header" class="header">
            <div class="header__inner px-40">
                <div class="header__top">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, cupiditate.</p>
                </div>
                <div class="header__center flex justify-between items-center">
                    <h1 class="logo">
                        <a href="">Cafe</a>
                    </h1>
                    <nav class="header-nav">
                        <ul class="header-nav__list">
                            <li class="header-nav__item active">
                                <a href="index.html" class="header-nav__link">Home</a>
                            </li>
                            <li class="header-nav__item">
                                <a href="about.html" class="header-nav__link">About</a>
                            </li>
                            <li class="header-nav__item">
                                <a href="menu.html" class="header-nav__link">Menu</a>
                            </li>
                            <li class="header-nav__item">
                                <a href="blog.html" class="header-nav__link">Blog</a>
                            </li>
                            <li class="header-nav__item">
                                <a href="contact.html" class="header-nav__link">Contact</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="header__bottom"></div>
            </div>
            @if (Route::has('user.login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('user.login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log
                            in</a>

                        @if (Route::has('user.register'))
                            <a href="{{ route('user.register') }}"
                                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </header>
        <main>
            <div class="top-visual">
                <picture>
                    <source srcset="{{ asset('frontend/assets/img/top.jpg') }}" media="(min-width: 520px)" />
                    <source srcset="{{ asset('frontend/assets/img/top-mobile.jpg') }}" media="(min-width: 1040px)" />
                    <img src="{{ asset('frontend/assets/img/top-mobile.jpg') }}" alt="Top Image" />
                </picture>
                <div class="catch">
                    <h2>Smart Cafe</h2>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo, maiores.</p>
                    <div class="button-list mt-40">
                        <button class="btn primary-btn">注文する</button>
                        <button class="btn primary-btn">予約する</button>
                    </div>
                </div>
            </div>
            <section class="section about-section">
                <div class="headline">
                    <h2 class="index-title">About</h2>
                </div>
                <div class="content row justify-between items-center">
                    <div class="col-6">
                        <div class="mb-40">
                            <figure>
                                <img src="{{ asset('frontend/assets/img/humburger.jpg') }}" alt="" />
                            </figure>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-40">
                            <div class="text p-40">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae ullam, quae
                                    dicta dolore temporibus exercitationem molestiae sint nam laudantium
                                    reprehenderit consequatur eum delectus voluptatum nesciunt aspernatur adipisci
                                    ea atque? Saepe!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section menu-section">
                <div class="headline">
                    <h2 class="index-title">Menu</h2>
                </div>
                <div class="container">
                    <div class="content">
                        <a href="">
                            <figure>
                                <img src="{{ asset('frontend/assets/img/humburger.jpg') }}" alt="">
                            </figure>
                            <div class="catch">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, aut doloribus!
                                    Saepe aliquam soluta facere ipsum rem sit autem voluptatem?</p>
                                <button class="btn primary-btn mt-40">Read More</button>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
            <section class="section staff-section">
                <div class="headline">
                    <h2 class="index-title">Staff</h2>
                </div>
                <div class="content row justify-between items-center">
                    <div class="col-6">
                        <div class="mb-40">
                            <figure>
                                <img src="{{ asset('frontend/assets/img/humburger.jpg') }}" alt="" />
                            </figure>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-40">
                            <div class="text p-40">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae ullam, quae
                                    dicta dolore temporibus exercitationem molestiae sint nam laudantium
                                    reprehenderit consequatur eum delectus voluptatum nesciunt aspernatur adipisci
                                    ea atque? Saepe!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section blog-section">
                <div class="headline">
                    <h2 class="index-title">Blog</h2>
                </div>
                <div class="content row justify-between items-center">
                    <div class="col-6">
                        <div class="mb-40">
                            <figure>
                                <img src="{{ asset('frontend/assets/img/humburger.jpg') }}" alt="" />
                            </figure>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-40">
                            <div class="text p-40">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae ullam, quae
                                    dicta dolore temporibus exercitationem molestiae sint nam laudantium
                                    reprehenderit consequatur eum delectus voluptatum nesciunt aspernatur adipisci
                                    ea atque? Saepe!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <aside>
            <section class="section contact-section">
                <div class="headline">
                    <h2 class="index-title">About</h2>
                </div>
                <div class="content row justify-between items-center">
                    <div class="col-6">
                        <div class="mb-40">
                            <figure>
                                <img src="{{ asset('frontend/assets/img/humburger.jpg') }}" alt="" />
                            </figure>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-40">
                            <div class="text p-40">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae ullam, quae
                                    dicta dolore temporibus exercitationem molestiae sint nam laudantium
                                    reprehenderit consequatur eum delectus voluptatum nesciunt aspernatur adipisci
                                    ea atque? Saepe!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </aside>
    </div>

    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
</body>

</html>
