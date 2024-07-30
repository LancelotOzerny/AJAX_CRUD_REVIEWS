<?php
require_once __DIR__ . '/autoload.php';

use classes\ReviewTable;

$count = intval($_POST['COUNT']) ?? 0;
$offset = intval($_POST['PAGE']) * $count ?? 0;
$sort = $_POST['SORT'] ?? 'name';
$direction = $_POST['DIRECTION'] ?? 'asc';

$data = [
    'count' => ReviewTable::CountAll(),
    'reviews' => ReviewTable::Read([], $count, $offset, $sort, $direction),
    'post' => $_POST
];

die(json_encode($data));