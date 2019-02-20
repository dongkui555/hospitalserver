<?php
/**
 * Created by wanxin on 2018/5/9.
 * Email: 987763485@qq.com
 */

namespace app\api\model;


class Img extends BaseModel
{
    protected $hidden = ['delete_time','update_time','from','create_time'];
    public function getUrlAttr($value,$data){
        return $this->prefixImgUrl($value,$data);
    }
}