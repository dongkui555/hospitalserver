<?php
/**
 * Created by wanxin on 2018/4/20.
 * Email: 987763485@qq.com
 */

namespace app\lib\exception;



class PayException extends BaseException
{
    public $code = 400;
    public $msg = '支付出现异常';
    public  $errorCode = 50000;

}