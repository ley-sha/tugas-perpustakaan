<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       * {
        box-sizing: border-box;
       }

       body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        min-height: 100vh;
        background-color: skyblue;
        display: flex;
        justify-content: center;
        align-items: center;
       }

       .menu {
        display: flex;
        justify-content: center;
        gap: 20px;
       }

       input[type="submit"] {
        padding: 14px 25px;
        border: none;
        border-radius: 8px;
        color: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.25);
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
       }

        .biru {
            background-color: #087eaa;
        }

        .biru:hover {
            background-color: #022156;
        }

        .orange {
            background-color: #ff922b;
        }

        .orange:hover {
            background-color: #e87916;
        }
    </style>
</head>
<body>

    <div class="menu">

        <form action="form_anggota.php" method="post">
            <input type="submit" value="Masukan Data" class="biru">
        </form>
        <form action="data.php" method=post>
            <input type="submit" value="Tampil Data" class="orange">
        </form>
        
    </div>
</body>
</html>