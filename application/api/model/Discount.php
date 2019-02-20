<?php
/**
 * Created by wanxin on 2018/5/9.
 * Email: 987763485@qq.com
 */

namespace app\api\model;


class Discount extends BaseModel
{
    protected $hidden = ['update_time','delete_time'];

    public function topImgUrl(){
        return $this->belongsTo('Img','topic_img_id','Id');
    }

    public static function getDiscountList(){
        return self::with('topImgUrl')->select();

    }

}