<?php

namespace classes;

class ReviewTable
{
    public static function Create(array $params)
    {

    }

    public static function Read(array $filter = []) : array
    {
        $sql = 'SELECT * FROM Reviews';

        $params = [];
        foreach ($filter as $key => $value)
        {
            $lower = mb_strtolower($key);
            $params[] = "$lower = :$lower";
        }

        if (empty($params) === false)
        {
            $sql .= ' WHERE ';
            $sql .= join(', ', $params);
        }

        $prepare = DataBase::connection()->prepare($sql);

        foreach ($filter as $key => $value)
        {
            $lower = mb_strtolower($key);
            $prepare->bindValue(":$lower", $value);
        }

        $prepare->execute();
        $arList = [];

        while (($row = $prepare->fetch()) !== false)
        {
            $arList[] = [
                'ID' => $row['id'],
                'NAME' => $row['name'],
                'EMAIL' => $row['email'],
                'TEXT' => $row['text'],
                'DATE' => $row['date'],
            ];
        }

        return $arList;
    }

    public static function Update(int $id, array $params)
    {

    }

    public static function Delete(int $id)
    {

    }
}