<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css" />

    <title>MyPeltar</title>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <img src="img/MyPeltar-Blue.png" alt="MyPeltar">
        </a>
        <ul class="side-menu">
            <li class="active"><a href="/index"><i class="bi bi-grid-fill"></i>Main Menu</a></li>
            <li><a href="/assetmgmt"><i class="bi bi-server"></i>Asset Management</a></li>
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
            <h3>Main Menu</h3>
            <a href="#"><i class="bi bi-bell-fill"></i></a>
            <img src="img/profpic.png" alt="Profile" style="margin-left: 12px; width: 32px; height: 32px;">
        </nav>
        <!-- End Navbar -->
        <main>
            <!-- Insights -->
            <ul class="insights">
                <li>
                    <span class="info">
                        <h1>34</h1>
                        <h3>Total Tasks</h3>
                        <p>+5 in the last 24h</p>
                    </span>
                    <img src="img/Total Task.png" alt="Total Task" style="height: 111px; width: 83px;">
                </li>
                <li>
                    <span class="info">
                        <h1>15</h1>
                        <h3>Maintained</h3>
                        <p>+2 in the last 24h</p>
                    </span>
                    <img src="img/Maintained.png" alt="Maintained">
                </li>
                <li>
                    <span class="info">
                        <h1>14</h1>
                        <h3>Processed</h3>
                        <p>+7 in the last 24h</p>
                    </span>
                    <img src="img/Processed.png" alt="TProcessed">
                </li>
                <li>
                    <span class="info">
                        <h1>5</h1>
                        <h3>Report</h3>
                        <p>+5 in the last 24h</p>
                    </span>
                    <img src="img/Report.png" alt="Report">
                </li>
            </ul>
            <!-- End Insights -->

            <!-- Maintenance Tracing -->

            <div class="maintenance">
                <ul class="tracing-option">
                    <li style="border-color: #198754; background-color: #198754;"><a href="#" style="color: #fff;"><i
                                class="bi bi-clipboard2-check"></i>Maintained</a>
                    </li>
                    <li style="border-color: #ffc107;"><a href="/indexprocess" style="color: #ffc107;"><i
                                class="bi bi-clock"></i>Process</a></li>
                    <li style="border-color: #0d6efd;"><a href="/indexreport" style="color: #0d6efd;"><i
                                class="bi bi-clock-history"></i>Report</a></li>
                </ul>
                <ul class="tracing-button">
                    <li><a href="#"><i class="bi bi-wrench-adjustable-circle-fill"></i> Maintenance Tracing</a></li>
                </ul>
                <div class="tracing-items">
                    <ul class="items">
                        <li><img src="img/item-1.png" alt="">
                            <div>
                                <h2>Unit Laptop HP Pavilion X360</h2>
                                <h3>GD 254</h3>
                                <p><i class="bi bi-geo-alt-fill"></i>Gedung Terpadu</p>
                            </div>
                            <button>View Details</button>
                        </li>
                        <li><img src="img/item-2.png" alt="">
                            <div>
                                <h2>Second Floor Electricity Kit</h2>
                                <h3>GD 24</h3>
                                <p><i class="bi bi-geo-alt-fill"></i>Gedung Terpadu</p>
                            </div>
                            <button>View Details</button>
                        </li>
                        <li><img src="img/item-3.png" alt="">
                            <div>
                                <h2>Television Remote Control</h2>
                                <h3>LRT 1075</h3>
                                <p><i class="bi bi-geo-alt-fill"></i>RCD 3</p>
                            </div>
                            <button>View Details</button>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End Maintenance Tracing -->
        </main>
    </div>


</body>

</html>