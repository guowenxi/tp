<?php
/**
 * Created by PhpStorm.
 * User: guowenxi
 * Date: 2018/1/3
 * Time: 16:24
 */
namespace app\index\model;

use think\Model;
/*模型会自动对应一个数据表，规范是：
一般来说，一个应用的模型都是公用的，不区分模块，所以不必在每个模块下面定义模型。
数据库前缀+当前的模型类名（不含命名空间）*/
class User extends Model
{


    //类型转换器

        //类型	描述
        //integer	整型
        //float	浮点型
        //boolean	布尔型
        //array	数组
        //json	JSON类型
        //object	对象
        //datetime	日期时间
        //timestamp	时间戳（整型）
        //serialize	序列化

    protected $type       = [
        // 设置birthday为时间戳类型（整型）
        'birthday' => 'timestamp:Y/m/d',
    ];
    //定义自动完成的属性
        //属性	描述
        //auto	新增及更新的时候自动完成的属性数组
        //insert	仅新增的时候自动完成的属性数组
        //update	仅更新的时候自动完成的属性数组
    //protected $insert = ['status' => 1];
    //动态定义自动完成属性(判断)
    protected $insert = ['status'];

    // status属性修改器
    protected function setStatusAttr($value, $data)
    {
        return '流年' == $data['nickname'] ? 1 : 2;
    }

    // status属性读取器
    protected function getStatusAttr($value)
    {
        $status = [-1 => '删除', 0 => '禁用', 1 => '正常', 2 => '待审核'];
        return $status[$value];
    }

    //读取器
        //get + 属性名的驼峰命名+ Attr ---------该方法会在读取birthday属性值的时候自动执行。
        //getBirthdayAttr读取器读取的是birthday属性，而getUserBirthdayAttr 读取器读取的则是user_birthday属性。
//    protected function getBirthdayAttr($birthday)
//    {
//        return date('Y-m-d', $birthday);
//    }
        //读取器也可以接受不存在的属性
        //user_birthday 不存在, 但是通过存在的birthday属性的值去获取
        //$data参数是获取所有的属性数据
//    protected function getUserBirthdayAttr($value,$data)
//    {
//        return date('Y-m-d', $data['birthday']);
//    }
    //修改器
        //set + 属性名的驼峰命名+ Attr
        //相当于每次Birthday属性都会进此修改器进行修改再输出/输入
//    protected function setBirthdayAttr($value){
//        return strtotime($value);
//    }



    // 设置单独的数据库连接(如果需要换数据库的话)
    protected $connection = [
        // 数据库类型
        'type'        => 'mysql',
        // 服务器地址
        'hostname'    => '127.0.0.1',
        // 数据库名
        'database'    => 'test',
        // 数据库用户名
        'username'    => 'root',
        // 数据库密码
        'password'    => '',
        // 数据库连接端口
        'hostport'    => '',
        // 数据库连接参数
        'params'      => [],
        // 数据库编码默认采用utf8
        'charset'     => 'utf8',
        // 数据库表前缀
        'prefix'      => '',
        // 数据库调试模式
        'debug'       => true,
        // 是否自动转换URL中的控制器和操作名*****暂时无用
        'url_convert'            => false,
    ];
    // 关闭自动写入时间戳
    protected $autoWriteTimestamp = 'datetime';
    // 同时设置完整的数据表（包含前缀）
    protected $table = 'think_user';

}