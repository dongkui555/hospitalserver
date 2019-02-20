<?php
/**
 * Created by wanxin on 2018/5/12.
 * Email: 987763485@qq.com
 */

namespace app\api\controller\v1;


use app\api\service\OrderService;
use app\api\validate\OrderPlace;
use app\api\service\Token as TokenService;

class Order extends BaseController
{
    protected $beforeActionList = [
        'checkExclusiveScope' => ['only'=>'placeOrder']
    ];

    public function placeOrder(){
        (new OrderPlace())->goCheck();

        $oCase_id = input('post.case_id/d');
        $actions = input('post.actions/d');
        $uid = TokenService::getCurrentUID();
        $order = new OrderService();
        $res = $order->place($uid,$oCase_id,$actions);
        return $res;

    }

    public function creatOrder(){

    }
}