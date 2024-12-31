<?php

// Menghubungkan ke file koneksi.php
include "koneksi.php";
// Query untuk mengambil semua data dari tabel transaksi
$query = "SELECT id, nama, nama_lengkap, email, password, data_barang FROM transaksi";
$result = mysqli_query($conn, $query);

if(!$result){
    die("Query Error: " .mysqli_error($conn));
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            text-align: left;
        }

        th,
        td {
            padding: 8px
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>

</head>

<body>
    <h2>Data Transaksi</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Password</th>
            <th>Data Barang</th>
            <th>Aksi</th>
        </tr>

        <?php
        // Menampilkan data per baris
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row ['id']."</td>";
            echo "<td>".$row ['nama']."</td>";
            echo "<td>".$row ['nama_lengkap']."</td>";
            echo "<td>".$row ['email']."</td>";
            echo "<td>".$row ['password']."</td>";
            echo "<td>".$row ['data_barang']."</td>";
            echo "<td>Edit | Hapus</td>";
            echo "</tr>";
        }
        ?>

    </table>
    <?php
    // Menutup koneksi 
    mysqli_close($conn);
    ?>   
</body>
</html>