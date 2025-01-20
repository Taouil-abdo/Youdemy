<?php
require_once __DIR__ . "/../../../../../vendor/autoload.php";

use App\Controllers\coursesController;
use App\Controllers\TagsController;
use App\Controllers\CategoriesController;

$NewCaty = new CategoriesController();
$NewCourses = new coursesController();
$Newtags = new TagsController();

$Categories = $NewCaty->show();
$Tags = $Newtags->show();
$courses = $NewCourses->ShowAllCourses();
$create = $NewCourses->addCourse();
$accepteCourseByAdmin = $NewCourses->accepteCourseByAdmin();
// var_dump($accepteCourseByAdmin);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/f01941449c.js" crossorigin="anonymous"></script>
    <title>Courses</title>
</head>

<body class="bg-gray-100">

    <!-- Main Container -->
    <div class="flex h-screen">

        <!-- Sidebar -->
        <div class="hidden md:flex flex-col w-64 bg-gray-800">
            <div class="flex items-center justify-center h-16 bg-gray-900">
            <a href="../../../../../index.php"><span class="text-white font-bold uppercase">YouDemy</span></a>
            </div>
            <div class="flex flex-col flex-1 overflow-y-auto">
                <nav class="flex-1 px-4 py-4">
                    <a href="../dashboard.php"
                        class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                    </a>
                    <h3 class="px-4 py-2 text-xs uppercase tracking-wider text-gray-300 font-bold">Manage Users</h3>
                    <a href="../users/user.php" class="flex items-center px-4 py-2 mt-2 ml-3 text-gray-500 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-users mr-2"></i> Users
                    </a>
                    <h3 class="px-4 py-2 text-xs uppercase tracking-wider text-gray-300 font-bold">Manage Courses</h3>
                    <a href="../courses/course.php" class="flex items-center px-4 py-2 mt-2 ml-3 text-gray-500 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-file-alt mr-2"></i> Courses
                    </a>
                    <h3 class="px-4 py-2 text-xs uppercase tracking-wider text-gray-300 font-bold">Manage Categories</h3>
                    <a href="../categories/category.php" class="flex items-center px-4 py-2 mt-2 ml-3 text-gray-500 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-folder-open mr-2"></i> Categories
                    </a>
                    <h3 class="px-4 py-2 text-xs uppercase tracking-wider text-gray-300 font-bold">Manage Tags</h3>
                    <a href="../tags/tag.php" class="flex items-center px-4 py-2 mt-2 ml-3 text-gray-500 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-tags mr-2"></i> Tags
                    </a>
                    <h3 class="px-4 py-2 text-xs uppercase tracking-wider text-gray-300 font-bold">System Management</h3>
                    <form method='POST' class="flex items-center gap-3 px-4 py-2 mt-2 ml-3 text-gray-500 hover:bg-gray-700 rounded-md">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <button type="submit" name="logout">Logout</button>
                    </form>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-y-auto">
            <!-- Top Navigation -->
              <div class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">                    
                    <!-- --------------- RightNav ----------------------------- -->
                    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                        <div class="flex items-center gap-4">
                            <?php if(isset($_SESSION['role'])){ ?>
                             <?php  if($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Student' || $_SESSION['role'] == 'Teacher') { ?>
                                <button class="p-2 text-gray-500 hover:text-gray-700 focus:outline-none">
                                <i class="fas fa-bell"></i>
                                </button>
                              
                                <button type="button"
                                     class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                     id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                                     data-dropdown-placement="bottom">
                                     <span class="sr-only">Open user menu</span>
                                     <img class="w-8 h-8 rounded-full" src="https://tailwindcss.com/img/jonathan.jpg" alt="user photo">
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



            <!-- Dashboard Header -->
            <div class="p-6">
                <h1 class="text-2xl font-bold">Welcome to my dashboard! Mr <?= $_SESSION['username'] ?></h1>
                <p class="mt-2 text-gray-600">This is an example dashboard using Tailwind CSS.</p>
            </div>

            <!-- Courses Table -->
            <div class="p-6">
                <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                    <table class="min-w-full">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="py-2 px-3 text-sm">Course ID</th>
                                <th class="py-2 px-3 text-sm">Title</th>
                                <th class="py-2 px-3 text-sm">Content</th>
                                <th class="py-2 px-3 text-sm">Image</th>
                                <th class="py-2 px-3 text-sm">Status</th>
                                <th class="py-2 px-3 text-sm">Level</th>
                                <th class="py-2 px-3 text-sm">Category</th>
                                <th class="py-2 px-3 text-sm">Teacher</th>
                                <th class="py-2 px-3 text-sm">CreatedAt</th>
                                <th class="py-2 px-3 text-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($courses) : ?>
                                <?php foreach ($courses as $course) : ?>
                                    <form method='POST'>
                                    <tr class="border-b">
                                        <td class="py-2 px-3 text-sm"><?= $course['id']; ?></td>
                                        <td class="py-2 px-3 text-sm"><?= $course['title']; ?></td>
                                        <td class="py-2 px-3 text-sm"><?= $course['content']; ?></td>
                                        <td class="py-2 px-3 text-sm">
                                            <img src="../../../../public/asset/uploads/<?= $course['featured_image']; ?>" alt="course" class="w-16 h-16 object-cover rounded">
                                        </td>
                                        <td class="py-2 px-3 text-sm">
                                            <select name="status" id="status">
                                                <option value="<?= $course['status']; ?>"><?= $course['status']; ?></option>
                                                <option value="accepted">Accepted</option>
                                                <option value="refuse">Refuse</option>
                                            </select>
                                            
                                        </td>
                                        <td class="py-2 px-3 text-sm"><?= $course['level']; ?></td>
                                        <td class="py-2 px-3 text-sm"><?= $course['categorie_name']; ?></td>
                                        <td class="py-2 px-3 text-sm"><?= $course['teacher']; ?></td>
                                        <td class="py-2 px-3 text-sm"><?= $course['created_at']; ?></td>
                                        <td class="py-2 px-3 text-center text-lg">
                                            <input type="text" class="hidden" name="Cours_id" value="<?= $course['id']; ?>">
                                            <button type="submit" name="updateStatus">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    </form>
                                    
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="12" class="py-3 px-4 text-center">No data available</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('content_type').addEventListener('change', function() {
            const contentTypeVideoField = document.getElementById('contentTypeVideoField');
            const contentTypeDocumentField = document.getElementById('contentTypeDocumentField');

            if (this.value === 'video') {
                contentTypeVideoField.style.display = 'block';
                contentTypeDocumentField.style.display = 'none';
            } else if (this.value === 'document') {
                contentTypeVideoField.style.display = 'none';
                contentTypeDocumentField.style.display = 'block';
            } else {
                contentTypeVideoField.style.display = 'none';
                contentTypeDocumentField.style.display = 'none';
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</body>

</html>