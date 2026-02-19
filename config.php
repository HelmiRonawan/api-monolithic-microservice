<?php
require_once ('vendor/autoload.php');
ORM::configure('mysql:host=localhost;dbname=kampus_db');
ORM::configure('username', 'root');
ORM::configure('password', '');

ORM::configure('logging', true);