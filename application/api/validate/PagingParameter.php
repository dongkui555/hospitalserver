<?php
/**
 * Created by wanxin on 2018/4/21.
 * Email: 987763485@qq.com
 */

namespace app\api\validate;


class PagingParameter extends BaseValidate
{
    protected $rule = [
        'page' => 'isPositiveInteger',
        'size' => 'isPositiveInteger'
    ];

    protected $message = [
        'page' => '分业参数必须是正整数',
        'size' => '分页参数必须是正整数'
    ];

}