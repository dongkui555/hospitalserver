<?php
/**
 * Created by wanxin on 2018/5/12.
 * Email: 987763485@qq.com
 */

namespace app\api\service;

use app\lib\enum\ScopeEnum;
use app\lib\exception\TokenException;
use app\lib\exception\WeChatException;
use think\Cache;
use think\Exception;
use app\api\model\User as UserModel;

class UserToken extends Token
{

    protected $code;
    protected $wxAppID;
    protected $wxAppSecret;
    protected $wxLoginUrl;

    public function __construct($code)
    {
        $this->code = $code;
        $this->wxAppID = config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');
        $this->wxLoginUrl = sprintf(config('wx.login_url'),$this->wxAppID,$this->wxAppSecret,$this->code);
    }

    public function get(){
//        $result = curl_get($this->wxLoginUrl);
//        $wxResult = json_decode($result,true);
        $wxResult = ['session_key' => 'uI9z0bV+0269UckzIlGPxg==','openid' =>  'oQXwF0XunPB8cIGii6bKWB2GC3x0'];

        if(empty($wxResult)){
            throw new Exception('获取session_key和openid是出现异常');
        }else{
            $loginFail = array_key_exists('errcode',$wxResult);
            if($loginFail){
                $this->processLoginError($wxResult);
            }else{
                return $this->grantToken($wxResult);
            }
        }
    }

    private function processLoginError($wxResult){
        throw new WeChatException([
            'msg' => $wxResult['errmsg'],
            'errorCode' => $wxResult['errcode']
        ]);

    }

    /**
     * 颁发令牌
     * @param $wxResult
     * @return mixed
     * @throws TokenException
     */
    private function  grantToken($wxResult){
        //拿到oppenid
        //在数据库里看一下这个oppenid是否存在
        //如果存在则不处理，如果不存在则增加一条记录
        //生成令牌准备缓存数据，写入缓存
        //把令牌返回客户端
        //key:口令
        //value:wxResult,uid,scope
        $openid = $wxResult['openid'];
        $result = UserModel::getByopenID($openid);

        if ($result){
            $uid = $result->Id;
        }else{
            $uid = $this->newUser($openid);
        }
        $cachedValue = $this->prepareCachedValue($wxResult,$uid);
        $token = $this->saveToCache($cachedValue);

        return $token;
    }
    private function saveToCache($cachedValue){
        $key = self::generateToken();
        $value = json_encode($cachedValue);
        $expire_in = config('setting.token_expire_in');

        $request = Cache::set($key,$value,$expire_in);

        if(!$request){
            throw new TokenException([
                'msg' => '服务器缓存异常',
                'errorCode' => 10005
            ]);
        }
        return $key;

    }
    private function prepareCachedValue($wxResult,$uid){
        $cachedValue = $wxResult;
        $cachedValue['uid'] = $uid;
        //scope=16代表app用户身份
        $cachedValue['scope'] = ScopeEnum::User;
        return $cachedValue;
    }
    private function newUser($openid){
        $user = UserModel::create([
            'openid'=>$openid
        ]);
        $uid = $user->Id;
        return $uid;
    }

}