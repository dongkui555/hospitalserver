<?php
/**
 * Created by wanxin on 2018/4/16.
 * Email: 987763485@qq.com
 */

namespace app\lib\exception;


class TokenException extends BaseException
{
    public $code = 401;
    public $msg = 'token已经过期或无效';
    public  $errorCode = 10001;
}