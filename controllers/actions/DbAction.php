<?php
namespace app\controllers\actions;

use app\models\AgencyNetworkModel;
use yii\base\Action;
use yii\base\Exception;
use Yii;

class DbAction extends Action
{

    public function run()
    {
        $check_table = AgencyNetworkModel::model()->checkTable();
        $total_amount = ['total'=>0];
        $agency = [];

        AgencyNetworkModel::model()->attributes = \Yii::$app->request->post('AgencyNetworkModel');

        if (AgencyNetworkModel::model()->validate()) {

            $date = Yii::$app->request->post();
            if ( $check_table === true && !empty($date)) {

                $date = Yii::$app->request->post()['AgencyNetworkModel'];

                $total_amount = AgencyNetworkModel::model()->getTotalAmount($date['from_date'], $date['to_date']);
                $agency = AgencyNetworkModel::model()->getAgency($date['from_date'], $date['to_date']);
            }
        } else {
            $errors = AgencyNetworkModel::model()->errors;
        }

       return $this->controller->render('db', [
           'check_table' => $check_table,
           'total_amount' => $total_amount,
           'agency' => $agency,
           'model' => AgencyNetworkModel::model(),
       ]);
    }

}