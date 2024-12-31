<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran</title>
    <style>
        body {
  font-family: sans-serif;
  margin: 20px;
}

h2 {
  text-align: center;
}

table {
  border-collapse: collapse;
  width: 500px;
  margin: 0 auto;
}

th, td {
  border: 1px solid #ccc;
  padding: 10px;
}

th {
  background-color: #f2f2f2;
}

input[type="text"],
input[type="email"],
input[type="password"],
input[type="number"] {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

input[type="submit"] {
  background-color: #007bff;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 3px;
  cursor: pointer;
}

.error {
  color: red;
  font-size: 12px;
  margin-top: 5px;
}
    </style>
</head>
<body>
    <form action="submit.php" method="post" onsubmit="return validateform()">
        <h2>Pendaftaran</h2>

        <input type="hidden" name="id" value="<?php if(!empty($data['id'])){ echo $data['id']; } ?>">
        <table>
            <tr>
                <td><label for="username">Username</label></td>
                <td><input type="text" id="username" name="username" required value="<?php if(!empty($data['nama'])) { echo $data['nama']; } ?>"> </td>
            </tr>
            <tr>
                <td><label for="nama_lengkap">Nama Lengkap</label></td>
                <td><input type="text" id="nama_lengkap" name="nama_lengkap" required></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" id="email" name="email" required></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" id="password" name="password" required></td>
            </tr>

            <?php

                // Decode data barang terpilih
                $data_barang_terpilih = (!empty($data['data_barang'])) ? json_decode($data['data_barang'], true) : array();
            ?>
            <tr>
                <td><label>Barang</label></td>
                <td colspan="2">
                    <div>
                        <input type="checkbox" name="barang[]" value="coklat - Rp30.000" id="coklat">
                        <label for="coklat">Coklat - Rp30.000</label>
                        <input type="number" name="jumlah[]" placeholder="Jumlah" min="1" style="width: 80px;">
                    </div>
                    <div>
                        <input type="checkbox" name="barang[]" value="stroberi - Rp40.000" id="stroberi">
                        <label for="stroberi">Stroberi - Rp40.000</label>
                        <input type="number" name="jumlah[]" placeholder="Jumlah" min="1" style="width: 80px;">
                    </div>
                    <div>
                        <input type="checkbox" name="barang[]" value="mangga - Rp30.000" id="mangga">
                        <label for="mangga">Mangga - Rp30.000</label>
                        <input type="number" name="jumlah[]" placeholder="Jumlah" min="1" style="width: 80px;">
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Submit">
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center; margin top: 10px;">
                <a href="lihatdata.php" style="color: #007bff; text-decoration: none;">Lihat Data</a>
            </td>
            </tr>
        </table>
    </form>

    <script>
        function validateform() {
            var password = document.getElementById("password").value;
            var barang = document.getElementsByName("barang[]");
            var jumlah = document.getElementsByName("jumlah[]");
            var valid = true;

            // Validasi password minimal 6 karakter
            if (password.length < 6) {
                alert("Password harus memiliki minimal 6 karakter.");
                valid = false;
            }

            // Validasi jumlah barang jika checkbox dipilih
            for (var i = 0; i < barang.length; i++) {
                if (barang[i].checked) {
                    var jumlahInput = jumlah[i].value;
                    if (jumlahInput === "" || jumlahInput < 1) {
                        alert("Masukkan jumlah yang valid untuk produk " + barang[i].value);
                        valid = false;
                        break;
                    }
                }
            }
            return valid;
        }
    </script>
</body>
</html>