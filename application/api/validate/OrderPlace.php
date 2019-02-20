<?php
/**
 * Created by wanxin on 2018/4/17.
 * Email: 987763485@qq.com
 */

namespace app\api\validate;


use app\lib\exception\ParamdterException;
use think\Exception;

class OrderPlace extends BaseValidate
{

    protected $rule = [
        'case_id' => 'require|isPositiveInteger',
        'actions' => 'require|isPositiveInteger'
    ];

    protected $message = [
        'case_id' => 'id必须的且是正整数',
        'actions' => 'actions必须的且是正整数'
    ];



//    private $cases = [
//        'case_id' => '1',
//        'actions' => '1'
//    ];

}