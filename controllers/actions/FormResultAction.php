<?php
namespace app\controllers\actions;
use Yii;
use yii\base\Action;

class FormResultAction extends Action
{
    public function run()
    {
        $items = Yii::$app->request->post();

        $items['N'] = $this->prependArray($items['N']);
        $count = count($items['N']);
        $d = 0;
        $sum = [];
        $data = $items['N'];

        if (count($items['N']) != 1) {
            $_f1 = [];
            $f1 = 0;
            $f2 = 0;
            $count = count($items['N']) - 1;
            for ($i = 0; $i < $count; $i++) {

                $_f1[] = array_shift($data);

                $f2 = array_reduce($data, function ($i1, $i2) {
                    $i1 += $i2;
                    return $i1;
                });

                $f1 = array_reduce($_f1, function ($i1, $i2) {
                    $i1 += $i2;
                    return $i1;
                });
                $sum[] =abs($f1 - $f2);
            }

            $d = array_reduce($sum, function ($i1, $i2) {

                if (is_null($i1))
                    $i1 = $i2;

                if (  $i2 <= $i1){
                    $i1 = $i2;
                }
                return $i1;
            });
        }
        else
            $d = $items['N'][0];

        $items['d'] = $d;
        $items['sum'] = $sum;

        \Yii::$app->response->format = 'json';
        return $items;
    }

    private function prependArray($array = []) {

        if(empty($array))
            return [];

        $_array_n = [];
        foreach ($array as $key => $val) {
            if (empty($val))
                $_array_n[$key] = 0;
            else
                $_array_n[$key] = $val;
        }
        return $_array_n;
    }
}