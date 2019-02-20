<?php
/**
 * Created by wanxin on 2018/5/9.
 * Email: 987763485@qq.com
 */

namespace app\api\model;


use think\Model;

class BaseModel extends Model
{
    protected function prefixImgUrl($value,$data){
        if($data['from'] == 1){
            return config('setting.img_prefix').$value.'?v=1';
        }
        else{
            return $value;
        }
    }

    protected function topicImgUrl($value,$data){
       if ($data['topic_from']==1){
           return config('setting.img_prefix').$value.'?v=1';
       }
       else{
           return $value;
       }
    }

    protected function mainImgUrl($value,$data){
        if ($data['head_from']==1){
            return config('setting.img_prefix').$value.'?v=1';
        }
        else{
            return $value;
        }
    }

}