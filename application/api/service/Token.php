<?php
/**
 * Created by wanxin on 2018/5/12.
 * Email: 987763485@qq.com
 */

namespace app\api\service;

use app\lib\exception\TokenException;
use think\Cache;
use think\Exception;
use think\Request;


class Token
{
    public static function generateToken(){
        //32个字符组成一组随机字符串
        $randChars = getRandChars(32);
        //用三组字符串进行MD5加密
        $timestape = $_SERVER['REQUEST_TIME_FLOAT'];
        //SALT 盐
        $salt = config('secure.token_salt');
        return md5($randChars.$timestape.$salt);
    }

    /**
     * 获取token里边的某一个键的值
     * @param $key
     * @return mixed
     * @throws Exception
     * @throws TokenException
     */
    public static function getCurrentTokenVar($key){
        $token = Request::instance()->header('token');
        $vars = Cache::get($token);
        if(!$vars){
            throw new TokenException();
        }else{
            if (!is_array($vars)){
                $vars = json_decode($vars,true);
            }
            if (array_key_exists($key,$vars)){
                return $vars[$key];
            }
            else{
                throw new Exception('尝试获取的Token变量并不存在');
            }
        }
    }

    /**
     * 获取用户唯一标识
     * @return mixed
     * @throws Exception
     * @throws TokenException
     */
    public static function getCurrentUID(){
        $uid = self::getCurrentTokenVar('uid');
        return $uid;
    }

    public static function isValindOperate($checkedID){
        if (!$checkedID){
            throw new Exception('检查用户身份不通过');
        }
        $currentOperateUID = self::getCurrentUID();
        if ($checkedID == $currentOperateUID){
            return true;
        }
        return false;
    }

    public static function verifyToken($token){
        $vars = Cache::get($token);
        if($vars){
            return true;
        }else{
            return false;
        }
    }

}