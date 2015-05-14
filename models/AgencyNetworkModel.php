<?php
/**
 * User: webs
 * Date: 13.05.15
 * Time: 12:53
 * To change this template use File | Settings | File Templates.
 */
namespace app\models;

class AgencyNetworkModel extends BaseModel {

    public $db;
    public $from_date;
    public $to_date;


    public function rules()
    {
        return [
            ['from_date', 'date', 'format'=>'dd.MM.yyyy'],
            ['to_date', 'date', 'format'=>'dd.MM.yyyy'],
        ];
    }

    public  function __construct() {
        $this->db = parent::model()->db;
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function install ($tablename, $params = []) {

        if (!is_array($params) && empty ($params))
            throw new Exception('Не заданы параметры', 500);

        $res = $this->db->createCommand()->insert($tablename, $params)->execute();
    }

    public function checkTable () {

        $data = $this->db->createCommand('SELECT * FROM agency')->queryOne();
        if (!empty($data))
            return true;
        else
            return false;
    }

    public  function getTotalAmount ($from_date = '', $to_date = '') {

        $where_query = [];
        $where ='';

        if (!empty($from_date))
            $where_query[] = "billing.date >= :date_from";

        if (!empty($to_date))
            $where_query[] = "billing.date <= :date_to";

        if (!empty($where_query)) {
            $w = implode(' AND ', $where_query);
            $where = "WHERE {$w}";
        }

        $sql = "
            SELECT SUM(amount) as total FROM (
                SELECT

                SUM(billing.amount) as  amount
                FROM `agency`
                LEFT JOIN agency_network ON (agency.agency_network_id = agency_network.agency_network_id)

                LEFT JOIN billing ON (agency.agency_id = billing.agency_id)
                {$where}
                GROUP BY agency_network.agency_network_name, agency.agency_name
            ) as res
        ";

        $res = $this->db->createCommand($sql);

        if (!empty($from_date))
            $res->bindValue(':date_from',  $this->dateConvert($from_date));

        if (!empty($to_date))
            $res ->bindValue(':date_to', $this->dateConvert($to_date));

        return $res->queryOne();
    }

    public  function getAgency ($from_date = '', $to_date = '') {

        $where_query = [];
        $where ='';

        if (!empty($from_date))
            $where_query[] = "billing.date >= :date_from";

        if (!empty($to_date))
            $where_query[] = "billing.date <= :date_to";

        if (!empty($where_query)) {
            $w = implode(' AND ', $where_query);
            $where = "WHERE {$w}";
        }

        $sql = "
            SELECT
                agency_network.agency_network_name as network_name,
                agency.agency_id,
                agency.agency_name as agency_name,
                billing.user_id,
                billing.date,
                SUM(billing.amount) as  amount
            FROM `agency`
            LEFT JOIN agency_network ON (agency.agency_network_id = agency_network.agency_network_id)
            LEFT JOIN billing ON (agency.agency_id = billing.agency_id)
            {$where}
            GROUP BY agency_network.agency_network_name, agency.agency_name
        ";

        $res = $this->db->createCommand($sql);

        if (!empty($from_date))
            $res->bindValue(':date_from',  $this->dateConvert($from_date));

        if (!empty($to_date))
            $res ->bindValue(':date_to', $this->dateConvert($to_date));

        return $res->queryAll();
    }

    private function dateConvert($date = null) {
        $chunk_date = explode('.', $date);

        if (!empty($chunk_date))
            return "{$chunk_date[2]}.{$chunk_date[1]}.{$chunk_date[0]}";
        else
            return '';
    }
}