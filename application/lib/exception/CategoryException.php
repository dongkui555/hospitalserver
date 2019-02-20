<?php
/**
 * Created by wanxin on 2018/4/15.
 * Email: 987763485@qq.com
 */

namespace app\lib\exception;


class CategoryException extends BaseException
{
    public $code = 404;
    public $msg = '请求类目不存';
    public  $errorCode = 50000;

}