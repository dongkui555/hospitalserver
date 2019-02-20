<?php
/**
 * Created by wanxin on 2018/5/9.
 * Email: 987763485@qq.com
 */

namespace app\api\controller\v1;

use app\api\model\Discount as DiscountModel;
use app\lib\exception\DiscountException;
use think\Exception;

class Discount
{
    public function getDiscount(){
        $result = DiscountModel::getDiscountList();
        if ($result->isEmpty()){
            throw new DiscountException();
        }
        return $result;
    }

}