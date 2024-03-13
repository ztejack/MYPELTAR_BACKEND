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
    <title>Asset Management</title>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <img src="img/MyPeltar-Blue.png" alt="MyPeltar">
        </a>
        <ul class="side-menu">
            <li><a href="/index"><i class="bi bi-grid-fill"></i>Main Menu</a></li>
            <li class="active"><a href="/assetmgmt"><i class="bi bi-server"></i>Asset Management</a></li>
            <li><a href="/usermgmt"><i class="bi bi-person-fill-gear"></i>User Management</a></li>
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
            <h3>Asset Management</h3>
            <a href="#"><i class="bi bi-bell-fill"></i></a>
            <img src="img/profpic.png" alt="Profile" style="margin-left: 12px; width: 32px; height: 32px;">
        </nav>
        <!-- End Navbar -->
        <main>
            <!-- Header -->
            <div class="add-asset">
                <h1 style="margin-right: 40px; color: gray;">Assets</h1>
                <hr style="margin-right: 40px;">
                <a href="/addasset"><i class="bi bi-clipboard-plus-fill"></i>Add Assets</a>
            </div>
            <!-- End Header -->
            <!-- Filter -->
            <div class="filter">
                <!-- Keywords -->
                <form action="#">
                    <h3>Keywords</h3>
                    <div class="keywords">
                        <button class="search-btn" type="submit" style="margin-right: 8px;">
                            <i class="bi bi-search" style="font-size: 1.5rem; color: grey;"></i>
                        </button>
                        <input type="search" placeholder="Type in a keyword ...">
                    </div>
                </form>
                <!-- End Keywords -->
                <!-- Place -->
                <form action="#">
                    <h3>Place</h3>
                    <div class="place" style="width: 360px;">
                        <input type="search" placeholder="Type in a place ...">
                    </div>
                </form>
                <!-- End Place -->
                <form action="#">
                    <h3>Type</h3>
                    <select name="typeFilter" style="width: 360px;">
                        <option value="option1">Option 1</option>
                        <option value="option2">Option 2</option>
                        <option value="option3">Option 3</option>
                    </select>
                </form>
                <!-- Stock Code -->
                <form action="#">
                    <h3>Stock Code</h3>
                    <select name="stockFilter" style="width: 340px;">
                        <option value="option1">Option 1</option>
                        <option value="option2">Option 2</option>
                        <option value="option3">Option 3</option>
                    </select>
                </form>
                <!-- End Stock Code -->
                <!-- Filter button -->
                <form action="#">
                    <h3>More Filters +</h3>
                    <button class="filterplus">
                        Filter
                    </button>
                </form>
                <!-- End Filter Button -->
            </div>
            <!-- End Filter -->
            <!-- Sort By -->
            <div class="sort-by">
                <form action="#">
                    <p style="font-weight: 700; margin-right: 20px;">Sort By:</p>
                    <select name="sortFilter" style="width: 240px; height: 40px;">
                        <option value="option1">Option 1</option>
                        <option value="option2">Option 2</option>
                        <option value="option3">Option 3</option>
                    </select>
                </form>
            </div>
            <!-- End Sort By -->

            <!-- Placeholders -->
            <div class="placeholders">
                <p style="width: 30%;">Name</p>
                <p style="width: 25%;">Place</p>
                <p>Type</p>
            </div>
            <hr>
            <!-- End Placeholders -->

            <!--Item List -->
            <ul class="items">
                <li>
                    <h3>Power Set Mata Bort Elektrik Listrik</h3>
                    <p>Gedung Terpadu</p>
                    <p>Electrical</p>
                    <button>Edit</button>
                    <button>Delete</button>
                </li>
                <hr>
                <li>
                    <h3>Valve Spring Tester</h3>
                    <p>Gedung Terpadu</p>
                    <p>Electrical</p>
                    <button>Edit</button>
                    <button>Delete</button>
                </li>
                <hr>
                <li>
                    <h3>Soft Solder wire 1.15mm Flux Control</h3>
                    <p>Gedung Terpadu</p>
                    <p>Electrical</p>
                    <button>Edit</button>
                    <button>Delete</button>
                </li>
                <hr>
                <li>
                    <h3>Inside Micrometer Booster</h3>
                    <p>RCD 2</p>
                    <p>Electrical</p>
                    <button>Edit</button>
                    <button>Delete</button>
                </li>
                <hr>
                <li>
                    <h3>Solder Iron Adjustable 40 Watt</h3>
                    <p>RCD 1</p>
                    <p>Electrical</p>
                    <button>Edit</button>
                    <button>Delete</button>
                </li>
                <hr>
            </ul>
        </main>
    </div>

    <!-- End Main Content -->
</body>

</html>