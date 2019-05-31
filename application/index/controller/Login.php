<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/29
 * Time: 上午11:16
 */
namespace app\index\controller;

use app\index\model\admin;
use app\index\model\category;
use app\index\model\user;
use think\Controller;

class Login extends Controller
{
    public function up(){
        $request = $this->request;
//        接收get请求时
        if($request->isGet()){
            return $this->fetch();
        }
//接收post请求时
        if ($request->isPost()) {
//验证数据
            $rule = [
                'mobile' => 'require|mobile|unique:user',
                'password' => 'require|confirm:repass|length:6,12'
            ];
            $msg = [
                'mobile.require' => '手机号为必填项',
                'mobile.mobile' => '请输入正确的手机号',
                'mobile.unique' => '该手机号已被使用',
                'password.require' => '密码为必填项',
                'password.confirm' => '两次密码输入不一致',
                'password.length' => '密码的长度应在6-12位之间'
            ];

            $info = $this->validate($request->param(), $rule, $msg);
            if ($info !== true) {
                $this->error($info);
            }


//            使用模型进行数据的插入
            $m = new \app\index\model\user();
//            验证手机号码
            $m->mobile = $request->param('mobile');
//            给用户密码加密
            $m->password = password_hash($request->param('password'), PASSWORD_DEFAULT);
//            给用户添加一个随机名称
            $m->nickname = '新用户' . random_int(10000, 9999999);
//        如果用户信息被存到数据表就表示注册成功
            if ($m->save()) {
                $this->success('注册成功', url('index/Login/in'));
            } else {
                $this->error('注册失败');
            }
        }

    }
//    退出登录
    public function out(){
//        退出登录 置空session 并跳转到登录页面
        session('adminLoginVal',null);
        $this->redirect('admin/Login/in');
    }
//    登录
    public function in(){
        $res = $this->request;
//        处理post请求
        if ($res->isPost()){
//            接收数据
            $data=$res->only(['mobile','password']);
//          验证数据

            $rule=[
                'mobile'=>'require|mobile',
                'password'=>'require|length:2,12'
            ];
            $msg=[
                'mobile.require'=>'请输入手机号码',
                'mobile.mobile'=>'请输入正确的手机号',
                'password.require'=>'请输入密码',
                'password.length'=>'密码长度应该在2-12位之间',

            ];
            $val=$this->validate($data,$rule, $msg);
            $code=input('post.captcha');
            $captcha = new \think\captcha\Captcha();

           if (!$captcha->check($code)){
               $this->error('验证码有误');
           }

//         判断是否登录成功
//            当验证信息有误时输出错误提示
            if ($val !==true){
                 $this->error($val);
            }
//         DB获取数据库
//           $admin= \think\Db::table('admin')->where('mobile',$data['mobile'])->find();

            $admin= user::where('mobile',$data['mobile'])->find();



//         如果在数据库中没找到用户名就输出错误信息
            if (!$admin){
                $this->error('您输入的账户密码有误');
            }
//         密码验证成功，借助session 登录成功并跳转登录后的页面
            if (password_verify($data['password'],$admin['password'])){
//             用session 记录当前登录状态
                session('adminLoginVal',$admin);
                $this->redirect('admin/index/lobby');
            }else{
                $this->error('您输入的账户密码有误');
            }
        }







//        处理get请求
        if ($res->isGet()){
//            输出
            return $this->fetch();

        }
    }

    public function login_post(){
        $code=input('post.captcha');
        $captcha = new \think\captcha\Captcha();
        $result=$captcha->check($code);
        if($result===false){
            echo '验证码错误';exit;
        }
        echo '验证码正确，继续';exit;
    }

}