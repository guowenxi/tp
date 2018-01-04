<?php
/**
 * Created by PhpStorm.
 * User: guowenxi
 * Date: 2018/1/3
 * Time: 14:00
 */
namespace app\index\controller;
use think\Controller;
//使用数据库查询
use think\Db;
//find方法用于查找满足条件第一个记录（即使你的查询条件有多个符合的数据）
//limit() 限制展示数据的最多记录
//select方法用于查询数据集，如果查询成功，返回的是一个二维数组
//value方法用于获取指定行内的值
//column('name','id') 获取某列的所有数据(如果不传id内的值,则从0开始索引)(如果name为'*',则以后面的索引获取所有的列)
//whereTime() 日期/时间查询,日期查询对create_time字段类型没有要求，可以是int/string/timestamp/datetime/date中的任何一种，系统会自动识别进行处理。
//字符串查询
//chunk(num,function($list){  分块查询,系统默认按照主键顺序查询,如果没有主键,则需要指定查询的排序字段(必须唯一)
//  foreach($list as $data){
//      return false;
//  }
//}, 'uid')
class Getdb extends Controller
{
    public function getIndex($id='')
    {
        $result =Db::table('think_data')
            //where 查询字段
            //    ** => [ ** , **]
                // 第一个参数为键名 可附加( | , & )
                //第二个参数为筛选方式 可附加多种()
                //第三个参数为筛选条件
            ->where([
                'id' => ['between','1,4'],
                'name' => ['like','%www%'],
            ])
                ->limit(10)
                ->select();
        dump($result);
    }
    public function view(){
        $result = Db::view('think_data','id,name,status')
            ->view('think_user','think_user.user_id=think_data.id')
            ->where('status',1)
            ->order('id desc')
            ->select();
        dump($result);
    }
    public function column(){
        $list = Db::table('think_data')
            ->where('status', 1)
            ->column('*', 'id');
        dump($list);
    }
    public function count(){
        //方法	说明	参数
        //count	统计数量	统计的字段名（可选）
        //max	获取最大值	统计的字段名（必须）
        //min	获取最小值	统计的字段名（必须）
        //avg	获取平均值	统计的字段名（必须）
        //sum	获取总分	统计的字段名（必须）
        // 统计user表的最高分
        $max = Db::table('think_data')
            ->where('status', 1)
            ->max('score');
        dump($max);
    }
}