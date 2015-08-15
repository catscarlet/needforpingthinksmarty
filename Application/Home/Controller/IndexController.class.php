<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $pinglist = M('pinglist');
        $data = $pinglist->where('state = "normal"')->order('id')->select();
        $this->assign('list', $data);
        $this->display();
    }
}
