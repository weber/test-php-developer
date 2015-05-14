<?php
namespace app\controllers\actions;

use app\models\AgencyNetworkModel;
use yii\base\Action;
use yii\base\Exception;

class DbInitAction extends Action
{
    public function run()
    {
        // open file agency_network.txt
        // import agency_network.txt
        // open file agency.txt
        // import agency.txt
        // open file billing.txt
        // import billing.txt

        // Сделать отчет за выбранный период
        // Вывести агенства у которых нет данных за выбранный периуд(сумма 0 также признак отсутствия данных)

        // | Название сети | Название агентства | Сумма по агентству
        // ---------------------------------------------------------
        // | network1      | agency1            |  none
        // ---------------------------------------------------------
        // | network2      | agency2            |  none
        // ---------------------------------------------------------
        // | network3      | agency3            |  none
        // ----------------------------------------------------------
        // |               |                    | итого 0
        // ---------------------------------------------------------

        $check_table = $this->checkTable();

        if ( $check_table === false) {
            echo "Загрузка…";
            $this->initTable('agency_network', AgencyNetworkModel::model(), 'install');
            $this->initTable('agency', AgencyNetworkModel::model(), 'install');
            $this->initTable('billing', AgencyNetworkModel::model(), 'install');
        }

        return $this->controller->redirect(['/db']);
    }

    public function checkTable() {
        $data = AgencyNetworkModel::model()->checkTable();
        if (!empty($data))
            return true;
        else
            return false;
    }

    public function initTable ($filename = null, $model = null, $method = null)
    {
        $path_filename = "data/{$filename}.txt";

        if (empty($filename))
            throw new Exception('Не указан файл', 500);

        if (!file_exists($path_filename))
            throw new Exception('Файл не существует', 500);

        if (empty($model))
            throw new Exception('Не указана модель', 500);

        if (empty($method))
            throw new Exception('Не указан метод обработки', 500);



        $stream = fopen($path_filename, 'r');
        $first_line = false;
        $fields = [];
        $data = [];
        $tablename = $filename;

        while (($buffer = fgets($stream)) !== false) {

            if ($first_line === true) {

                $data = preg_split("/\s/", trim($buffer));
                $data = array_filter ($data );
                $prepared_date =  [];
                $params = [];

                foreach ($data as $key => $val)
                    $prepared_date[] = $val;

                foreach ($fields as $key => $val)
                    $params[$val] = $prepared_date[$key];

               $model->$method($tablename, $params);

            } else {
                $first_line = true;
                $fields = preg_split("/\s/", trim($buffer));   //explode('=', trim($item));
            }
        }

        fclose($stream);
    }
}