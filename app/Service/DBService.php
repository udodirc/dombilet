<?php

namespace App\Service;

use Illuminate\Support\Facades\DB;

class DBService
{
    public static function getUpdateQuery(
        array $data,
        string $tableName,
        string $setColumn,
        string $whereColumn,
        string $whenIndex,
        string $valIndex,
    ): string
    {
        $result = '';
        if(!empty($data)){
            $ids = '';
            $result = 'UPDATE `'.$tableName.'` SET '.$setColumn.' = (CASE '.$whereColumn;
            foreach ($data as $index => $field){
                $result.= " WHEN '".$field[$whenIndex]."' THEN '".$field[$valIndex]."'";
                $ids.= "'".$field[$whenIndex]."'".((array_key_last($data) != $index) ? ',' : '');
            }
            $result.= ' END) WHERE '.$whereColumn.' IN('.$ids.')';
        }

        return $result;
    }

    public static function update(
        array $data,
        string $tableName,
        string $setColumn,
        string $whereColumn,
        string $whenIndex,
        string $valIndex,
    ): bool
    {
        $query = self::getUpdateQuery(
            $data,
            $tableName,
            $setColumn,
            $whereColumn,
            $whenIndex,
            $valIndex
        );
        if($query != ''){
            if(DB::statement($query)){
                return true;
            }
        }

        return false;
    }
}
