<?php
/**
 * User: webs
 * Date: 13.05.15
 * Time: 12:37
 * To change this template use File | Settings | File Templates.
 */

namespace app\models;

use Yii;
use yii\base\Model;

class BaseModel extends Model
{
    public $db;
    private static $_models = array();

    public  function __construct() {
        $this->db = Yii::$app->db;
    }

    public static function model($className=__CLASS__)
    {

        if(isset(self::$_models[$className]))
            return self::$_models[$className];
        else
        {
            $model=self::$_models[$className]=new $className(null);
            return $model;
        }
    }
}