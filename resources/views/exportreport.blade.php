<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css" />
    <title>Export Report</title>
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
            <li><a href="/usermgmt"><i class="bi bi-person-fill-gear"></i>User Management</a></li>
            <li class="active"><a href="/exportreport"><i class="bi bi-file-text-fill"></i>Export Report</a></li>
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
            <h3>Export Report</h3>
            <a href="#"><i class="bi bi-bell-fill"></i></a>
            <img src="img/profpic.png" alt="Profile" style="margin-left: 12px; width: 32px; height: 32px;">
        </nav>
        <!-- End Navbar -->
        <main>
            <!-- Header -->
            <div class="add-asset">
                <h1 style="margin-right: 40px; color: gray;">All Files</h1>
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
                <h3 style="width: 15%;">Size</h3>
                <h3 style="width: 30%;">Date</h3>
                <h3>Action</h3>
            </div>
            <hr>
            <!-- End Placeholders -->
            <!-- Data Recap -->
            <ul class="data-recap">
                <li>
                    <h3 style="width: 35%;"><i class="bi bi-file-earmark-excel-fill"></i>Report 2019 Recapitulation
                    </h3>
                    <p style="width: 15%;">66.00 Kb</p>
                    <p style="width: 30%;">01 - 01 - 2020</p>
                    <button><i class="bi bi-download"></i>Download</button>
                </li>
                <hr>
                <li>
                    <h3 style="width: 35%;"><i class="bi bi-file-earmark-excel-fill"></i>Report 2020 Recapitulation
                    </h3>
                    <p style="width: 15%;">66.00 Kb</p>
                    <p style="width: 30%;">01 - 01 - 2021</p>
                    <button><i class="bi bi-download"></i>Download</button>
                </li>
                <hr>
                <li>
                    <h3 style="width: 35%;"><i class="bi bi-file-earmark-excel-fill"></i>Report 2021 Recapitulation
                    </h3>
                    <p style="width: 15%;">66.00 Kb</p>
                    <p style="width: 30%;">01 - 01 - 2022</p>
                    <button><i class="bi bi-download"></i>Download</button>
                </li>
                <hr>
            </ul>
        </main>
    </div>
</body>

</html>