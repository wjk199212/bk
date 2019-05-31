<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/5/21
 * Time: 下午4:31
 */
namespace app\index\model;

use think\Model;

class article extends Model
{
    //自动开启设置时间
    protected $autoWriteTimestamp = true;

    public function category()
//        一对多链接
    {
        return $this->belongsTo('category', 'category_id');
    }
}
