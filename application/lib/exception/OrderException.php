<?php
/**
 * Created by wanxin on 2018/4/17.
 * Email: 987763485@qq.com
 */

namespace app\lib\exception;


class OrderException extends BaseException
{
    public $code = 404;
    public $msg = '订单不存在';
    public  $errorCode = 80000;

}