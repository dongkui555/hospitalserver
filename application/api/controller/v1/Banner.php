<?php
/**
 * Created by wanxin on 2018/5/7.
 * Email: 987763485@qq.com
 */

namespace app\api\controller\v1;


use app\api\model\Banner as BannerModel;
use app\lib\exception\BaseException;
use think\Cache;


class Banner
{
    public function getBanner(){
        $banner = BannerModel::getBannerAll();

        if ($banner->isEmpty()){
            throw new BaseException();
        }
        return $banner;

    }
    public function index(){
        $key = 'sdk';
        $value = '556';
        $expire_in = 7200;
        $request = Cache::set($key,$value,$expire_in);

        if(!$request){
            throw new TokenException([
                'msg' => '服务器缓存异常',
                'errorCode' => 10005
            ]);
        }

        $var = Cache::get('sdk');
        return $var;
    }
}