<?php
require_once __DIR__ . '/autoload.php';

use classes\ReviewTable;

$count = intval($_POST['COUNT']) ?? -1;
$offset = intval($_POST['OFFSET']) ?? 0;

$data = [
    'count' => ReviewTable::CountAll(),
    'reviews' => ReviewTable::Read([], $count, $offset),
    'post' => $_POST
];

die(json_encode($data));