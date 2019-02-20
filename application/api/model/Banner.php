<?php
/**
 * Created by wanxin on 2018/5/9.
 * Email: 987763485@qq.com
 */

namespace app\api\model;


class Banner extends BaseModel
{
    protected $hidden = ['update_time','delete_time'];

    public function imgUrl(){
        return $this->belongsTo('Img','img_id','Id');
    }

    public static function getBannerAll(){
        $result = self::with('imgUrl')->select();
        return $result;
    }
}