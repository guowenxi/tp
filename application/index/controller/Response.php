<?php
/**
 * Created by PhpStorm.
 * User: guowenxi
 * Date: 2018/1/2
 * Time: 16:47
 */

namespace app\index\controller;

//use \traits\controller\Jump;
class Response
{
    public function response($name=''){
        if ('thinkphp' ==$name){
            return success('欢迎使用thinkPhp!','hello');
        }else{
            return error('错误的name','guest');
        }
    }
    public function hello()
    {
        return 'Hello,ThinkPHP!';
    }

    public function guest()
    {
        return 'Hello,Guest!';
    }
    public function res()
    {
        $data = ['name' => 'thinkphp', 'status' => '1'];
        //return json($data);
        return json($data)->code(201)->header(['Cache-control' => 'no-cache,must-revalidate']);
    }
}

//输出类型	快捷方法
//渲染模板输出	view
//JSON输出	json
//JSONP输出	jsonp
//XML输出	xml
//页面重定向	redirect
