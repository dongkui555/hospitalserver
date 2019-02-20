<?php
/**
 * Created by wanxin on 2018/5/12.
 * Email: 987763485@qq.com
 */

namespace app\api\controller\v1;


use app\api\service\UserToken;
use app\api\validate\TokenGet;
use app\lib\exception\ParamdterException;
use app\api\service\Token as TokenService;

class Token
{
    public function getToken($code = ''){
        $validata = new TokenGet();
        $validata->goCheck();

        $ut = new UserToken($code);
        $token = $ut->get();
        return [
            'token' => $token
        ];
    }

    public function verifyToken($token = ''){
        if(!$token){
            throw new ParamdterException([
                'token不允许为空'
            ]);
        }
        $valid = TokenService::verifyToken($token);
        return [
            'isValid' => $valid
        ];
    }

}