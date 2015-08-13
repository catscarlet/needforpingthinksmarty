<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {

        //$this->assign('name',$name);
        $pinglist = M('pinglist');
        $data = $pinglist->where('state = "normal"')->order('id')->select();
        $this->assign('list', $data);
        $this->display();

              /*
        $serverarray = array();
                $con = mysql_connect('localhost', constant('DB_USER'), constant('DB_PASSWORD'));
        if (!$con) {
            die('Could not connect: '.mysql_error());
        }

        mysql_select_db(constant('DB_NAME'), $con) or die(mysql_error());
        $sql = 'select * from '.constant('DB_TABLE').' where state = "normal" order by id';


        $result = mysql_query($sql) or die('Query failed: '.mysql_error().' Actual query: '.$sql);


        echo '<form name="server_selecter" class="formcss" action="query_db.php" method="get">';

        $i = 0;
        while ($row = mysql_fetch_array($result)) {
            $serverarray[$row['id']] = new ServerList($row['id'], $row['server_name'], $row['alias_name'], $row['description'], $row['state']);
            $serverarray[$row['id']]->echoCheckbox($i);
            ++$i;
        }
                      */

        /*
        echo '</table>';
        echo '<input type="button" name="submit" value="提交查询" onclick="getquery()">
        </form>';
        */
    }
}

/* Object define */
      /*
class ServerList
{
    public $id;
    public $server_name;
    public $alias_name;
    public $description;
    public $state;
    public function __construct($id, $server_name, $alias_name, $description, $state)
    {
        $this->id = $id;
        $this->server_name = $server_name;
        $this->alias_name = $alias_name;
        $this->description = $description;
        $this->state = $state;
    }

    public function echoCheckbox($i)
    {
        /*
        echo '<tr><td>
      <input type="checkbox" id="'.$i.'" name="q[]" value="'.$this->server_name.'"> '.$this->alias_name.'</td><td>'.$this->server_name.'</td>
      </tr>
      ';

    }
}
*/
