<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/f01941449c.js" crossorigin="anonymous"></script>
    <title>Courses</title>
</head>

<body>

    <!-- ------------------ header ------------------------ -->
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <!-- --------------- logo ----------------------------- -->
            <a href="https://flowbite.com/" class="flex-col justify-center items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">You <span
                        class="text-yellow">Demy</span> </span>
            </a>
            <!-- --------------- Endlogo ----------------------------- -->

            <!-- --------------- RightNav ----------------------------- -->
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <div class="flex items-center gap-4">
                    <?php if(isset($_SESSION['role'])){ ?>
                    <?php  if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'user' || $_SESSION['role'] == 'author') { ?>
                    <button type="button"
                        class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full" src="https://tailwindcss.com/img/jonathan.jpg"
                            alt="user photo">
                    </button>
                    <?php } ?>

                    <?php } else {?>

                    <div class="sm:flex sm:gap-4">
                        <a class="rounded-md bg-indigo-600 hover:bg-indigo-700 px-5 py-2.5 text-sm font-medium text-white shadow inline-block"
                            href="../../Auth/Login.php">
                            Login
                        </a>
                        <div class="hidden sm:flex">
                            <a class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-indigo-700 hover:text-white"
                                href="../../Auth/SignUp.php">
                                Register
                            </a>
                        </div>
                    </div>

                    <?php } ?>
                </div>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white inline-block">Bonnie Green</span>
                        <span
                            class="block text-sm  text-gray-500 truncate dark:text-gray-400 inline-block">name@flowbite.com</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm inline-block text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm inline-block text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm inline-block text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm inline-block text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                out</a>
                        </li>
                    </ul>
                </div>
                <button data-collapse-toggle="navbar-user" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <!-- --------------- EndRightNav ----------------------------- -->

            <!-- --------------- middelNav ----------------------------- -->
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="../../../ind2.php"
                            class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="Courses.php"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Courses</a>
                    </li>
                    <li>
                        <a href="contact.php"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- --------------- EndmiddelNav ----------------------------- -->

        </div>
    </nav>
    <!-- ------------------ end header ---------------------- -->

    <main>
        <!-- ------------------ search Section -------------------------- -->
        <div id="heroSection">
            <div class="relative py-10">

                <div aria-hidden="true"
                    class="absolute inset-0 h-max w-full m-auto grid grid-cols-2 -space-x-52 opacity-40 dark:opacity-20">
                    <div class="blur-[106px] h-56 bg-gradient-to-br from-teal-500 to-purple-400 dark:from-blue-700">
                    </div>
                    <div class="blur-[106px] h-32 bg-gradient-to-r from-cyan-400 to-sky-300 dark:to-indigo-600"></div>
                </div>

                <div class="max-w-7xl mx-auto px-6 md:px-12 xl:px-6">
                    <div class="relative">

                        <div class="flex items-center justify-center -space-x-2">
                            <img loading="lazy" width="400" height="400"
                                src="https://randomuser.me/api/portraits/women/12.jpg" alt="member photo"
                                class="h-8 w-8 rounded-full object-cover">
                            <img loading="lazy" width="200" height="200"
                                src="https://randomuser.me/api/portraits/women/45.jpg" alt="member photo"
                                class="h-12 w-12 rounded-full object-cover">
                            <img loading="lazy" width="200" height="200"
                                src="https://randomuser.me/api/portraits/women/60.jpg" alt="member photo"
                                class="z-10 h-16 w-16 rounded-full object-cover">
                            <img loading="lazy" width="200" height="200"
                                src="https://randomuser.me/api/portraits/women/4.jpg" alt="member photo"
                                class="relative h-12 w-12 rounded-full object-cover">
                            <img loading="lazy" width="200" height="200"
                                src="https://randomuser.me/api/portraits/women/34.jpg" alt="member photo"
                                class="h-8 w-8 rounded-full object-cover">
                        </div>

                        <div class="mt-6 m-auto space-y-6 md:w-8/12 lg:w-7/12">
                            <h1 class="text-center text-4xl font-bold text-gray-800 dark:text-white md:text-5xl">Looking
                                for a solution?
                            </h1>
                            <p class="text-center text-xl text-gray-600 dark:text-gray-300">
                                Search the forum for the answer to your question.
                            </p>
                            <div class="flex flex-col items-center py-10 text-center">
                                <div class="w-full px-4 lg:w-1/2 lg:px-0">
                                    <div class="mb-10">
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-900" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <form action="#" method="GET">
                                                <input type="search" name="search" placeholder="Search here for threads"
                                                    class="p-4 pl-10 text-gray-600 rounded w-full border-gray-100">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ------------------ search Section -------------------------- -->

        <!-- ------------------ Coursese Section -------------------------- -->
        <div class="flex-col justify-center items-center">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 p-10">
                <!-- CARD 1 -->
                <div
                    class="rounded overflow-hidden border-indigo-600 flex flex-col shadow-sm transition hover:shadow-lg">
                    <a href="#"></a>
                    <div class="relative">
                        <a href="#">
                            <img class="w-full" src="../../public/asset/uploads/bg.jpg" alt="Sunset in the mountains">
                            <div class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                            </div>
                        </a>
                        <a href="#!">
                            <div class="text-xs absolute top-0 right-0 bg-indigo-600 px-4 py-2 text-white mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                Free
                            </div>
                        </a>
                    </div>
                    <div class="px-6 py-4 mb-auto">
                        <a href="#" class="font-medium text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out inline-block mb-2">HTML,
                            CSS, and Javascript for Web Developers Specialization</a>
                        <p class="text-gray-500 text-sm inline-block">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </p>
                    </div>
                    <div class="px-6 py-4 mb-auto flex justify-between items-center">
                        <span class="text-gray-500 text-lg font-bold inline-block"> 99.50 $</span>
                        <span class="text-gray-500 text-lg font-bold inline-block"> 20 Hour</span>
                    </div>
                    <div class="px-6 py-3 flex flex-row items-center justify-between bg-gray-100">
                        <span href="#" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                            <svg height="13px" width="13px" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                xml:space="preserve">
                                <g>
                                    <g>
                                        <path
                                            d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <span class="ml-1 inline-block">6 mins ago</span>
                        </span>

                        <div class="mt-4 p-4 border-t border-gray-200 dark:border-gray-500">
                            <button
                                class="w-full flex justify-between items-center font-bold cursor-pointer hover:underline text-gray-800 dark:text-gray-50">
                                <span class="text-base inline-block">EnRolle</span>

                            </button>
                        </div>
                    </div>
                </div>
                <!-- CARD 2 -->
                <div
                    class="rounded overflow-hidden border-indigo-600 flex flex-col shadow-sm transition hover:shadow-lg">
                    <a href="#"></a>
                    <div class="relative">
                        <a href="#">
                            <img class="w-full" src="../../public/asset/uploads/bg.jpg" alt="Sunset in the mountains">
                            <div
                                class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                            </div>
                        </a>
                        <a href="#!">
                            <div
                                class="text-xs absolute top-0 right-0 bg-indigo-600 px-4 py-2 text-white mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                Free
                            </div>
                        </a>
                    </div>
                    <div class="px-6 py-4 mb-auto">
                        <a href="#"
                            class="font-medium text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out inline-block mb-2">HTML,
                            CSS, and Javascript for Web Developers Specialization</a>
                        <p class="text-gray-500 text-sm inline-block">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </p>
                    </div>
                    <div class="px-6 py-4 mb-auto flex justify-between items-center">
                        <span class="text-gray-500 text-lg font-bold inline-block"> 99.50 $</span>
                        <span class="text-gray-500 text-lg font-bold inline-block"> 20 Hour</span>
                    </div>
                    <div class="px-6 py-3 flex flex-row items-center justify-between bg-gray-100">
                        <span href="#" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                            <svg height="13px" width="13px" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                xml:space="preserve">
                                <g>
                                    <g>
                                        <path
                                            d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <span class="ml-1 inline-block">6 mins ago</span>
                        </span>

                        <div class="mt-4 p-4 border-t border-gray-200 dark:border-gray-500">
                            <button
                                class="w-full flex justify-between items-center font-bold cursor-pointer hover:underline text-gray-800 dark:text-gray-50">
                                <span class="text-base inline-block">EnRolle</span>

                            </button>
                        </div>
                    </div>
                </div>
                <!-- CARD 3 -->
                <div class="rounded overflow-hidden border-indigo-600 flex flex-col shadow-sm transition hover:shadow-lg">
                    <a href="#"></a>
                    <div class="relative">
                        <a href="#">
                            <img class="w-full" src="../../public/asset/uploads/bg.jpg" alt="Sunset in the mountains">
                            <div
                                class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                            </div>
                        </a>
                        <a href="#!">
                            <div
                                class="text-xs absolute top-0 right-0 bg-indigo-600 px-4 py-2 text-white mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                Free
                            </div>
                        </a>
                    </div>
                    <div class="px-6 py-4 mb-auto">
                        <a href="#"
                            class="font-medium text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out inline-block mb-2">HTML,
                            CSS, and Javascript for Web Developers Specialization</a>
                        <p class="text-gray-500 text-sm inline-block">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </p>
                    </div>
                    <div class="px-6 py-4 mb-auto flex justify-between items-center">
                        <span class="text-gray-500 text-lg font-bold inline-block"> 99.50 $</span>
                        <span class="text-gray-500 text-lg font-bold inline-block"> 20 Hour</span>
                    </div>
                    <div class="px-6 py-3 flex flex-row items-center justify-between bg-gray-100">
                        <span href="#" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                            <svg height="13px" width="13px" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                xml:space="preserve">
                                <g>
                                    <g>
                                        <path
                                            d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <span class="ml-1 inline-block">6 mins ago</span>
                        </span>

                        <div class="mt-4 p-4 border-t border-gray-200 dark:border-gray-500">
                            <button
                                class="w-full flex justify-between items-center font-bold cursor-pointer hover:underline text-gray-800 dark:text-gray-50">
                                <span class="text-base inline-block">EnRolle</span>

                            </button>
                        </div>
                    </div>
                </div>
                <!-- CARD 4 -->
                <div
                    class="rounded overflow-hidden border-indigo-600 flex flex-col shadow-sm transition hover:shadow-lg">
                    <a href="#"></a>
                    <div class="relative">
                        <a href="#">
                            <img class="w-full" src="../../public/asset/uploads/bg.jpg" alt="Sunset in the mountains">
                            <div
                                class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                            </div>
                        </a>
                        <a href="#!">
                            <div
                                class="text-xs absolute top-0 right-0 bg-indigo-600 px-4 py-2 text-white mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                Free
                            </div>
                        </a>
                    </div>
                    <div class="px-6 py-4 mb-auto">
                        <a href="#"
                            class="font-medium text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out inline-block mb-2">HTML,
                            CSS, and Javascript for Web Developers Specialization</a>
                        <p class="text-gray-500 text-sm inline-block">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </p>
                    </div>
                    <div class="px-6 py-3 flex flex-row items-center justify-between bg-gray-100">
                        <span href="#" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                            <svg height="13px" width="13px" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                xml:space="preserve">
                                <g>
                                    <g>
                                        <path
                                            d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <span class="ml-1 inline-block">6 mins ago</span>
                        </span>

                        <div class="mt-4 p-4 border-t border-gray-200 dark:border-gray-500">
                            <button
                                class="w-full flex justify-between items-center font-bold cursor-pointer hover:underline text-gray-800 dark:text-gray-50">
                                <span class="text-base inline-block">EnRolle</span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- CARD 5 -->
                <div
                    class="rounded overflow-hidden border-indigo-600 flex flex-col shadow-sm transition hover:shadow-lg">
                    <a href="#"></a>
                    <div class="relative">
                        <a href="#">
                            <img class="w-full" src="../../public/asset/uploads/bg.jpg" alt="Sunset in the mountains">
                            <div
                                class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                            </div>
                        </a>
                        <a href="#!">
                            <div
                                class="text-xs absolute top-0 right-0 bg-indigo-600 px-4 py-2 text-white mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                Free
                            </div>
                        </a>
                    </div>
                    <div class="px-6 py-4 mb-auto">
                        <a href="#"
                            class="font-medium text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out inline-block mb-2">HTML,
                            CSS, and Javascript for Web Developers Specialization</a>
                        <p class="text-gray-500 text-sm inline-block">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </p>
                    </div>
                    <div class="px-6 py-3 flex flex-row items-center justify-between bg-gray-100">
                        <span href="#" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                            <svg height="13px" width="13px" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                xml:space="preserve">
                                <g>
                                    <g>
                                        <path
                                            d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <span class="ml-1 inline-block">6 mins ago</span>
                        </span>

                        <div class="mt-4 p-4 border-t border-gray-200 dark:border-gray-500">
                            <button
                                class="w-full flex justify-between items-center font-bold cursor-pointer hover:underline text-gray-800 dark:text-gray-50">
                                <span class="text-base inline-block">EnRolle</span>

                            </button>
                        </div>
                    </div>
                </div>
            </div>
             <!-- ------------------ pagination ------------------------ -->
            <div class="mb-10 mt-10 flex justify-center space-x-4" aria-label="Pagination">

                    <span class="rounded-lg border border-teal-500 px-2 py-2 text-gray-700">
                        <span class="sr-only">Previous</span>
                        <svg class="mt-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd">
                            </path>
                        </svg>
                    </span>

                    <span class="rounded-lg border border-teal-500 bg-teal-500 px-4 py-2 text-white">1</span>

                    <a class="rounded-lg border border-teal-500 px-4 py-2 text-gray-700" href="/page/2">2
                    </a>

                    <a class="rounded-lg border border-teal-500 px-4 py-2 text-gray-700" href="/page/3">3
                    </a>

                    <a class="rounded-lg border border-teal-500 px-2 py-2 text-gray-700" href="/page/2">
                        <span class="sr-only">Next</span>
                        <svg class="mt-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd">
                            </path>
                        </svg>
                    </a>

            </div>
            <!-- ------------------ End pagination ------------------------ -->
        </div>

    </main>
    <!-- --------------------------- footer --------------------------- -->
    <footer class="px-3 pt-4 lg:px-9 border-t-2 bg-gray-50 mt-6">
        <div class="grid gap-10 row-gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-4">

            <div class="sm:col-span-2">
                <a href="#" class="inline-flex items-center">
                    <!-- <img src="https://mcqmate.com/public/images/logos/60x60.png" alt="logo" class="h-8 w-8"> -->
                    <span class="ml-2 text-xl font-bold tracking-wide text-gray-800">YouDemy</span>
                </a>
                <div class="mt-6 lg:max-w-xl">
                    <p class="text-sm text-gray-800 inline-block">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi felis mi, faucibus dignissim
                        lorem
                        id, imperdiet interdum mauris. Vestibulum ultrices sed libero non porta. Vivamus malesuada urna
                        eu
                        nibh malesuada, non finibus massa laoreet. Nunc nisi velit, feugiat a semper quis, pulvinar id
                        libero. Vivamus mi diam, consectetur non orci ut, tincidunt pretium justo. In vehicula porta
                        molestie. Suspendisse potenti.
                    </p>
                </div>
            </div>

            <div class="flex flex-col gap-2 text-sm">
                <p class="text-base font-bold tracking-wide text-gray-900 inline-block">Popular Courses</p>
                <a href="#">UPSC - Union Public Service Commission</a>
                <a href="#">General Knowledge</a>
                <a href="#">MBA</a>
                <p class="text-base font-bold tracking-wide text-gray-900 inline-block">Popular Topics</p>
                <a href="#">Human Resource Management</a>
                <a href="#">Operations Management</a>
                <a href="#">Marketing Management</a>
            </div>

            <div>
                <p class="text-base font-bold tracking-wide text-gray-900 inline-block">COMPANY IS ALSO AVAILABLE ON</p>
                <div class="flex items-center gap-1 px-2">
                    <a href="#" class="w-full min-w-xl">
                        <img src="https://mcqmate.com/public/images/icons/playstore.svg" alt="Playstore Button"
                            class="h-10">
                    </a>
                    <a class="w-full min-w-xl" href="https://www.youtube.com/channel/UCo8tEi6SrGFP8XG9O0ljFgA">
                        <img src="https://mcqmate.com/public/images/icons/youtube.svg" alt="Youtube Button"
                            class="h-28">
                    </a>
                </div>
                <p class="text-base font-bold tracking-wide text-gray-900">Contacts</p>
                <div class="flex">
                    <p class="mr-1 text-gray-800">Email:</p>
                    <a href="#" title="send email">admin@company.com</a>
                </div>
            </div>

        </div>

        <div class="flex flex-col-reverse justify-between pt-5 pb-10 border-t lg:flex-row">
            <p class="text-sm text-gray-600">© Copyright 2023 Company. All rights reserved.</p>
            <ul class="flex flex-col mb-3 space-y-2 lg:mb-0 sm:space-y-0 sm:space-x-5 sm:flex-row">
                <li>
                    <a href="#"
                        class="text-sm text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">Privacy
                        &amp; Cookies Policy
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="text-sm text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">Disclaimer
                    </a>
                </li>
            </ul>
        </div>

    </footer>
</body>

</html>