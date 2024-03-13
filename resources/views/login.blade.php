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
    <title>Log In</title>
</head>

<body style="display: flex; flex-direction: row; height: 100vh; width: 100vw; background-color: white;">
    <div class="credentials">
        <div class="bumn" style="margin-bottom: 150px;">
            <img src="img/BUMN-LOGO.png" alt="Logo BUMN">
        </div>
        <div class="container" id="container">
            <p style="color: #009ea9; font-size: 70px; font-weight: 800;">Selamat datang di
            <p style="color: #134a6e; font-size: 70px; font-weight: 800; margin-bottom: 84px; margin-left: auto;">MyPeltar.</p>
            <form action="/index" style="display: flex; flex-direction: column; gap:5px">
                <input type="text" id="username" name="username" placeholder="Username"
                    style="width: 100%;height: 50px;padding: 4px;box-sizing: border-box;border: none;border-bottom: 2px solid #808080; margin-bottom: 20px;"
                    required>
                <input type="password" id="password" name="password" placeholder="Password"
                    style=" width: 100%;height: 50px;padding: 4px;box-sizing: border-box;border: none;border-bottom: 2px solid #808080; margin-bottom: 20px;"
                    required>
                <button
                    style="height: 60px; width: 100%; background-color: #009ea9;color: white; font-family: 'Lato-Bold', Helvetica;font-weight: 700; font-size: 24px; border-radius: 16px;border: none; cursor: pointer; margin-top:50px">Log
                    in</button>
            </form>
        </div>
    </div>

    <div class="mypeltar"
        style="background-color: #1F2855; display: flex;justify-content: center; align-items: center;">
        <img src="img/MyPeltar-White.png" alt="Logo" style="height: 145px; width: 440px; ">
    </div>
</body>

</html>