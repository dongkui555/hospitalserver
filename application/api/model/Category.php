<?php
/**
 * Created by wanxin on 2018/5/9.
 * Email: 987763485@qq.com
 */

namespace app\api\model;


class Category extends BaseModel
{
    protected $hidden = ['delete_time','update_time'];

    public function headImgUrl(){
        return $this->belongsTo('Img','head_img_id','Id');
    }

    public static function getCategoryList(){
        return self::with('headImgUrl')->select();
    }

}