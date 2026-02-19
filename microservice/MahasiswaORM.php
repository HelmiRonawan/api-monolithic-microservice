<?php
require_once 'config.php';

class MahasiswaORM extends Model{
    public static $_table = 'mahasiswa';
    public static $_id_column = 'nim';
}