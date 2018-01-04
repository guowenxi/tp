<?php
/**
 * Created by PhpStorm.
 * User: guowenxi
 * Date: 2018/1/3
 * Time: 16:43
 */
namespace app\index\controller;

//引用model里的方法 调用指定数据库的表
use app\index\model\User;

//get::
//all::
class UserController {
    //新增
    public function add(){
        $user = new User;
        $user['nickname'] = '蜚语aa';
        $user['email']    = '2222@qq.com';
        $user['birthday'] = '1977-03-05';
        if($user -> save()){
            return '用户['. $user->nickname. ':'. $user->id.']新增成功!';
        }else{
            return $user->getError();
        }
    }
    //批量新增
    //url地址上是add_list
    public function addList(){
        $user = new User;
        $list = [
            ['nickname' => '张三', 'email' => 'zhanghsan@qq.com', 'birthday' => strtotime('1988-01-15')],
            ['nickname' => '李四', 'email' => 'lisi@qq.com', 'birthday' => strtotime('1990-09-19')],
        ];
        if ($user->saveAll($list)) {
            return '用户批量新增成功';
        } else {
            return $user->getError();
        }
    }
    //查询
/*    public function read($id=''){
        //如果你是在模型的内部获取数据，请不要使用$this->nickname，而应该使用$this->getAttr('nickname')方式替代。
        $user = User::get($id);
        echo $user ;
    }*/
    public function read($id=''){

        $user  =  User::get($id);
        //User::get  getBy + 键名 可以按需筛选;
        //另一种写法 User::get(['nickname'=>'流年']);
        //$user = User::getByNickname('流年');
        //也可以用
        //$user = UserModel::get(['nickname'=>'流年']);
        //复杂的查询方式可以使用查询构造器
//        $user = UserModel::get(function($query){
//            $query->where('nickname', '流年')->where('id', '>', 10)->order('id','desc');
//        });
        echo $user['birthday'];
    }

    public function index(){
        //获取所有的表内数据
        //需要用循环的方式展现页面
        $list = User::all();
        foreach ($list as $user) {
            echo $user->nickname . '<br/>';
            echo $user->email . '<br/>';
            echo date('Y/m/d', $user->birthday) . '<br/>';
            echo '----------------------------------<br/>';
        }
    }
    public function update($id){
        //强制数据进行新增操作
        //$user->isUpdate(false)->save();
//        $user['id']       = (int) $id;
//        $user['nickname'] = '刘晨';
//        $user['email']    = 'liu21st@gmail.com';
//        UserModel::update($user);

        $user = User::get($id);
        $user['nickname'] = 'guowenxi';
        $user['email'] = '200894001@qq.com';
        $user->save();
        return "用户已更新 在". $id. "上" ;
    }
    public function delete($id){
        //简写方式
        //$result = UserModel::destroy($id);
        //判断$result返回值是否存在去判断是否已经删除
        $user = User::get($id);
        if($user){
            $user->delete();
            return "删除成功";
        }else{
            return "需要删除的用户不存在";
        }
    }
}