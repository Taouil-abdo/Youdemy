<?php 
require_once __DIR__."/../../../../../vendor/autoload.php";

use App\Controllers\TagsController;

$Newtags = new TagsController();
$tags = $Newtags->show();
$create= $Newtags->create();
$destroy=$Newtags->destroy();


 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/f01941449c.js" crossorigin="anonymous"></script>
    <title>tags</title>
</head>

<body>

    <div class="flex h-screen bg-gray-100">

        <!-- sidebar -->
        <div class="hidden md:flex flex-col w-64 bg-gray-800">
            <div class="flex items-center justify-center h-16 bg-gray-900">
                <span class="text-white font-bold uppercase">YouDemy</span>
            </div>
            <div class="flex flex-col flex-1 overflow-y-auto">
                <nav class="flex-1 px-4 py-4">
                    <a href="../../dashboard.php"
                        class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                    </a>
                    <h3 class="px-4 py-2 text-xs uppercase tracking-wider text-gray-300 font-bold">Manage Users</h3>
                          <a href="../users/user.php"
                            class="flex items-center px-4 py-2 mt-2 ml-3 text-gray-500 hover:bg-gray-700 rounded-md">
                            <i class="fas fa-users mr-2"></i> Users
                          </a>
                    <h3 class="px-4 py-2 text-xs uppercase tracking-wider text-gray-300 font-bold">Manage Courses</h3>
                    <a href="../courses/course.php"
                        class="flex items-center px-4 py-2 mt-2 ml-3 text-gray-500 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-file-alt mr-2"></i> Courses
                    </a>
                    <h3 class="px-4 py-2 text-xs uppercase tracking-wider text-gray-300 font-bold">Manage Categories </h3>
                    <a href="../categories/category.php"
                        class="flex items-center px-4 py-2 mt-2 ml-3 text-gray-500 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-folder-open mr-2"></i> Categories
                    </a>
                    <h3 class="px-4 py-2 text-xs uppercase tracking-wider text-gray-300 font-bold">Manage Tags 
                         </h3>
                    <a href="../tags/tag.php"
                        class="flex items-center px-4 py-2 mt-2 ml-3 text-gray-500 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-tags mr-2"></i> Tags
                    </a>
                    <h3 class="px-4 py-2 text-xs uppercase tracking-wider text-gray-300 font-bold">System Management </h3>

                    <form method='POST'
                        class="flex items-center gap-3 px-4 py-2 mt-2 ml-3 text-gray-500 hover:bg-gray-700 rounded-md">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <button type="submit" name="logout">Logout</button>
                    </form>

                </nav>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex flex-col flex-1 overflow-y-auto">
        <div class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">                    
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
                                    href="app/views/Auth/Login.php">
                                    Login
                                </a>
                                <div class="hidden sm:flex">
                                    <a class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-indigo-700 hover:text-white"
                                        href="app/views/Auth/SignUp.php">
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
                                <span class="block text-sm text-gray-900 dark:text-white inline-block">Bonnie
                                    Green</span>
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
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                            </svg>
                        </button>
                    </div>
                    <!-- --------------- EndRightNav ----------------------------- -->

                    <!-- --------------- middelNav ----------------------------- -->
                    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
                        id="navbar-user">
                        <form class="mx-auto max-w-xl py-2 px-6 rounded-full bg-gray-50 border flex focus-within:border-gray-300">
                           <input type="text" placeholder="Search anything" class="bg-transparent w-full focus:outline-none pr-4 font-semibold border-0 focus:ring-0 px-0 py-0" name="topic"><button class="flex flex-row items-center justify-center min-w-[130px] px-4 rounded-full font-medium tracking-wide border disabled:cursor-not-allowed disabled:opacity-50 transition ease-in-out duration-150 text-base bg-black text-white font-medium tracking-wide border-transparent py-1.5 h-[38px] -mr-3" >
                               Search
                          </button>
                        </form>
                    </div>
                    <!-- --------------- EndmiddelNav ----------------------------- -->
                </div>
            </div>
            <div class="flex justify-evenly items-center ">
                <div class="p-4">
                    <h1 class="text-2xl font-bold">Welcome to my dashboard!</h1>
                    <p class="mt-2 text-gray-600">This is an example dashboard using Tailwind CSS.</p>
                </div>

                <!-- button Ajouter player -->
                <div class="btnAjouter">
                    <button id="btnAjouter" class="h-10 w-24 bg-blue-600 text-white rounded shadow-lg">Add Tags</button>
                </div>

            </div>

            <div class="flex-col w-full max-w-7xl mx-auto px-4 sm:px-6 lg:py-24 lg:px-8">
                
            <div id="content" role="main" class="w-full max-w-md mx-auto p-6">
                    <div class="mt-7 bg-white  rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700 border-2 border-indigo-300">
                        <div class="p-4 sm:p-7">
                            <div class="text-center">
                                <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Add New Categor</h1>
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                    Categor_Name
                                </p>
                            </div>

                            <div class="mt-5">
                                <form method="POST">
                                    <div class="grid gap-y-4">
                                        <div>
                                            <label for="tag_name"
                                                class="block text-sm font-bold ml-1 mb-2 dark:text-white">tag_name</label>
                                            <div class="relative">
                                                <input type="tag_name" id="tag_name" name="tag_name"
                                                    class="py-3 px-4 block w-full border-2 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                                                    required aria-describedby="tag_name-error">
                                            </div>
                                        </div>
                                        <button type="submit" name="addTag"
                                            class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">Add
                                            Catigory</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- tablue -->
                <div class="container w-full mx-auto p-4">
                    <!-- <div class="overflow-x-auto"> -->
                    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="py-2 px-4">id</th>
                                <th class="py-2 px-4">Tag</th>
                                <th class="py-2 px-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                    if ($tags) {
                      foreach($tags as $tag){
                  ?>
                            <tr class="border-b">
                                <td class="py-2 px-4 text-center"><?= $tag['id']; ?></td>
                                <td class="py-2 px-4 text-center"><?= $tag['tag_name']; ?></td>
                                <td class="py-2 px-4 text-center">
                                    <a href="update.php?id=<?= $tag['id']; ?>" class="text-blue-500 hover:underline"><i
                                            class="fa-solid fa-pencil"></i></a> |
                                    <a href="tag.php?id=<?= $tag['id']; ?>"
                                        onclick="return confirm('Are you sure you want to delete this player?')"
                                        class="text-red-500 hover:underline"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                      }
                      } else {
                      echo "<tr><td colspan='8' class='py-2 px-4 text-center'>No data available</td></tr>";
                      }
                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script>
     let btnAjouter = document.getElementById("btnAjouter");
     let formParent = document.getElementById("form-parent");

     btnAjouter.addEventListener("click", function() {
        formParent.classList.toggle("hidden");
     })
    </script>

</body>

</html>