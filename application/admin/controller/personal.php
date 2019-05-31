<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/31
 * Time: 下午4:08
 */
namespace app\admin\controller;


use think\Controller;

class personal extends Controller
{
    public function datum(){
        return $this->fetch();

    }
}