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
    <title>Add User</title>
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
    <div class="content">
        <!-- Navbar -->
        <nav>
            <h3>User Management > Add Users</h3>
            <a href="#"><i class="bi bi-bell-fill"></i></a>
            <img src="img/profpic.png" alt="Profile" style="margin-left: 12px; width: 32px; height: 32px;">
        </nav>
        <!-- End Navbar -->
        <main class="user-page">
            <h1 class="add-user-text">Add a User</h1>
            <div class="addings">
                <form action="#">
                    <h3>Display Name</h3>
                    <input type="search" placeholder="Type in the user's name...">
                </form>
                <form action="#">
                    <h3>Role</h3>
                    <select name="sortFilter">
                        <option value="option1">Option 1</option>
                        <option value="option2">Option 2</option>
                        <option value="option3">Option 3</option>
                    </select>
                </form>
            </div>
            <div class="action-button">
                <li><a href="/usermgmt" style="margin-right: 24px;"><i class="bi bi-arrow-left-square-fill"></i>Go
                        Back</a>
                <li><a href="/usermgmt"><i class="bi bi-save"></i>Save</button></a>
            </div>

        </main>
    </div>
</body>

</html>