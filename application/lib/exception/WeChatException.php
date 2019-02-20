<?php
/**
 * Created by wanxin on 2018/4/15.
 * Email: 987763485@qq.com
 */

namespace app\lib\exception;


class WeChatException extends BaseException
{
    public $code = 404;
    public $msg = '请求banner不存在';
    public  $errorCode = 40000;

}