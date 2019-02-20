<?php
/**
 * Created by wanxin on 2018/5/9.
 * Email: 987763485@qq.com
 */

namespace app\api\model;


class Theme extends BaseModel
{
    protected $hidden = ['delete_time','update_time'];

    public function topImgUrl(){
        return $this->belongsTo('Img','topic_img_id','Id');
    }


    public static function getThemeByID($ids){
        $result = self::with('topImgUrl')->select($ids);
        return $result;
    }

}