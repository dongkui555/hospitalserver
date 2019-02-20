<?php
/**
 * Created by wanxin on 2018/4/17.
 * Email: 987763485@qq.com
 */

namespace app\lib\exception;


class UserException extends BaseException
{
    public $code = 404;
    public $msg = '用户不存在';
    public  $errorCode = 60000;

}