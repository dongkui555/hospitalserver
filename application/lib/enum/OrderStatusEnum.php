<?php
/**
 * Created by wanxin on 2018/4/20.
 * Email: 987763485@qq.com
 */

namespace app\lib\enum;


class OrderStatusEnum
{
    //待支付
    const UNPAID = 1;
    //已经支付
    const  PAID = 2;
    //已经发货
    const  DELIVERED = 3;
    //已经支付,库存不足
    const PAID_BUT_OUT_OF = 4;

}