<?php
namespace app\controllers\actions;

use yii\base\Action;

class FormAction extends Action
{
    public function run()
    {
        return $this->controller->render('form', ['message' => "Hello World FormAction"]);
    }
}