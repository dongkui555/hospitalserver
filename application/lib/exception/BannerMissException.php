<?php
/**
 * Created by wanxin on 2018/4/11.
 * Email: 987763485@qq.com
 */

namespace app\lib\exception;


class BannerMissException extends BaseException
{
    public $code = 404;
    public $msg = 'banner不存在';
    public  $errorCode = 40000;

}