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
    <h1 style="text-align:center;">Daftar Jurusan</h1>
    <table id="list">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Jurusan</th>
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
        const apiURL = 'https://adminkampus.agussbn.my.id/api/jurusan';

        function loadList() {
            document.getElementById('detail').innerHTML = '';
            document.getElementById('back').style.display = 'none';
            
            fetch(apiURL)
                .then(res => res.json())
                .then(data => {
                    const tbody = document.querySelector('#list tbody');
                    tbody.innerHTML = '';
                    data.forEach(mhs => {
                        const row = `
                                    <tr>
                                    <td>${mhs.id}</td>
                                    <td>${mhs.nama_jurusan}</td>
                                    <td><button class="btn" onclick="showDetail('${mhs.id}')">Detil</button></td>
                                    </tr>`;
                                        tbody.innerHTML += row;
                                    });
                                });
                        }

        function showDetail(id) {

            fetch(`${apiURL}?id=${id}`)
                .then(res => res.json())
                .then(data => {
                    let html = `
                            <h2>Detil Jurusan</h2>
                            <table style="margin:auto;">
                            <tr><th>ID</th><td>${data.id}</td></tr>
                            <tr><th>Nama Jurusan</th><td>${data.nama_jurusan}</td></tr>
                            </table>`;
                    document.getElementById('detail').innerHTML = html;
                    document.getElementById('back').style.display = 'block';
                    document.querySelector('#list tbody').innerHTML = '';
                });
        }
        // Load awal
        loadList();
    </script>
</body>

</html>