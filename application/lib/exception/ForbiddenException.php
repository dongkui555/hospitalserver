<?php
/**
 * Created by wanxin on 2018/4/17.
 * Email: 987763485@qq.com
 */

namespace app\lib\exception;


use think\Exception;

class ForbiddenException extends BaseException
{
    public $code = 403;
    public $msg = '权限不足';
    public  $errorCode = 10001;

}