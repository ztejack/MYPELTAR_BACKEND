<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css" />
    <style>
        textarea:focus,
        input:focus {
            outline: none;
        }
    </style>
    <title>User Management</title>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <img src="img/MyPeltar-Blue.png" alt="MyPeltar">
        </a>
        <ul class="side-menu">
            <li><a href="/index"><i class="bi bi-grid-fill"></i>Main Menu</a></li>
            <li><a href="/assetmgmt"><i class="bi bi-server"></i>Asset Management</a></li>
            <li class="active"><a href="/usermgmt"><i class="bi bi-person-fill-gear"></i>User Management</a></li>
            <li><a href="/exportreport"><i class="bi bi-file-text-fill"></i>Export Report</a></li>
        </ul>
        <ul class="logout">
            <li><a href="/"><i class="bi bi-power">Log Out</i>
                </a></li>
        </ul>
    </div>
    <!-- End Sidebar -->
    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <h3>User Management</h3>
            <a href="#"><i class="bi bi-bell-fill"></i></a>
            <img src="img/profpic.png" alt="Profile" style="margin-left: 12px; width: 32px; height: 32px;">
        </nav>
        <!-- End Navbar -->
        <main>
            <!-- Header -->
            <div class="add-asset">
                <h1 style="margin-right: 40px; color: gray;">Users</h1>
                <hr style="margin-right: 40px;">
                <a href="/adduser"><i class="bi bi-person-fill-add"></i>Add User</a>
            </div>
            <!-- End Header -->
            <!-- Sorting -->
            <div class="sort-by">
                <form action="#">
                    <p style="font-weight: 700; margin-right: 20px; color: #134a6e;">Sort By:</p>
                    <select name="sortFilter" style="width: 240px; height: 40px;">
                        <option value="option1">All Users</option>
                        <option value="option2">Option 2</option>
                        <option value="option3">Option 3</option>
                    </select>
                </form>
            </div>
            <!-- End Sorting -->
            <!-- Placeholders -->
            <div class="placeholders">
                <h3 style="width: 35%;">Name</h3>
                <h3 style="width: 40%;">Role</h3>
                <h3>Action</h3>
            </div>
            <hr>
            <!-- End Placeholders -->
            <!-- Users -->
            <ul class="user-role">
                <li>
                    <p>Agus Sunyoto</p>
                    <div class="role-button">
                        <ul>
                            <p class="active">Super User</p>
                            <p>Inspector</p>
                            <p>Maintainer</p>
                        </ul>
                    </div>
                    <button class="edit"><i class="bi bi-pencil"></i>Edit</button>
                    <button class="delete"><i class="bi bi-trash"></i>Delete</button>
                </li>
                <hr>
                <li>
                    <p>Aldi Ersalado</p>
                    <div class="role-button">
                        <ul>
                            <p>Super User</p>
                            <p class="active">Inspector</p>
                            <p>Maintainer</p>
                        </ul>
                    </div>
                    <button class="edit"><i class="bi bi-pencil"></i>Edit</button>
                    <button class="delete"><i class="bi bi-trash"></i>Delete</button>
                </li>
                <hr>
                <li>
                    <p>Aninda Andiani</p>
                    <div class="role-button">
                        <ul>
                            <p>Super User</p>
                            <p>Inspector</p>
                            <p class="active">Maintainer</p>
                        </ul>
                    </div>
                    <button class="edit"><i class="bi bi-pencil"></i>Edit</button>
                    <button class="delete"><i class="bi bi-trash"></i>Delete</button>
                </li>
                <hr>
                <li>
                    <p>Muhammad Tomi</p>
                    <div class="role-button">
                        <ul>
                            <p>Super User</p>
                            <p>Inspector</p>
                            <p class="active">Maintainer</p>
                        </ul>
                    </div>
                    <button class="edit"><i class="bi bi-pencil"></i>Edit</button>
                    <button class="delete"><i class="bi bi-trash"></i>Delete</button>
                </li>
                <hr>
                <li>
                    <p>Ryan Febrian</p>
                    <div class="role-button">
                        <ul>
                            <p>Super User</p>
                            <p>Inspector</p>
                            <p class="active">Maintainer</p>
                        </ul>
                    </div>
                    <button class="edit"><i class="bi bi-pencil"></i>Edit</button>
                    <button class="delete"><i class="bi bi-trash"></i>Delete</button>
                </li>
                <hr>
            </ul>
        </main>
    </div>
</body>

</html>l