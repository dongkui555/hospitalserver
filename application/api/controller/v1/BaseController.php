<?php
/**
 * Created by wanxin on 2018/5/9.
 * Email: 987763485@qq.com
 */

namespace app\api\controller\v1;


use think\Collection;
use app\api\service\Token as TokenService;
use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenException;
use app\lib\exception\TokenException;


class BaseController extends Collection
{
    /**
     * 管理员接口权限
     * @return bool
     * @throws ForbiddenException
     * @throws TokenException
     * @throws \think\Exception
     */
    public function checkPrimaryScope(){
        $scope = TokenService::getCurrentTokenVar('scope');
        if($scope){
            if ($scope >= ScopeEnum::User){
                return true;
            }else{
                throw new ForbiddenException();
            }
        }else{
            throw new TokenException();
        }

    }

    /**
     * 用户接口权限
     * @return bool
     * @throws ForbiddenException
     * @throws TokenException
     * @throws \think\Exception
     */
    public function checkExclusiveScope(){
        $scope = TokenService::getCurrentTokenVar('scope');
        if($scope)
        {
            if ($scope == ScopeEnum::User)
            {
                return true;
            }
            else {
                throw new ForbiddenException();
            }
        }
        else{
            throw new TokenException();
        }

    }

}