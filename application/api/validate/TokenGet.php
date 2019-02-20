<?php
/**
 * Created by wanxin on 2018/4/15.
 * Email: 987763485@qq.com
 */

namespace app\api\validate;


class TokenGet extends BaseValidate
{
    protected $rule = [
        'code'=>'require|isNotEmpty'
    ];
    protected $message = [
        'code'=>'code是空的'
    ];

}