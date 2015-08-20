<?php

namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $this->isLogin();
        $this->display('/index');
    }

    public function toLogin()
    {
        $this->display('/login');
    }

    public function login()
    {
        $username = $_POST['username'];
        $userpwd = $_POST['password'];
        Load('adminpwd');

        $this->assign('username', $username);
        $this->assign('userpwd', $userpwd);

        /* 密码校验 */
        if ($username != 'root' || $userpwd != 'admin') {
            $this->assign('info', '账号密码不正确');
            $this->display('/info');
        } else {
            $_SESSION['username'] = $username;
            $_SESSION['userpwd'] = $userpwd;
            $this->assign('info', '账号密码正确');
            $this->display('/info');
        }
    }
}
