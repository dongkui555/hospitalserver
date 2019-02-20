<?php
/**
 * Created by wanxin on 2018/5/19.
 * Email: 987763485@qq.com
 */

namespace app\api\behavior;


class CORS
{
    public function appInit(&$params){
        header("Access-Control-Allow-Origin:*");
        header("Access-Control-Allow-Headers:token,Origin,X-Requested-width,Content-Type,Accept");
        header("Access-Control-Allow-Methods:POST,GET");
        if(request()->isOptions()){
            exit();
        }
    }
}