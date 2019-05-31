<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/31
 * Time: 下午4:08
 */
namespace app\admin\controller;


use app\index\model\user;
use think\Controller;

class personal extends Controller
{
    public function datum(){
        return $this->fetch();


    }
    public function head(){
        $id= $this->request->param('id',1);
//        var_dump($id);
        $list = user::where('id',$id)->find();
//        var_dump($list);
        $this->assign('list',$list);
        return $this->fetch();

    }
    public function password(){

//        var_dump($id);
        if ($this->request->isGet()) {
            $id = $this->request->param('id');
            $list = user::where('id', $id)->find();
//            var_dump($list);
            $this->assign('list', $list);
            return $this->fetch();
        }

        if ($this->request->isPost()){
            $password = $this->request->only(['password_old','password_new','password_new_repeat']);
//            var_dump($password);
//           print_r(session('adminLoginVal'));
            $id = $this->request->param('xx');
//            print_r($id);
            $info = user::where('id',$id)->find();
//            var_dump($info);
            if (!password_verify($password['password_old'],$info->password)){
                $this->error('密码错误');
            }
            if ($password['password_new']!= $password['password_new_repeat']){
                $this->error('两次密码输入不一致');
            }
            $newpassword = password_hash($password['password_new'],1);
            if (user::where('id',$id)->update(['password'=>$newpassword])){
                $this->success('成功',url('index/Sign/logout'));
            }else{
                $this->error('失败');
            }


        }
    }

}