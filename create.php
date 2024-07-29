<?php
require_once __DIR__ . '/autoload.php';

use classes\Validator;
use classes\ReviewTable;

$data = [];

if (empty($_POST))
{
    $data['ERRORS'][] = 'Отсутствуют входные данные!';
}
else
{
    $prepareData = [
        'EMAIL' => trim($_POST['EMAIL'] ?? ''),
        'NAME' => trim($_POST['NAME'] ?? ''),
        'TEXT' => trim($_POST['TEXT'] ?? ''),
    ];

    $validator = new Validator($prepareData);

    $data['POST'] = $prepareData;

    $data['ERRORS']['EMAIL'] = join('<br/>', $validator->getEmailErrors());
    $data['ERRORS']['NAME'] = join('<br/>', $validator->getNameErrors());
    $data['ERRORS']['TEXT'] = join('<br/>', $validator->getTextErrors());

    foreach ($data['ERRORS'] as $errorGroup)
    {
        if (empty($errorGroup) === false)
        {
            die(json_encode($data));
        }
    }
}

die(json_encode($data));