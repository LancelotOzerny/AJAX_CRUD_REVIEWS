<?php
namespace App\Models;

use App\Classes\ReviewTable;
use App\Classes\Validator;
use App\Core\Model;

class Model_Main extends Model
{
    public function Read()
    {
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
    }

    public function Create()
    {
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

            $prepareData['EMAIL'] = htmlspecialchars($prepareData['EMAIL']);
            $prepareData['NAME'] = htmlspecialchars($prepareData['NAME']);
            $prepareData['TEXT'] = htmlspecialchars($prepareData['TEXT']);

            $result = ReviewTable::Create($prepareData);

            if ($result)
            {
                $data['RESULT'] = true;
            }
            else
            {
                $data['RESULT'] = false;
            }
        }

        die(json_encode($data));
    }
}