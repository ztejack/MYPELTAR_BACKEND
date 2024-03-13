<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css" />
    <title>Add Asset</title>
    <style>
        textarea:focus,
        input:focus {
            outline: none;
        }
    </style>
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
    <div class="content">
        <!-- Navbar -->
        <nav>
            <h3>Asset Management > Add Asset</h3>
            <a href="#"><i class="bi bi-bell-fill"></i></a>
            <img src="img/profpic.png" alt="Profile" style="margin-left: 12px; width: 32px; height: 32px;">
        </nav>
        <!-- End Navbar -->
        <main class="asset-page">
            <h1>Add a new asset</h1>
            <div class="add-asset-form">
                <div class="asset-img">
                    <h2>Asset Image</h2>
                    <h3>JPG, PNG, or SVG file. Size no more than 10MB.</h3>
                    <hr>
                    <div class="img-box">
                        <i class="bi bi-card-image"></i>
                        <div class="img-box-text">
                            <h2>Upload your asset</h2>
                            <h2 style="margin-bottom: 6px;">image here</h2>
                            <button>Upload File</button>
                        </div>
                    </div>
                    <h3>*Asset Image will be displayed at 88px width and</h3>
                    <h3>height.</h3>
                </div>
                <div class="asset-details">
                    <h2>Asset Details</h2>
                    <h3>Name, Type, Location, Codes, etc.</h3>
                    <hr>
                    <form action="#">
                        <h3>Name</h3>
                        <input type="search" placeholder="Enter asset name...">
                    </form>
                    <form action="#">
                        <h3>Type</h3>
                        <input type="search" placeholder="Enter asset type...">
                    </form>
                    <form action="#">
                        <h3>Location</h3>
                        <input type="search" placeholder="Enter asset location...">
                    </form>
                    <form action="#">
                        <h3>Code</h3>
                        <input type="search" placeholder="Enter asset code...">
                    </form>
                    <form action="#">
                        <h3>Stock Code</h3>
                        <input type="search" placeholder="Enter asset stock code...">
                    </form>
                    <form action="#">
                        <h3>Details (Optional)</h3>
                        <input type="search" placeholder="Enter additional details...">
                    </form>
                </div>
            </div>
            <div class="action-button">
                <li><a href="/assetmgmt" style="margin-right: 24px;"><i class="bi bi-arrow-left-square"></i>Cancel</a>
                <li><a href="/assetmgmt"><i class="bi bi-database-add"></i>Add Asset</button></a>
            </div>

        </main>
    </div>
</body>

</html>