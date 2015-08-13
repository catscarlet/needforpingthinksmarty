<?php

namespace Home\Controller;

use Think\Controller;

class QuerydbController extends Controller
{
    public function Querydb($q = 'thinkphp')
    {

        //$this->assign('name',$name);
        $query_range = 360;
        //$q_array = $q;

        foreach ($q as $id => $query) {
            $query_output[$id] = query_db($query, $query_range);
        }

        //$query_output[0] = query_db($q, $query_range);

        $this->assign('query_output', json_encode($query_output));
        //$this->assign('query_output', $q);
        $this->display();
    }
}
/*
        $query_range = 360;

        $q_array = $_GET['q'];
            foreach ($q_array as $id => $q) {
                $query_output[$id] = query_db($q, $query_range);
            }
          */
        //echo json_encode($query_output);

        function query_db($q, $query_range)
        {
            $pingresult = M('pingresult');
            //$sql = 'select * from '.constant('DB_TABLE')." where server_name = '".$q."' order by DATETIME DESC LIMIT $query_range";
            $sql_array = $pingresult->where('server_name = '."\"$q\"")->order('DATETIME DESC')->limit($query_range)->select();
//            echo $pingresult->getLastSql();
//var_dump($sql_array);
            $sql_count = count($sql_array);

            $i = min($query_range, $sql_count);

            foreach ($sql_array as $sql_array_id => $row) {
                $i = $i - 1;
                $query_DATA['DATETIME'][$i] = $row['DATETIME'];
                $query_DATA['loss_percent'][$i] = 100 - substr($row['loss_percent'], 0, -1);
                $query_DATA['rtt_avg'][$i] = round($row['rtt_avg']);
            }

         /* 因为sql查询是DESC的，所以要根据键值重新排序，不然坐标轴的时间会变成降序 */
            ksort($query_DATA['DATETIME']);
            ksort($query_DATA['loss_percent']);
            ksort($query_DATA['rtt_avg']);

         /* 将查询的关键词与查询结果合并*/
            $query_data = array('server_name' => $q);
            $query_data = array_merge($query_data, $query_DATA);

            return $query_data;
        }
