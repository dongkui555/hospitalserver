<?php
/**
 * Created by wanxin on 2018/4/11.
 * Email: 987763485@qq.com
 */

namespace app\api\validate;

class IDMustBePostiveInt extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isPositiveInteger',
    ];
    protected $message = [
        'id' => 'id必须是正整数'
    ];

}