<?php

namespace app\controllers;

use yii\web\Controller;

class SiteController extends Controller
{

    public function actions()
    {
        return [
            // declares "error" action using a class name
            'form' => [
                'class' => 'app\controllers\actions\FormAction'
            ],
            'form_result' => [
                'class' => 'app\controllers\actions\FormResultAction'
            ],
            'db' => [
                'class' => 'app\controllers\actions\DbAction'
            ],
            'dbinit' => [
                'class' => 'app\controllers\actions\DbInitAction'
            ],
            'regexp' => [
                'class' => 'app\controllers\actions\RegExpAction'
            ],
        ];
    }
}