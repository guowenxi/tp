<?php
/**
 * Created by PhpStorm.
 * User: guowenxi
 * Date: 2018/1/2
 * Time: 14:02
 */

//方法	作用
//domain	获取当前的域名
//url	获取当前的完整URL地址
//baseUrl	获取当前的URL地址，不含QUERY_STRING
//baseFile	获取当前的SCRIPT_NAME
//root	获取当前URL的root地址
//pathinfo	获取当前URL的pathinfo地址
//path	获取当前URL的pathinfo地址，不含后缀
//ext	获取当前URL的后缀
//type	获取当前请求的资源类型
//scheme	获取当前请求的scheme
//query	获取当前URL地址的QUERY_STRING
//host	获取当前URL的host地址
//port	获取当前URL的port号
//protocol	获取当前请求的SERVER_PROTOCOL
//remotePort	获取当前请求的REMOTE_PORT
namespace app\index\controller;
use think\Request;

class Res
{
    //获取请求的地址
    public function request(Request $request, $name = 'World')
    {
        // 获取当前URL地址 不含域名
        echo 'url: ' . $request->url() . '<br/>';
        return 'Hello,' . $name . '！';
    }
    //获取请求的参数
    public function getMess(Request $request){
        echo "请求参数:";
        //dump($request -> param());
        //简写
       // dump(input());
        //$request->param()有过滤方法
        //可用于过滤传来的参数
        echo 'name:'. $request->param('name','World','strtolower');
        //dump();
        //echo 'name'. $request -> param('name');
        //input方法没有过滤方法
        echo '获取的名字是'. input(input('name','World','strtolower'));
    }
/*    public function getIndex(Request $request){
        echo 'GET参数：';
        dump($request->get());
        echo 'GET参数：name';
        dump($request->get('name'));
        echo 'POST参数：name';
        dump($request->post('name'));
        echo 'cookie参数：name';
        dump($request->cookie('name'));
        echo '上传文件信息：image';
        dump($request->file('image'));
    }*/
    public function getIndex(Request $request,$name = 'World'){
        echo '模块：'.$request->module();
        echo '<br/>控制器：'.$request->controller();
        echo '<br/>操作：'.$request->action();
        echo 'domain'. $request->domain(). '<br/>';
        echo 'file'. $request->baseFile(). '<br/>';
        echo 'url'. $request->url().  '<br/>';
        // 获取包含域名的完整URL地址
        echo 'url with domain: ' . $request->url(true) . '<br/>';
        // 获取当前URL地址 不含QUERY_STRING
        echo 'url without query: ' . $request->baseUrl() . '<br/>';
        // 获取URL访问的ROOT地址
        echo 'root:' . $request->root() . '<br/>';
        // 获取URL访问的ROOT地址
        echo 'root with domain: ' . $request->root(true) . '<br/>';
        // 获取URL地址中的PATH_INFO信息
        echo 'pathinfo: ' . $request->pathinfo() . '<br/>';
        // 获取URL地址中的PATH_INFO信息 不含后缀
        echo 'pathinfo: ' . $request->path() . '<br/>';
        // 获取URL地址中的后缀信息
        echo 'ext: ' . $request->ext() . '<br/>';
        echo '请求方法：' . $request->method() . '<br/>';
        echo '资源类型：' . $request->type() . '<br/>';
        echo '访问IP：' . $request->ip() . '<br/>';
        echo '是否AJax请求：' . var_export($request->isAjax(), true) . '<br/>';
        echo '请求参数：';
        dump($request->param());
        echo '请求参数：仅包含name';
        dump($request->only(['name']));
        echo '请求参数：排除name';
        dump($request->except(['name']));
        return 'Hello,' . $name . '！';
    }
}
