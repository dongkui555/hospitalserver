<?php
/**
 * Created by wanxin on 2018/4/14.
 * Email: 987763485@qq.com
 */

namespace app\lib\exception;


class ThemeException extends BaseException
{
    public $code = 404;
    public $msg = '指定主题不存在';
    public $errorCode = 30000;

}