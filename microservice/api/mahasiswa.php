<?php

header('Content-Type: application/json');   
require_once '../MahasiswaORM.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['nim'])){
        $nim = $_GET['nim'];
        $mahasiswaDetail = MahasiswaORM::find_one($nim);

        if ($mahasiswaDetail){
            echo json_encode($mahasiswaDetail->as_array());
        } else {
            http_response_code(404);
            echo json_encode(["error" => "Data tidak ditemukan"]);
        }
    } else {
        $mahasiswaList = MahasiswaORM::find_many();
        
        $data = [];
        foreach($mahasiswaList as $mahasiswa){
            $data[] = $mahasiswa->as_array();
        }
        echo json_encode($data);
    }
}