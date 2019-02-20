<?php
/**
 * Created by wanxin on 2018/5/12.
 * Email: 987763485@qq.com
 */

namespace app\api\service;


use app\api\model\Cases;
use app\api\model\CasesProperty;
use app\lib\exception\CasesException;
use app\lib\exception\GroupException;

class OrderService
{
    protected $oCase_id;
    protected $uid;
    protected $actions;
    protected $cases;

    function place($uid,$oCase_id,$actions){
        $this->uid = $uid;
        $this->oCase_id = $oCase_id;
        $this->actions = $actions;
        $this->cases = $this ->getCaseBuyOrder($oCase_id);
        return $this->cases;
    }

    public function snapOrder(){
        $snap = [

        ];
    }

    /**
     * 生成订单编号
     * @return string
     */
    public static function makeOrderNo()
    {
        $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
        $orderSn =
            $yCode[intval(date('Y')) - 2018] . strtoupper(dechex(date('m'))) . date(
                'd') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf(
                '%02d', rand(0, 99));
        return $orderSn;
    }

    /**
     * 获取产品信息
     * @param $oCase_id
     * @return array
     * @throws CasesException
     * @throws \think\exception\DbException
     */
    public function getCaseBuyOrder($oCase_id){
        $cases = Cases::get($oCase_id);
        if(!$cases){
            throw new CasesException();
        }
        return $cases->toArray();
    }

    /**
     * 获取订单信息
     * @param $oCase_id
     * @return array
     * @throws GroupException
     * @throws \think\exception\DbException
     */
    public function getCaseGroupBuy($oCase_id){
        $groupInfo = CasesProperty::get($oCase_id);
        if(!$groupInfo){
            throw new GroupException();
        }
        return $groupInfo->toArray();
    }

    public function getGroupStatus(){

    }
}