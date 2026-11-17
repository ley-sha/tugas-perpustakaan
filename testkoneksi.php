<?php 
require_once "koneksi.php";

$versi_server = mysqli_get_server_info($koneksi);
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tes Koneksi</title>
    <style>
        body {font-family: Arial, Helvetica, sans-serif; margin: 40px;}
        h1 {color: #022156;}
        .sukses {background: #e6f4ea; border-left: 5px solid #0f87a9; padding: 10px; }
        td {padding: 4px 16px 4px 0;}
    </style>
</head>
<body>
    <h1>Tes Koneksi Database</h1>
    <p class="sukses">Koneksi ke MYSQL berhasil</p>

    <table>
        <tr>
            <td>Host</td>
            <td>: <?php echo htmlspecialchars($host); ?></td>
        </tr>
        <tr>
            <td>Database</td>
            <td>: <?php echo htmlspecialchars($database); ?></td>
        </tr>
        <tr>
            <td>Versi Server</td>
            <td>: <?php echo htmlspecialchars($versi_server); ?></td>
        </tr>
    </table>
</body>
</html>