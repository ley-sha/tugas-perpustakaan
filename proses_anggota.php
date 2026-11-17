
<?php
session_start();

$koneksi = mysqli_connect("localhost", "root", "", "db_perpustakaan_pwd");
require_once "koneksi.php";

$versi_server = mysqli_get_server_info($koneksi);

$pesan_sukses = "";
$pesan_gagal = "";

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $no_anggota = isset($_POST['no_anggota']) ? trim($_POST['no_anggota']) : '';
    $nama_lengkap = isset($_POST['nama_lengkap']) ? trim($_POST['nama_lengkap']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $no_hp = isset($_POST['no_hp']) ? trim($_POST['no_hp']) : '';
    $jenis_anggota = isset($_POST['jenis_anggota']) ? trim($_POST['jenis_anggota']) : '';
    $alamat = isset($_POST['alamat']) ? trim($_POST['alamat']) : '';

    $_SESSION['old'] = [
        'no_anggota' => $no_anggota,
        'nama_lengkap' => $nama_lengkap,
        'email' => $email,
        'no_hp' => $no_hp,
        'jenis_anggota' => $jenis_anggota,
        'alamat' => $alamat
    ];

    $daftar_error = [];

    if (empty($no_anggota)) {
        $daftar_error['no_anggota'] = "Nomor anggota harus diisi.";
    } elseif (!ctype_digit($no_anggota) || strlen($no_anggota) > 15) {
        $daftar_error['no_anggota'] = "Nomor anggota harus maksimal 15 digit angka.";
    }

    if (empty($nama_lengkap)) {
        $daftar_error['nama_lengkap'] = "Nama lengkap harus diisi.";
    } elseif (strlen($nama_lengkap) > 100 || !preg_match('/^[a-zA-Z\s]+$/', $nama_lengkap)) {
        $daftar_error['nama_lengkap'] = "Nama hanya boleh huruf dan spasi, maksimal 100 karakter.";
    }

    if (empty($email)) {
        $daftar_error['email'] = "Email harus diisi.";
    } elseif (strlen($email) > 100 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $daftar_error['email'] = "Format email tidak valid atau melebihi 100 karakter.";
    }

    if (empty($no_hp)) {
        $daftar_error['no_hp'] = "Nomor HP harus diisi.";
    } elseif (!ctype_digit($no_hp) || strlen($no_hp) < 10 || strlen($no_hp) > 13) {
        $daftar_error['no_hp'] = "Nomor HP harus terdiri dari 10 sampai 13 angka.";
    }

    if (empty($jenis_anggota)) {
        $daftar_error['jenis_anggota'] = "Jenis anggota harus dipilih.";
    } elseif (!in_array($jenis_anggota, ['Mahasiswa', 'Dosen', 'Tenaga Kependidikan'], true)) {
        $daftar_error['jenis_anggota'] = "Jenis anggota tidak valid.";
    }

    if (empty($alamat)) {
        $daftar_error['alamat'] = "Alamat harus diisi.";
    } elseif (strlen($alamat) > 500 || !preg_match('/^[a-zA-Z0-9\s,.-]+$/', $alamat)) {
        $daftar_error['alamat'] = "Format alamat tidak valid, maksimal 500 karakter.";
    }

    if (!empty($daftar_error)) {
        $_SESSION['daftar_error'] = $daftar_error;

        header("Location: form_anggota.php");
        exit;
    }

    $stmt = mysqli_prepare(
        $koneksi,
        "INSERT INTO anggota
        (no_anggota, nama_lengkap, email, no_hp, jenis_anggota, alamat)
        VALUES (?, ?, ?, ?, ?, ?)"
    );

    if ($stmt) {

        mysqli_stmt_bind_param(
            $stmt, "ssssss", $no_anggota, $nama_lengkap, $email, $no_hp, $jenis_anggota, $alamat
        );

        if (mysqli_stmt_execute($stmt)) {
            $pesan_sukses = "Data anggota berhasil disimpan.";

            unset($_SESSION['old']);

        } else {
            $pesan_gagal = "Gagal menyimpan data: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);

    } else {
        $pesan_gagal = "Gagal menyiapkan pernyataan: " . mysqli_error($koneksi);
    }

} else {
    $pesan_gagal = "Silakan isi form pendaftaran terlebih dahulu.";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota Perpustakaan</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        .sukses {
            color: green;
            margin-bottom: 15px;
        }

        .gagal {
            color: red;
            margin-bottom: 15px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #eeeeee;
        }
    </style>
</head>

<body>

    <h1>Data Anggota Perpustakaan</h1>

    <?php if ($pesan_sukses != ""): ?>
        <h3 class="sukses">
            <?= htmlspecialchars($pesan_sukses) ?>
        </h3>
    <?php endif; ?>

    <?php if ($pesan_gagal != ""): ?>
        <h3 class="gagal">
            <?= htmlspecialchars($pesan_gagal) ?>
        </h3>
    <?php endif; ?>

    <p>
        Versi server MySQL:
        <?= htmlspecialchars($versi_server) ?>
    </p>

    <a href="form_anggota.php">Kembali ke Form</a>

    <br><br>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor HP</th>
                <th>Jenis Anggota</th>
                <th>Alamat</th>
            </tr>
        </thead>

        <tbody>

            <?php
            $query = "SELECT * FROM anggota";
            $result = mysqli_query($koneksi, $query);

            if ($result) {

                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";

                        echo "<td>" . htmlspecialchars($row['no_anggota']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nama_lengkap']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['no_hp']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['jenis_anggota']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";

                        echo "</tr>";
                    }

                } else {
                    echo "<tr><td colspan='6'>Belum ada data anggota.</td></tr>";
                }

                mysqli_free_result($result);

            } else {
                echo "<tr><td colspan='6'>Gagal mengambil data: "
                    . htmlspecialchars(mysqli_error($koneksi))
                    . "</td></tr>";
            }
            ?>

        </tbody>
    </table>

</body>
</html>

<?php
if ($koneksi instanceof mysqli) {
    mysqli_close($koneksi);
}
?>
