<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/31
 * Time: 下午4:08
 */
namespace app\admin\controller;


use app\index\model\article;
use app\index\model\user;
use think\Controller;

class personal extends Controller
{
    public function datum()
    {
        if ($this->request->isGet()){
            $id = $this->request->param('id');
            $list = user::where('id',$id)->find();
            $this->assign('list',$list);
//            print_r($list);
            return $this->fetch();
        }
//        if ($this->request->isPost()){
//            $thumbs = $this->request->param('yy');
//            $id = $this->request->param('$id');
//            $data = [];
//        }
        $id = $this->request->param('id');



        exit();
        $image = $this->request->file('file');
        $res = $image->validate(['size' => 1048576, 'ext' => 'jpg,png,gif'])->move('static/upload');
        $path = $res->getPathname();

        if (user::where('id', $id)->update(['avatar' => $path])) {
            return json(['code' => 1, 'url' => $path, 'msg' => "成功"]);
        } else {
            return json(['code' => 0, 'msg' => '失败']);
//        }

        }
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
                $this->success('成功',url('admin/personal/head'));
            }else{
                $this->error('失败');
            }


        }
    }
    public function search()
    {
        if ($this->request->isPost()) {

            $keyword = $this->request->param('keyword');

            $num = article::where('title', 'like', '%' . $keyword . '%')->count();
            $list = article::where('title', 'like', '%' . $keyword . '%')
                ->paginate(10, false, ['query' => ['keyword' => $keyword]]);
            $newList = $list->toArray()['data'];
            foreach ($newList as $k => $v) {
                $newList[$k]['title'] = str_replace($keyword, ('<span class="text-danger">' . $keyword . '</span>'), $v['title']);
            }
            $this->assign('keyword', $keyword);
            $this->assign('list', $list);
            $this->assign('newList', $newList);
            $this->assign('num', $num);
            return $this->fetch();
        }

    }
}