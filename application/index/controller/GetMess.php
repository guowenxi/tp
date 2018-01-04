<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/2
 * Time: 19:13
 */
namespace app\index\controller;

use think\Controller;
use think\Db;

class GetMess extends Controller
{
    //写入一条数据到数据库
    public function getMess()    {
//        $result = Db::execute('insert into think_user (id, name ,status) values (5, "thinkphp",1)');
//        dump($result);

//        Db::table('think_data')
//            ->insert(['id' => 18, 'name' => 'thinkphp', 'status' => 1]);

        $db = db('think_user');
        $db->where('id', 20)->update(['name' => "framework"]);
    }
    //更新数据(更新数据库的数据)
    public function upDate(){
//        $result = Db::execute('update think_user set name = "zxcasd" where id = 2 ');
//        dump($result);

//        $result = Db::table('think_user')
//            ->where('id', 1)
//            ->update(['name' => "hello"]);

        $db = db('think_user');
        $db->where('id', 20)->update(['name' => "framework"]);

    }
    //读取数据(返回所有匹配的数据/数组)
    //query方法用于查询，默认情况下返回的是数据集（二维数组），execute方法的返回值是影响的记录数。
    public function query(){
//        $result = Db::query('select * from think_user where id = 2');
//        dump($result);


//        $list = Db::table('think_data')
//            ->where('id', 18)
//            ->select();

        $db = db('think_user');
        $list = $db->where('id', 20)->select();
        dump($list);
    }
    //删除
    public function delete(){
//        $result = Db::execute('delete from think_user where id = 5 ');
//        dump($result);

//        Db::table('think_data')
//            ->where('id', 18)
//            ->delete();

        //简写方式
        $db = db('think_user');
        $db->where('id', 1)->delete();
    }
    //切换数据库
    //db1 配置在config.php内,
    public function chooseData(){
//        $db1 = Db::connect('db1')->query('select * from think_data');
//        //$db1->query('select * from think_data');
//        dump($db1);

        Db::execute('insert into think_user (id, name ,status) values (?, ?, ?)', [8, 'thinkphp', 1]);
        $result = Db::query('select * from think_user where id = ?', [8]);
        dump($result);

    }

    //链式操作的方法
    public function limit(){
        //方法名	描述
        //select	查询数据集
        //find	查询单个记录
        //insert	插入记录
        //update	更新记录
        //delete	删除记录
        //value	查询值
        //column	查询列
        //chunk	分块查询
        //count等	聚合查询
        $list = Db('think_user')
            ->where('status', 1)
            ->field('id,name')
            ->order('id', 'desc')
            ->limit(10)
            ->select();
        dump($list);
    }

    //  事务操作(trans内的方法只要失败一个就不会执行)
    public function transaction(){
        Db::transaction(function () {
            Db::table('think_user')
                ->where('id', 44)
                ->delete(1);
            Db::table('think_user')
                ->insert(['id' => 28, 'name' => 'thinkphp', 'status' => 1]);
        });

    }

}