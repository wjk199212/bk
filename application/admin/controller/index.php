<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/30
 * Time: 上午9:23
 */
namespace app\admin\controller;
use app\index\model\article;
use app\index\model\category;
use think\captcha\Captcha;
use think\Controller;

class index extends Controller
{
    public function lobby(){
        $id = $this->request->param('id',0);
//        print_r($id);
        $this->assign('id',$id);
//        查出分类中的所有子类信息
        $category=$this->categoryList(1);
        $categories = [];
//        print_r($category);
        foreach ($category as $v){
            $categories[] =$v['id'];
        }
        if ($id){
            $categoryInfo =category::where('id',$id)->find();
            $this->assign('categoryInfo',$categoryInfo);
            $list = article::where('category_id','in',$id)
                ->where('status',1)
                ->order('create_time DESC')
                ->paginate(10);
//            print_r($list);
//            print_r($categories);

        }else{
            $this->assign('categoryInfo','');
            $list = article::where('category_id','in',$categories)
                ->where('status',1)
                ->order('create_time DESC')
                ->paginate(10);
//            print_r($categories);
        }
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function blind(){
        $id = $this->request->param('id',10);
//        print_r($id);
        $this->assign('id',$id);
//        查出分类中的所有子类信息
        $category=$this->categoryList(1);
        $categories = [];
//        print_r($category);
        foreach ($category as $v){
            $categories[] =$v['id'];
        }
        if ($id){
            $categoryInfo =category::where('id',$id)->find();
            $this->assign('categoryInfo',$categoryInfo);
            $list = article::where('category_id','in',$id)
                ->where('status',1)
                ->order('create_time DESC')
                ->paginate(10);
//            print_r($list);
//            print_r($categories);

        }else{
            $this->assign('categoryInfo','');
            $list = article::where('category_id','in',$categories)
                ->where('status',1)
                ->order('create_time DESC')
                ->paginate(10);
//            print_r($categories);
        }
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function data(){
        $id = $this->request->param('id',9);
//        print_r($id);
        $this->assign('id',$id);
//        查出分类中的所有子类信息
        $category=$this->categoryList(1);
        $categories = [];
//        print_r($category);
        foreach ($category as $v){
            $categories[] =$v['id'];
        }
        if ($id){
            $categoryInfo =category::where('id',$id)->find();
            $this->assign('categoryInfo',$categoryInfo);
            $list = article::where('category_id','in',$id)
                ->where('status',1)
                ->order('create_time DESC')
                ->paginate(10);
//            print_r($list);
//            print_r($categories);

        }else{
            $this->assign('categoryInfo','');
            $list = article::where('category_id','in',$categories)
                ->where('status',1)
                ->order('create_time DESC')
                ->paginate(10);
//            print_r($categories);
        }
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function end(){
        $id = $this->request->param('id',6);
//        print_r($id);
        $this->assign('id',$id);
//        查出分类中的所有子类信息
        $category=$this->categoryList(1);
        $categories = [];
//        print_r($category);
        foreach ($category as $v){
            $categories[] =$v['id'];
        }
        if ($id){
            $categoryInfo =category::where('id',$id)->find();
            $this->assign('categoryInfo',$categoryInfo);
            $list = article::where('category_id','in',$id)
                ->where('status',1)
                ->order('create_time DESC')
                ->paginate(10);
//            print_r($list);
//            print_r($categories);

        }else{
            $this->assign('categoryInfo','');
            $list = article::where('category_id','in',$categories)
                ->where('status',1)
                ->order('create_time DESC')
                ->paginate(10);
//            print_r($categories);
        }
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function fwq(){
        $id = $this->request->param('id',8);
//        print_r($id);
        $this->assign('id',$id);
//        查出分类中的所有子类信息
        $category=$this->categoryList(1);
        $categories = [];
//        print_r($category);
        foreach ($category as $v){
            $categories[] =$v['id'];
        }
        if ($id){
            $categoryInfo =category::where('id',$id)->find();
            $this->assign('categoryInfo',$categoryInfo);
            $list = article::where('category_id','in',$id)
                ->where('status',1)
                ->order('create_time DESC')
                ->paginate(10);
//            print_r($list);
//            print_r($categories);

        }else{
            $this->assign('categoryInfo','');
            $list = article::where('category_id','in',$categories)
                ->where('status',1)
                ->order('create_time DESC')
                ->paginate(10);
//            print_r($categories);
        }
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function Java(){
        $id = $this->request->param('id',4);
//        print_r($id);
        $this->assign('id',$id);
//        查出分类中的所有子类信息
        $category=$this->categoryList(1);
        $categories = [];
//        print_r($category);
        foreach ($category as $v){
            $categories[] =$v['id'];
        }
        if ($id){
            $categoryInfo =category::where('id',$id)->find();
            $this->assign('categoryInfo',$categoryInfo);
            $list = article::where('category_id','in',$id)
                ->where('status',1)
                ->order('create_time DESC')
                ->paginate(10);
//            print_r($list);
//            print_r($categories);

        }else{
            $this->assign('categoryInfo','');
            $list = article::where('category_id','in',$categories)
                ->where('status',1)
                ->order('create_time DESC')
                ->paginate(10);
//            print_r($categories);
        }
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function job(){
        $id = $this->request->param('id',11);
//        print_r($id);
        $this->assign('id',$id);
//        查出分类中的所有子类信息
        $category=$this->categoryList(1);
        $categories = [];
//        print_r($category);
        foreach ($category as $v){
            $categories[] =$v['id'];
        }
        if ($id){
            $categoryInfo =category::where('id',$id)->find();
            $this->assign('categoryInfo',$categoryInfo);
            $list = article::where('category_id','in',$id)
                ->where('status',1)
                ->order('create_time DESC')
                ->paginate(10);
//            print_r($list);
//            print_r($categories);

        }else{
            $this->assign('categoryInfo','');
            $list = article::where('category_id','in',$categories)
                ->where('status',1)
                ->order('create_time DESC')
                ->paginate(10);
//            print_r($categories);
        }
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function php(){
        $id = $this->request->param('id',3);
//        print_r($id);
        $this->assign('id',$id);
//        查出分类中的所有子类信息
        $category=$this->categoryList(1);
        $categories = [];
//        print_r($category);
        foreach ($category as $v){
            $categories[] =$v['id'];
        }
        if ($id){
            $categoryInfo =category::where('id',$id)->find();
            $this->assign('categoryInfo',$categoryInfo);
            $list = article::where('category_id','in',$id)
                ->where('status',1)
                ->order('create_time DESC')
                ->paginate(10);
//            print_r($list);
//            print_r($categories);

        }else{
            $this->assign('categoryInfo','');
            $list = article::where('category_id','in',$categories)
                ->where('status',1)
                ->order('create_time DESC')
                ->paginate(10);
//            print_r($categories);
        }
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function Python(){
        $id = $this->request->param('id',5);
//        print_r($id);
        $this->assign('id',$id);
//        查出分类中的所有子类信息
        $category=$this->categoryList(1);
        $categories = [];
//        print_r($category);
        foreach ($category as $v){
            $categories[] =$v['id'];
        }
        if ($id){
            $categoryInfo =category::where('id',$id)->find();
            $this->assign('categoryInfo',$categoryInfo);
            $list = article::where('category_id','in',$id)
                ->where('status',1)
                ->order('create_time DESC')
                ->paginate(10);
//            print_r($list);
//            print_r($categories);

        }else{
            $this->assign('categoryInfo','');
            $list = article::where('category_id','in',$categories)
                ->where('status',1)
                ->order('create_time DESC')
                ->paginate(10);
//            print_r($categories);
        }
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function talk(){
        $id = $this->request->param('id',2);
//        print_r($id);
        $this->assign('id',$id);
//        查出分类中的所有子类信息
        $category=$this->categoryList(1);
        $categories = [];
//        print_r($category);
        foreach ($category as $v){
            $categories[] =$v['id'];
        }
        if ($id){
            $categoryInfo =category::where('id',$id)->find();
            $this->assign('categoryInfo',$categoryInfo);
            $list = article::where('category_id','in',$id)
                ->where('status',1)
                ->order('create_time DESC')
                ->paginate(10);
//            print_r($list);
//            print_r($categories);

        }else{
            $this->assign('categoryInfo','');
            $list = article::where('category_id','in',$categories)
                ->where('status',1)
                ->order('create_time DESC')
                ->paginate(10);
//            print_r($categories);
        }
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function ui(){
        $id = $this->request->param('id',7);
//        print_r($id);
        $this->assign('id',$id);
//        查出分类中的所有子类信息
        $category=$this->categoryList(1);
        $categories = [];
//        print_r($category);
        foreach ($category as $v){
            $categories[] =$v['id'];
        }
        if ($id){
            $categoryInfo =category::where('id',$id)->find();
            $this->assign('categoryInfo',$categoryInfo);
            $list = article::where('category_id','in',$id)
                ->where('status',1)
                ->order('create_time DESC')
                ->paginate(10);
//            print_r($list);
//            print_r($categories);

        }else{
            $this->assign('categoryInfo','');
            $list = article::where('category_id','in',$categories)
                ->where('status',1)
                ->order('create_time DESC')
                ->paginate(10);
//            print_r($categories);
        }
        $this->assign('list',$list);
        return $this->fetch();
    }

    public function detail(){
        $category = $this->categoryList(1);
//        文章ID
        $id =$this->request->param('id');
        $info = article::get($id);
        $this->assign('info',$info);
//        更新阅读次数
//        $info->setInc('hits');
        return $this->fetch();

    }

//    分类列表
    protected function categoryList($id){

        $category = category::where('pid',$id)->select();
        $this->assign('category',$category);
        return $category;
    }
//    关于我们
    public function about(){
//        分类ID
        $id = $this->request->param('id',15);
        $this->categoryList('15');
        $info = article::where('category_id',$id)->find();
        $this->assign('info',$info);
        $this->assign('id',$id);
        return $this->fetch();
    }
//    public function verify(){
//
//    }
    public function login_post(){
        $code=input('post.captcha');
        $captcha = new \think\captcha\Captcha();
        $result=$captcha->check($code);
        if($result===false){
            echo '验证码错误';exit;
        }
        echo '验证码正确，继续';exit;
    }

//    public function verify(){
//        if(empty($_POST))
//        {
//            $this->show();  //显示页面
//        }else
//        {
//            //验证验证码是否正确,可以用Think\Verify类的check方法检测验证码的输入是否正确
//            $yzm = $_POST["yzm"];   //接收传过来的文本框的值
//            $v = new \Think\Verify();
//            if($v->check($yzm))  //验证完是有返回值的,所以我们可以用if判断一下
//            {
//                $this->ajaxReturn("ok","eval");  //输入正确返回ok
//            }
//            else
//            {
//                $this->ajaxReturn("no","eval");    //输入错误返回no
//            }
//        }
//    }
















































}