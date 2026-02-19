<?php

require_once '../MahasiswaORM.php';



?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background: #f8f8f8;
        }

        h1 {
            text-align: center;
            color: #444;
        }

        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px 16px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            padding: 6px 12px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }

        .btn:hover {
            background-color: #218838;
        }

        .back-btn {
            display: block;
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>

<body>

    <?php

        if (isset($_GET['nim'])) {
            $nim = $_GET['nim'];

            $mahasiswaDetail = MahasiswaORM::find_one($nim);

            $count = MahasiswaORM::where('nim', $nim)->count();
            
            if ($count == 1) {
                
                echo "<h1>Detil Mahasiswa</h1>";
                echo "<table>";
                echo "<tr><th>NIM</th><td>" . htmlspecialchars($mahasiswaDetail->nim) . "</td></tr>";
                echo "<tr><th>Nama</th><td>" . htmlspecialchars($mahasiswaDetail->nama_mhs) . "</td></tr>";
                echo "<tr><th>Jenis Kelamin</th><td>" . ($mahasiswaDetail->jk == 'L' ? 'Laki-laki' : 'Perempuan') . "</td></tr>";
                echo "<tr><th>Tempat Lahir</th><td>" . htmlspecialchars($mahasiswaDetail->tempat_lahir) . "</td></tr>";
                echo "<tr><th>Tanggal Lahir</th><td>" . htmlspecialchars($mahasiswaDetail->tgl_lahir) . "</td></tr>";
                echo "</table>";
                echo "<div class='back-btn'><a class='btn' href='tampil_mahasiswa.php'>Kembali</a></div>";
        } else {
            echo "<p style='text-align:center;'>Data mahasiswa tidak ditemukan.</p>";
        }
        } else {
            // Tampilkan daftar nim dan nama
            $mahasiswaList = MahasiswaORM::find_many();

            echo "<h1>Daftar Mahasiswa</h1>";
            echo "<table>";
            echo "<tr><th>NIM</th><th>Nama</th><th>Aksi</th></tr>";
            foreach ($mahasiswaList as $key => $mahasiswa) :
                echo "<tr>";
                echo "<td>" . htmlspecialchars($mahasiswa->nim) . "</td>";
                echo "<td>" . htmlspecialchars($mahasiswa->nama_mhs) . "</td>";
                echo "<td><a class='btn' href='?nim=" . urlencode($mahasiswa->nim) . "'>Detil</a></td>";
                echo "</tr>";
            endforeach;
            echo "</table>";
        }

    ?>

</body>

</html>