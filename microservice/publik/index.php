<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 40px;
        }

        table {
            width: 60%;
            margin: auto;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background: #007BFF;
            color: white;
        }

        .btn {
            cursor: pointer;
            background: #28a745;
            color: white;
            padding: 6px 10px;
            border: none;
            border-radius: 4px;
        }

        .btn:hover {
            background: #218838;
        }

        #detail {
            margin-top: 30px;
            text-align: center;
        }

        #back {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h1 style="text-align:center;">Daftar Mahasiswa</h1>
    <table id="list">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Detil</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    <div id="detail"></div>
    <div id="back" style="text-align:center; display:none;">
        <button onclick="loadList()" class="btn">Kembali</button>
    </div>
    <script>
const apiURL = '../api/mahasiswa.php';

function loadList() {
    document.getElementById('detail').innerHTML = '';
    document.getElementById('back').style.display = 'none';
    document.getElementById('list').style.display = 'table';

    fetch(apiURL)
        .then(res => res.json())
        .then(data => {
            const tbody = document.querySelector('#list tbody');
            tbody.innerHTML = '';

            data.forEach(mhs => {
                tbody.innerHTML += `
                    <tr>
                        <td>${mhs.nim}</td>
                        <td>${mhs.nama_mhs}</td>
                        <td>
                            <button class="btn" 
                                data-nim="${mhs.nim}" 
                                onclick="showDetail(this)">
                                Detil
                            </button>
                        </td>
                    </tr>`;
            });
        });
}

function showDetail(btn) {
    const nim = btn.getAttribute('data-nim');

    fetch(`${apiURL}?nim=${nim}`)
        .then(res => res.json())
        .then(data => {
            document.getElementById('detail').innerHTML = `
                <h2>Detil Mahasiswa</h2>
                <table style="margin:auto;">
                    <tr><th>NIM</th><td>${data.nim}</td></tr>
                    <tr><th>Nama</th><td>${data.nama_mhs}</td></tr>
                    <tr><th>Jenis Kelamin</th>
                        <td>${data.jk === 'L' ? 'Laki-laki' : 'Perempuan'}</td>
                    </tr>
                    <tr><th>Tempat Lahir</th><td>${data.tempat_lahir}</td></tr>
                    <tr><th>Tanggal Lahir</th><td>${data.tgl_lahir}</td></tr>
                </table>
            `;

            document.getElementById('list').style.display = 'none';
            document.getElementById('back').style.display = 'block';
        });
}

loadList();
</script>

</body>

</html>