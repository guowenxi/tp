<?php
/**
 * Created by PhpStorm.
 * User: guowenxi
 * Date: 2018/1/2
 * Time: 13:14
 */
namespace app\index\controller;

use think\Controller;
//使用数据库查询
use think\Db;

class Demo extends Controller
{
    public function index()
    {
        $data = Db::name('data')->find();
        $this->assign('result', $data);
        return $this->fetch();
    }
    public  function hello($name='god'){
        return "hello -". $name. "!";
    }
}