<?php
/**
 * Created by wanxin on 2018/5/9.
 * Email: 987763485@qq.com
 */

namespace app\api\model;


class CasesImg extends BaseModel
{
    public function imgUrl(){
        return $this->belongsTo('Img','img_id','Id');
}

}