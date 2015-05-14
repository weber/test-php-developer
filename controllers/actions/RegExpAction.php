<?php
namespace app\controllers\actions;

use yii\base\Action;

class RegExpAction extends Action
{
    public function run()
    {
        $filename = "data/data.txt";
        $message = "";
        $array = [];

        if (file_exists($filename)) {

            $message = "Работа с регулярными выражениями";
            $handle = fopen($filename, 'r');
            $cnt = fread($handle, filesize($filename));
            $_array = explode(';', $cnt);

            foreach ($_array as $item) {

                $chunk = preg_split("/\s\=\s/", trim($item));   //explode('=', trim($item));

                if (isset($chunk[1])) {

                    $chunk_obj = preg_split("/\./", trim($chunk[0]));  //explode('.', trim($chunk[0]));
                    $result = array();
                    $current = &$result;
                    $length =count($chunk_obj) ;
                    $length--;

                    foreach ($chunk_obj as $key =>$val) {

                        $current[$val] = array();
                        if ($length == $key)
                            $current[$val] =  $chunk[1];

                        $current = &$current[$val];
                    }
                    $array = array_merge_recursive($array,$result);
                }
            }

            fclose($handle);

        } else {
            $message = "Нет такого файла " . $filename;
        }

        return $this->controller->render('regexp', ['message' => $message, 'result' =>$array, 'cnt' => $cnt]);
    }
}