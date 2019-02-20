<?php
/**
 * Created by wanxin on 2018/4/11.
 * Email: 987763485@qq.com
 */

namespace app\lib\exception;


class ParamdterException extends BaseException
{
    public $code = 400;
    public $msg = '参数错误';
    public  $errorCode = 10000;

}