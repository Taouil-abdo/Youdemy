<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/f01941449c.js" crossorigin="anonymous"></script>
    <title>dashboard</title>
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
                    <a href="dashboard.php"
                        class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                    </a>
                    <h3 class="px-4 py-2 text-xs uppercase tracking-wider text-gray-300 font-bold">Manage Users</h3>
                          <a href="Users/User.php"
                            class="flex items-center px-4 py-2 mt-2 ml-3 text-gray-500 hover:bg-gray-700 rounded-md">
                            <i class="fas fa-users mr-2"></i> Users
                          </a>
                    <h3 class="px-4 py-2 text-xs uppercase tracking-wider text-gray-300 font-bold">Manage Courses</h3>
                    <a href="courses/course.php"
                        class="flex items-center px-4 py-2 mt-2 ml-3 text-gray-500 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-file-alt mr-2"></i> Courses
                    </a>
                    <h3 class="px-4 py-2 text-xs uppercase tracking-wider text-gray-300 font-bold">Manage Categories </h3>
                    <a href="Categories/Category.php"
                        class="flex items-center px-4 py-2 mt-2 ml-3 text-gray-500 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-folder-open mr-2"></i> Categories
                    </a>
                    <h3 class="px-4 py-2 text-xs uppercase tracking-wider text-gray-300 font-bold">Manage Tags 
                         </h3>
                    <a href="tags/tag.php"
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
            </div>

            <div class="flex-col max-w-7xl mx-auto px-4 sm:px-6 lg:py-8 lg:px-8">
                <h2 class="text-3xl mb-10 font-extrabold tracking-tight text-gray-900 sm:text-4xl dark:text-white">
                    Statistiques</h2>
                <div
                    class="flex justify-center items-center gap-[0.5rem] bg-gray-100 overflow-hidden sm:rounded-lg dark:bg-gray-900 flex-wrap justify-center items-center">
                    <!-- //card users -->
                    <div
                        class="p-10 sm:p-6 flex justify-center items-center gap-10 bg-white overflow-hidden shadow sm:rounded-lg dark:bg-gray-900">
                        <div id="cercle" class="flex flex-col justify-center items-center ">
                            <div class="bg-[#4ade80]  h-16 w-16 rounded-full flex flex-col justify-center items-center">
                                <i class="fa-solid fa-users fa-xl"></i>
                            </div>
                        </div>
                        <div class="flex flex-col justify-center items-center">
                            <h2 class="text-sm leading-5 font-medium text-gray-500 truncate dark:text-gray-400">Total
                                Users</h2>
                            <p class="mt-1 text-3xl leading-9 font-semibold text-indigo-600 dark:text-indigo-400">
                                <?php echo $totalUsers ?>
                            </p>
                        </div>
                    </div>

                    <!-- //card Article -->
                    <div
                        class="p-10 sm:p-6 flex justify-center items-center gap-10 bg-white overflow-hidden shadow sm:rounded-lg dark:bg-gray-900">
                        <div id="cercle" class="flex flex-col justify-center items-center ">
                            <div class="bg-[#22d3ee] h-16 w-16 rounded-full flex flex-col justify-center items-center">
                                <i class="fas fa-newspaper fa-xl"></i>
                            </div>
                        </div>
                        <div class="flex flex-col justify-center items-center">
                            <h2 class="text-sm leading-5 font-medium text-gray-500 truncate dark:text-gray-400">Total
                                Article</h2>
                            <p class="mt-1 text-3xl leading-9 font-semibold text-indigo-600 dark:text-indigo-400">
                                <?php echo $totalTags ?></p>
                        </div>
                    </div>

                    <!-- //card tags -->
                    <div
                        class="p-10 sm:p-6 flex justify-center items-center gap-10 bg-white overflow-hidden shadow sm:rounded-lg dark:bg-gray-900">
                        <div id="cercle" class="flex flex-col justify-center items-center ">
                            <div class="bg-[#c084fc] h-16 w-16 rounded-full flex flex-col justify-center items-center">
                                <i class="fas fa-tags fa-xl"></i>
                            </div>
                        </div>
                        <div class="flex flex-col justify-center items-center">
                            <h2 class="text-sm leading-5 font-medium text-gray-500 truncate dark:text-gray-400">Total
                                Tags</h2>
                            <p class="mt-1 text-3xl leading-9 font-semibold text-indigo-600 dark:text-indigo-400">
                                <?php echo $totalUsers ?></p>
                        </div>
                    </div>

                    <!-- //card categories -->
                    <div
                        class="p-10 sm:p-6 flex justify-center items-center gap-10 bg-white overflow-hidden shadow sm:rounded-lg dark:bg-gray-900">
                        <div id="cercle" class="flex flex-col justify-center items-center ">
                            <div class="bg-[#fcd34d] h-16 w-16 rounded-full flex flex-col justify-center items-center">
                                <i class="fas fa-folder fa-xl"></i>
                            </div>
                        </div>
                        <div class="flex flex-col justify-center items-center">
                            <h2 class="text-sm leading-5 font-medium text-gray-500 truncate dark:text-gray-400">Total
                                Categories</h2>
                            <p class="mt-1 text-3xl leading-9 font-semibold text-indigo-600 dark:text-indigo-400">
                                <?php echo $totalCategor ?></p>
                        </div>
                    </div>
                </div>
            </div>


            <!-- tablue -->
            <div class="container mx-auto p-4">
                <div>
                    <h2 class="text-2xl mb-10 font-extrabold tracking-tight text-gray-900 sm:text-2xl dark:text-white">
                        Users Info</h2>
                </div>
                <!-- <div class="overflow-x-auto"> -->
                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-2 px-4">Username</th>
                            <th class="py-2 px-4">Email</th>
                            <th class="py-2 px-4">Role</th>
                            <th class="py-2 px-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
            if ($rows) {
                foreach ($rows as $row) { ?>
                        <form method="POST">

                            <tr class="border-b">
                                <td class="py-2 px-4"><?= $row['username']; ?></td>
                                <td class="py-2 px-4"><?= $row['email']; ?></td>
                                <td class="py-2 px-4">
                                    <select name="role">
                                        <option value="<?= $row['role'] ?>"><?= $row['role'] ?>
                                        </option>
                                        <option value="admin">Admin
                                        </option>
                                        <option value="author">Author
                                        </option>
                                        <option value="user">User
                                        </option>
                                    </select>
                                </td>
                                <td class="py-2 px-4">
                                    <input type="hidden" name="UserId" value="<?= $row['id']; ?>">
                                    <button type="submit" name="updateUser" class="text-blue-500 hover:underline">
                                        <i class="fa-solid fa-pencil"></i>
                                    </button> |
                                    <button type="submit" name="deleteUser"
                                        onclick="return confirm('Are you sure you want to delete this player?')"
                                        class="text-red-500 hover:underline">>
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </form>

                        <?php }
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

    </script>
</body>

</html>