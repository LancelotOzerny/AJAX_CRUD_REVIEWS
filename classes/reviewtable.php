<?php

namespace classes;

class ReviewTable
{
    public static function Create(array $params) : bool
    {
        $sql = 'INSERT INTO Reviews (`name`, `email`, `text`) VALUES (:name, :email, :text)';

        $prepare = DataBase::connection()->prepare($sql);
        $prepare->bindValue(':name', $params['NAME']);
        $prepare->bindValue(':email', $params['EMAIL']);
        $prepare->bindValue(':text', $params['TEXT']);

        return $prepare->execute();
    }

    public static function Read(array $filter = [], int $count = -1, int $offset = 1, string $order = 'name', string $direction = 'asc') : array
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

        $sql .= " ORDER BY $order $direction";

        if ($count !== -1)
        {
            $sql .= ' LIMIT :limit';
            $sql .= ' OFFSET :offset';
        }

        $prepare = DataBase::connection()->prepare($sql);

        foreach ($filter as $key => $value)
        {
            $lower = mb_strtolower($key);
            $prepare->bindValue(":$lower", $value);
        }

        if ($count !== -1)
        {
            $prepare->bindValue(":limit", $count, \PDO::PARAM_INT);
            $prepare->bindValue(":offset", $offset, \PDO::PARAM_INT);
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

    public static function CountAll()
    {
        $sql = 'SELECT COUNT(*) AS `count` FROM Reviews';
        $dbResult = DataBase::connection()->query($sql);
        $arr = $dbResult->fetch(\PDO::FETCH_ASSOC);
        return $arr['count'];
    }
}