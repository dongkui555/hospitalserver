<?php
/**
 * Created by wanxin on 2018/5/12.
 * Email: 987763485@qq.com
 */

namespace app\api\model;


class User extends BaseModel
{
    public static function getByopenID($openid){
        $user = self::where('openid','=',$openid)->find();
        return $user;
    }

}