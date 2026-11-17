<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {font-family: Arial, Helvetica, sans-serif; margin: 40px;}
        h1 {color: #022156; background: #e6f4ea; border-left: 5px solid #0f87a9; padding: 10px;}
        small {color: dimgray; font-size: 8px;}
    </style>
</head>
<body>
    <h1>Form Anggota Perpustakaan</h1>
    <form action="proses_anggota.php" method="post">
        <label for="no_anggota">Nomor Anggota</label><br>
        <input type="text" name="no_anggota" id="no_anggota" required maxlength="15" pattern="[0-9]{1,15}"><br>
        <small>Nomor Anggota harus berupa angka dan maksimal 15 digit.</small><br><br>

        <label for="nama_lengkap">Nama Lengkap</label><br>
        <input type="text" name="nama_lengkap" id="nama_lengkap" required maxlength="100" pattern="[a-zA-Z\s]{1,100}"><br>
        <small>Nama Lengkap hanya boleh mengandung huruf dan spasi, maksimal 100 karakter.</small><br><br>

        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" required><br>
        <small>Email harus berupa alamat email yang valid.</small><br><br>

        <label for="no_hp">No HP</label><br>
        <input type="text" name="no_hp" id="no_hp" required maxlength="15" pattern="[0-9]{10,15}"><br>
        <small>No HP harus berupa angka dan antara 10-15 digit.</small><br><br>

        <label for="jenis_anggota">Jenis Anggota</label><br>
        <select id="jenis_anggota" name="jenis_anggota" required>
            <option value="">Pilih Jenis Anggota</option>
            <option>Mahasiswa</option>
            <option>Dosen</option>
            <option>Tenaga Kependidikan</option>
        </select><br>
        <small>Jenis Anggota harus dipilih.</small><br><br>

        <label for="alamat">Alamat</label><br>
        <textarea name="alamat" id="alamat" rows="4" cols="50" required></textarea><br>
        <small>Alamat harus diisi.</small><br><br>

        <input type="submit" value="Simpan">
    </form>
</body>
</html>

