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
            padding: 40px 15px;
            min-height: 100vh;
            background: skyblue;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: white;
            width: 100%;
            max-width: 550px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }

        h1 {color: #022156;
            text-align: center;
            font-size: 25px;
            margin-top: 0;
            margin-bottom: 25px;
        }
          label {
            display: block;
            color: #333;
            font-weight: bold;
            margin-bottom: 4px;
        }

        input, select, textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            outline: none;
            margin-top: 4px;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #087eaa;
            box-shadow: 0 0 4px rgba(8, 126, 170, 0.3);
        }

        small {
            display: block;
            color: dimgray;
            font-size: 11px;
            margin-top: 5px;
            margin-bottom: 18px;
        }

        textarea {
            resize: vertical;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #ff922b;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 5px;
        }

        button:hover {
            background: #e87916;
        }

        .kembali {
            text-align: center;
            margin-top: 14px;
        }

        .kembali a {
            color: #087eaa;
            text-decoration: none;
        }

        .kembali a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
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

            <button type="submit">Simpan</button>

        <div class="kembali">
            <a href="dashboard.php">Kembali ke Dashboard</a>
        </div>

        </form>
    </div>
</body>
</html>

