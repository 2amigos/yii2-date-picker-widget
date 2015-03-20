<?php

namespace tests\models;


use yii\db\ActiveRecord;

class Post extends ActiveRecord
{
    public $date_from;
    public $date_to;
    public $create_time;

    public static $db;

    public static function getDb()
    {
        return self::$db;
    }
}
