<?php
/**
 * Created by wanxin on 2018/4/11.
 * Email: 987763485@qq.com
 */

namespace app\lib\exception;


use think\Exception;

class BaseException extends Exception
{
    //HTTP 状态吗
    public $code = 400;
    //错误的具体信息
    public $msg = '参数错误';
    //错误码
    public $errorCode = 10000;

    //构造函数
    public function __construct($params = [])
    {
       if(!is_array($params)){
           return ;
//           throw new Exception('参数必须是数组');
       }
       if(array_key_exists('code',$params)){
           $this->code = $params['code'];
       }
        if(array_key_exists('msg',$params)){
            $this->msg = $params['msg'];
        }
        if(array_key_exists('errorCode',$params)){
            $this->errorCode = $params['errorCode'];
        }
    }

}