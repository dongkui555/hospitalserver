<?php
/**
 * Created by wanxin on 2018/4/14.
 * Email: 987763485@qq.com
 */

namespace app\api\validate;


class Count extends BaseValidate
{
    protected $rule = [
        'count' => 'isPositiveInteger|between:1,15'
    ];
}