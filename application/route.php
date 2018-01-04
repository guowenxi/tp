<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
//动态路由配置
use think\Route;
//Route::rule('hello/[:name]', 'demo/hello');
//
Route::rule('request/[:name]', 'res/request');
Route::rule('getMess/', 'res/getMess');
Route::rule('getIndex/', 'res/getIndex');
//
Route::rule('res/', 'Response/res');
Route::rule('response/', 'Response/response');
//
Route::rule('getIndex/', 'Getdb/getIndex');
//路由闭包定义
//Route::rule('hello/:name', function ($name) {
//    return 'Hello,' . $name . '!';
//});
return [
    // 添加路由规则 路由到 index控制器的hello操作方法(必须配参数)
    //'hello/:name' => 'demo/hello',
    //不用配参数
    //'hello/[:name]' => 'demo/hello',
    //全局变量规则定义
    '__pattern__' => [
        'name' => '\w+',
    ],
    //'user/index'      => 'index/user/index',
    'user/create'     => 'index/user/create',
    'user/add'        => 'index/user/add',
    'user/add_list'   => 'index/user/addList',
    'user/update/:id' => 'index/user/update',
    'user/delete/:id' => 'index/user/delete',
    'user/:id'        => 'index/user/read',
    //路由分组配置
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    '[blog]' => [
        ':year/:month' => ['blog/archive', ['method' => 'get'], ['year' => '\d{4}', 'month' => '\d{2}']],
        ':id'          => ['blog/get', ['method' => 'get'], ['id' => '\d+']],
        ':name'        => ['blog/read', ['method' => 'get'], ['name' => '\w+']],
    ],
];
