<?php
/**
 * Created by wanxin on 2018/5/10.
 * Email: 987763485@qq.com
 */

namespace app\lib\exception;


class CasesException extends BaseException
{
    public $code = 404;
    public $msg = '疾病不存在';
    public  $errorCode = 40000;

}